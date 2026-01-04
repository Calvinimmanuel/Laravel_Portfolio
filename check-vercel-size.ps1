# Script untuk cek ukuran deployment Vercel
# Usage: .\check-vercel-size.ps1

Write-Host "=== Cek Ukuran Deployment Vercel ===" -ForegroundColor Cyan

# 1. Simpan state saat ini
$hasVendor = Test-Path "vendor"
$hasNodeModules = Test-Path "node_modules"

# 2. Install dependencies production-only
Write-Host "`n1. Installing production dependencies..." -ForegroundColor Yellow
Write-Host "   (Ini akan menghapus dev dependencies)" -ForegroundColor Gray

# Backup composer.json jika perlu
if (-not $hasVendor) {
    Write-Host "   Installing vendor..." -ForegroundColor Gray
    composer install --no-dev --optimize-autoloader --no-interaction 2>&1 | Out-Null
} else {
    Write-Host "   Reinstalling vendor dengan --no-dev..." -ForegroundColor Gray
    Remove-Item -Path "vendor" -Recurse -Force -ErrorAction SilentlyContinue
    composer install --no-dev --optimize-autoloader --no-interaction 2>&1 | Out-Null
}

# 3. Hitung ukuran vendor
Write-Host "`n2. Menghitung ukuran..." -ForegroundColor Yellow
$vendorSize = 0
if (Test-Path "vendor") {
    $vendorSize = (Get-ChildItem -Path "vendor" -Recurse -File -ErrorAction SilentlyContinue | Measure-Object -Property Length -Sum).Sum
    Write-Host "   Vendor size: $([math]::Round($vendorSize/1MB,2)) MB" -ForegroundColor $(if ($vendorSize -lt 200MB) { "Green" } else { "Yellow" })
}

# 4. Hitung ukuran total (tanpa node_modules karena akan diinstall di Vercel)
$totalSize = (Get-ChildItem -Recurse -File -ErrorAction SilentlyContinue |
    Where-Object {
        $_.FullName -notmatch '\\node_modules\\' -and
        $_.FullName -notmatch '\\.git\\' -and
        $_.FullName -notmatch '\\.vercel\\'
    } | Measure-Object -Property Length -Sum).Sum

Write-Host "   Total size (tanpa node_modules): $([math]::Round($totalSize/1MB,2)) MB" -ForegroundColor $(if ($totalSize -lt 200MB) { "Green" } else { "Red" })

# 5. Cek package terbesar
Write-Host "`n3. Package terbesar di vendor:" -ForegroundColor Yellow
$packages = Get-ChildItem -Path "vendor" -Directory -Depth 1 -ErrorAction SilentlyContinue | ForEach-Object {
    $size = (Get-ChildItem $_.FullName -Recurse -File -ErrorAction SilentlyContinue | Measure-Object -Property Length -Sum).Sum
    [PSCustomObject]@{
        Package = $_.Name
        "Size(MB)" = [math]::Round($size/1MB,2)
    }
} | Sort-Object "Size(MB)" -Descending | Select-Object -First 10

$packages | Format-Table -AutoSize

# 6. Rekomendasi
Write-Host "`n=== Rekomendasi ===" -ForegroundColor Cyan

if ($totalSize -lt 200MB) {
    Write-Host "✅ Ukuran OK untuk Vercel (< 200MB)" -ForegroundColor Green
    Write-Host "   Vercel akan menambahkan runtime (~50MB), total akan ~$([math]::Round(($totalSize/1MB) + 50,2)) MB" -ForegroundColor Gray
} elseif ($totalSize -lt 250MB) {
    Write-Host "⚠️  Ukuran mendekati batas (200-250MB)" -ForegroundColor Yellow
    Write-Host "   Pertimbangkan untuk mengurangi dependencies" -ForegroundColor Gray
} else {
    Write-Host "❌ Ukuran melebihi batas (> 250MB)" -ForegroundColor Red
    Write-Host "   Deployment ke Vercel akan gagal!" -ForegroundColor Red
    Write-Host "   Rekomendasi:" -ForegroundColor Yellow
    Write-Host "   1. Hapus dependencies yang tidak diperlukan" -ForegroundColor Gray
    Write-Host "   2. Gunakan platform lain (Railway, Render)" -ForegroundColor Gray
    Write-Host "   3. Convert ke static site (generate-static.php)" -ForegroundColor Gray
}

# 7. Restore dev dependencies jika sebelumnya ada
if ($hasVendor) {
    Write-Host "`n4. Restoring dev dependencies..." -ForegroundColor Yellow
    composer install --optimize-autoloader --no-interaction 2>&1 | Out-Null
    Write-Host "   Done!" -ForegroundColor Green
}

Write-Host "`n=== Selesai ===" -ForegroundColor Cyan
Write-Host "Lihat VERCEL_DEPLOYMENT.md untuk panduan lengkap" -ForegroundColor Gray

