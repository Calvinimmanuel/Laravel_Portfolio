# Script untuk membersihkan file-file yang tidak diperlukan
# Usage: .\cleanup.ps1

Write-Host "=== Pembersihan File Portfolio ===" -ForegroundColor Cyan

# 1. Hapus log files
Write-Host "`n1. Membersihkan log files..." -ForegroundColor Yellow
$logFiles = Get-ChildItem -Path "storage\logs" -Filter "*.log" -ErrorAction SilentlyContinue
if ($logFiles) {
    $logSize = ($logFiles | Measure-Object -Property Length -Sum).Sum
    $logFiles | Remove-Item -Force
    Write-Host "   Dihapus: $([math]::Round($logSize/1MB,2)) MB" -ForegroundColor Green
} else {
    Write-Host "   Tidak ada log files" -ForegroundColor Gray
}

# 2. Hapus cache files
Write-Host "`n2. Membersihkan cache..." -ForegroundColor Yellow
$cacheDirs = @(
    "storage\framework\cache\data",
    "storage\framework\sessions",
    "storage\framework\views"
)

$totalCacheSize = 0
foreach ($dir in $cacheDirs) {
    if (Test-Path $dir) {
        $cacheFiles = Get-ChildItem -Path $dir -Recurse -File -ErrorAction SilentlyContinue | Where-Object { $_.Name -ne ".gitkeep" }
        if ($cacheFiles) {
            $cacheSize = ($cacheFiles | Measure-Object -Property Length -Sum).Sum
            $totalCacheSize += $cacheSize
            $cacheFiles | Remove-Item -Force
        }
    }
}

if ($totalCacheSize -gt 0) {
    Write-Host "   Dihapus: $([math]::Round($totalCacheSize/1MB,2)) MB" -ForegroundColor Green
} else {
    Write-Host "   Tidak ada cache files" -ForegroundColor Gray
}

# 3. Hapus build artifacts lama
Write-Host "`n3. Membersihkan build artifacts..." -ForegroundColor Yellow
if (Test-Path "public\build") {
    $buildSize = (Get-ChildItem -Path "public\build" -Recurse -File -ErrorAction SilentlyContinue | Measure-Object -Property Length -Sum).Sum
    Remove-Item -Path "public\build" -Recurse -Force -ErrorAction SilentlyContinue
    Write-Host "   Dihapus: $([math]::Round($buildSize/1MB,2)) MB" -ForegroundColor Green
} else {
    Write-Host "   Tidak ada build artifacts" -ForegroundColor Gray
}

# 4. Hapus file temporary
Write-Host "`n4. Membersihkan file temporary..." -ForegroundColor Yellow
$tempFiles = Get-ChildItem -Recurse -File -ErrorAction SilentlyContinue | Where-Object {
    $_.Extension -in @('.tmp', '.temp', '.bak', '.swp', '.swo')
}
if ($tempFiles) {
    $tempSize = ($tempFiles | Measure-Object -Property Length -Sum).Sum
    $tempFiles | Remove-Item -Force
    Write-Host "   Dihapus: $([math]::Round($tempSize/1MB,2)) MB" -ForegroundColor Green
} else {
    Write-Host "   Tidak ada temporary files" -ForegroundColor Gray
}

# 5. Hitung ukuran total setelah cleanup
Write-Host "`n=== Ukuran Setelah Cleanup ===" -ForegroundColor Cyan
$totalSize = (Get-ChildItem -Recurse -File -ErrorAction SilentlyContinue | Where-Object { 
    $_.FullName -notmatch '\\node_modules\\' -and 
    $_.FullName -notmatch '\\vendor\\' 
} | Measure-Object -Property Length -Sum).Sum

Write-Host "Ukuran proyek (tanpa node_modules & vendor): $([math]::Round($totalSize/1MB,2)) MB" -ForegroundColor Green

if ($totalSize -lt 250MB) {
    Write-Host "✅ Ukuran proyek di bawah 250MB!" -ForegroundColor Green
} else {
    Write-Host "⚠️  Ukuran proyek melebihi 250MB. Pertimbangkan optimasi lebih lanjut." -ForegroundColor Yellow
}

Write-Host "`n=== Selesai ===" -ForegroundColor Cyan

