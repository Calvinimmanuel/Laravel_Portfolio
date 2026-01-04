# Panduan Optimasi Ukuran File (< 250MB)

Dokumen ini menjelaskan cara menjaga ukuran proyek tetap di bawah 250MB.

## Ukuran Saat Ini
- **Total Proyek**: ~109 MB
- **Status**: ✅ Di bawah 250MB

## Folder Besar yang Sudah Diabaikan

Folder-folder berikut sudah diabaikan oleh Git (tidak di-commit):
- `vendor/` (~56 MB) - Dependencies PHP/Laravel
- `node_modules/` (~52 MB) - Dependencies Node.js
- `storage/logs/` - Log files
- `storage/framework/cache/` - Cache files
- `public/build/` - Build assets

## Tips Mengurangi Ukuran File

### 1. Optimasi Gambar
Jika Anda menambahkan gambar ke `public/images/`:
- Gunakan format WebP untuk ukuran lebih kecil
- Kompres gambar sebelum upload (gunakan tools seperti TinyPNG, ImageOptim)
- Resize gambar ke ukuran yang diperlukan (jangan upload gambar 4K jika hanya ditampilkan kecil)
- Target ukuran: < 500KB per gambar

### 2. Hapus File yang Tidak Diperlukan
```bash
# Hapus log files
rm -rf storage/logs/*.log

# Hapus cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Hapus node_modules dan reinstall jika perlu
rm -rf node_modules
npm install
```

### 3. Gunakan CDN untuk Assets Besar
Untuk file besar seperti video atau gambar high-res:
- Upload ke CDN (Cloudinary, AWS S3, dll)
- Jangan simpan di repository

### 4. Optimasi Dependencies
- Hapus dependencies yang tidak digunakan
- Gunakan `composer install --no-dev` untuk production
- Gunakan `npm ci --production` untuk production

### 5. Kompres File Statis
- Gunakan gzip/brotli compression di server
- Minify CSS/JS files

## Cek Ukuran Proyek

### Windows (PowerShell)
```powershell
# Total size
$size = (Get-ChildItem -Recurse -File -ErrorAction SilentlyContinue | Measure-Object -Property Length -Sum).Sum
Write-Host "Total: $([math]::Round($size/1MB,2)) MB"

# Size per folder
Get-ChildItem -Directory | ForEach-Object {
    $size = (Get-ChildItem $_.FullName -Recurse -File -ErrorAction SilentlyContinue | Measure-Object -Property Length -Sum).Sum
    [PSCustomObject]@{Folder=$_.Name; "Size(MB)"=[math]::Round($size/1MB,2)}
} | Sort-Object "Size(MB)" -Descending
```

### Linux/Mac
```bash
# Total size
du -sh .

# Size per folder
du -sh */ | sort -h
```

## File yang Harus Diabaikan

Pastikan file berikut ada di `.gitignore`:
- `vendor/` - Dependencies PHP
- `node_modules/` - Dependencies Node.js
- `storage/logs/` - Log files
- `storage/framework/cache/` - Cache
- `.env` - Environment variables
- `*.log` - Log files
- Build artifacts

## Deployment

Untuk deployment (GitHub Pages, Vercel, dll):
- Hanya deploy file yang diperlukan
- Jangan include `vendor/` dan `node_modules/` di deployment
- Build assets terlebih dahulu (`npm run build`)
- Deploy hanya folder `docs/` atau `public/` yang sudah di-build

## Monitoring

Cek ukuran secara berkala:
1. Sebelum commit besar
2. Setelah menambahkan dependencies baru
3. Setelah menambahkan assets (gambar/video)

Jika ukuran melebihi 200MB, pertimbangkan untuk:
- Optimasi gambar
- Pindahkan file besar ke CDN
- Hapus file yang tidak diperlukan

