# 🚀 Deploy Laravel ke Vercel (Serverless)

Panduan untuk deploy Laravel ke Vercel dengan ukuran di bawah 250MB.

## ⚠️ Batasan Vercel

- **Maksimal ukuran unzipped**: 250MB per serverless function
- **Runtime**: PHP 8.2+ via `vercel-php@0.7.4`
- **Cold start**: Bisa lambat karena Laravel cukup berat

## 🔧 Optimasi Ukuran

### 1. `.vercelignore` Configuration

File `.vercelignore` sudah dikonfigurasi untuk exclude:
- `node_modules/` - Akan diinstall di Vercel
- `vendor/` - Akan diinstall di Vercel dengan `--no-dev`
- Development files
- Logs dan cache

### 2. Build Command

Vercel akan menjalankan:
```bash
composer install --no-dev --optimize-autoloader --no-interaction
npm install
npm run build
```

**Penting**: `--no-dev` akan exclude dev dependencies yang bisa menghemat ~20-30MB.

### 3. Optimasi Composer Dependencies

Edit `composer.json` untuk mengurangi ukuran:

```json
{
  "config": {
    "optimize-autoloader": true,
    "preferred-install": "dist",
    "sort-packages": true
  }
}
```

### 4. Hapus Dependencies yang Tidak Diperlukan

Cek `composer.json` dan hapus package yang tidak digunakan:
- `laravel/sail` - Hanya untuk Docker
- `laravel/pail` - Hanya untuk development
- Testing packages jika tidak diperlukan

## 📋 Checklist Sebelum Deploy

- [ ] Pastikan `.vercelignore` sudah benar
- [ ] Hapus dev dependencies yang tidak diperlukan
- [ ] Build assets lokal: `npm run build`
- [ ] Test `composer install --no-dev` lokal
- [ ] Cek ukuran setelah build

## 🧪 Test Ukuran Lokal

```powershell
# Install tanpa dev dependencies
composer install --no-dev --optimize-autoloader

# Cek ukuran vendor
$vendorSize = (Get-ChildItem -Path "vendor" -Recurse -File | Measure-Object -Property Length -Sum).Sum
Write-Host "Vendor size: $([math]::Round($vendorSize/1MB,2)) MB"

# Total size (tanpa node_modules karena akan diinstall di Vercel)
$totalSize = (Get-ChildItem -Recurse -File -ErrorAction SilentlyContinue | 
    Where-Object { 
        $_.FullName -notmatch '\\node_modules\\' -and 
        $_.FullName -notmatch '\\.git\\' 
    } | Measure-Object -Property Length -Sum).Sum
Write-Host "Total size: $([math]::Round($totalSize/1MB,2)) MB"
```

**Target**: Total size harus < 200MB untuk aman (karena Vercel akan menambahkan runtime).

## 🚨 Jika Masih Melebihi 250MB

### Opsi 1: Hapus Dependencies Besar

Cek package terbesar:
```powershell
Get-ChildItem -Path "vendor" -Recurse -Directory | ForEach-Object {
    $size = (Get-ChildItem $_.FullName -Recurse -File | Measure-Object -Property Length -Sum).Sum
    [PSCustomObject]@{Package=$_.Name; "Size(MB)"=[math]::Round($size/1MB,2)}
} | Sort-Object "Size(MB)" -Descending | Select-Object -First 10
```

### Opsi 2: Gunakan Platform Lain

Jika Laravel terlalu besar untuk Vercel, pertimbangkan:
- **Railway** - Auto-detect Laravel, mudah setup
- **Render** - Free tier tersedia
- **Fly.io** - Good untuk Laravel

Lihat `DEPLOYMENT_OPTIONS.md` untuk detail.

### Opsi 3: Convert ke Static Site

Gunakan `generate-static.php` untuk convert ke static HTML dan deploy ke:
- GitHub Pages
- Vercel Static
- Netlify

## 🔍 Troubleshooting

### Error: "Function has exceeded 250MB"

1. **Cek `.vercelignore`** - Pastikan `vendor/` dan `node_modules/` di-exclude
2. **Gunakan `--no-dev`** - Pastikan build command menggunakan `--no-dev`
3. **Hapus file besar** - Cek apakah ada file besar yang tidak perlu
4. **Optimize images** - Pastikan gambar di `public/images/` sudah dioptimasi

### Error: "Cannot find vendor/autoload.php"

Pastikan `installCommand` di `vercel.json` menginstall dependencies:
```json
{
  "installCommand": "composer install --no-dev --optimize-autoloader"
}
```

### Cold Start Lambat

Laravel di serverless bisa lambat karena:
- Framework cukup berat
- Cold start bisa 2-5 detik
- Pertimbangkan menggunakan platform dengan persistent server (Railway, Render)

## 📝 Environment Variables

Setup di Vercel Dashboard:
```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:... (generate dengan: php artisan key:generate)
APP_URL=https://your-domain.vercel.app
```

## ✅ Best Practices

1. **Selalu gunakan `--no-dev`** untuk production
2. **Optimize autoloader** dengan `--optimize-autoloader`
3. **Build assets sebelum deploy** atau di build command
4. **Monitor ukuran** secara berkala
5. **Gunakan CDN** untuk assets besar (gambar, video)

## 🔗 Resources

- [Vercel PHP Runtime](https://github.com/juicyfx/vercel-php)
- [Laravel on Vercel](https://vercel.com/guides/deploying-laravel-to-vercel)
- [Composer Optimization](https://getcomposer.org/doc/articles/autoloader-optimization.md)

