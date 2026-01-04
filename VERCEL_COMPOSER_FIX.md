# 🔧 Fix: Composer Command Not Found di Vercel

## Masalah
```
sh: line 1: composer: command not found
Error: Command "composer install --no-dev --optimize-autoloader --no-interaction" exited with 127
```

## Penyebab
Vercel PHP runtime tidak memiliki Composer terinstall secara default. Composer perlu diinstall terlebih dahulu sebelum bisa digunakan.

## ✅ Solusi yang Diterapkan

### 1. Install Composer di Build Command
File `vercel.json` sudah dikonfigurasi untuk:
1. Download Composer installer
2. Install Composer sebagai `composer.phar`
3. Gunakan `php composer.phar` untuk install dependencies
4. Hapus file temporary setelah selesai

### 2. Konfigurasi `vercel.json`

```json
{
  "installCommand": "php -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\" && php composer-setup.php && php composer.phar install --no-dev --optimize-autoloader --no-interaction && rm composer-setup.php composer.phar",
  "buildCommand": "php -r \"copy('https://getcomposer.org/installer', 'composer-setup.php');\" && php composer-setup.php && php composer.phar install --no-dev --optimize-autoloader --no-interaction && rm composer-setup.php composer.phar && npm install && npm run build"
}
```

**Penjelasan**:
- `php -r "copy(...)"` - Download Composer installer
- `php composer-setup.php` - Install Composer
- `php composer.phar install --no-dev` - Install dependencies tanpa dev packages
- `rm composer-setup.php composer.phar` - Hapus file temporary

### 3. `.vercelignore`
File temporary Composer sudah di-exclude:
- `composer.phar`
- `composer-setup.php`

## 🚀 Deploy

1. **Commit perubahan**:
   ```bash
   git add vercel.json .vercelignore
   git commit -m "Fix: Install Composer in Vercel build"
   git push
   ```

2. **Monitor build logs**:
   - Pastikan melihat: "Installing dependencies..."
   - Tidak ada error "composer: command not found"
   - Vendor folder terinstall dengan benar

## 📊 Expected Output

Build logs seharusnya menunjukkan:
```
Installing dependencies...
Loading composer repositories with package information
Installing dependencies from lock file
...
Generating optimized autoload files
```

## ⚠️ Troubleshooting

### Jika masih error "composer: command not found"
- Pastikan command menggunakan `php composer.phar` bukan hanya `composer`
- Cek build logs untuk melihat di step mana error terjadi

### Jika error "composer-setup.php not found"
- Pastikan command download Composer berhasil
- Cek koneksi internet di Vercel build environment

### Jika vendor/ tidak terinstall
- Pastikan `composer.phar` berhasil dibuat
- Cek apakah `composer.json` dan `composer.lock` ada
- Pastikan tidak ada error di step install dependencies

## 🔗 Alternatif

Jika masalah masih terjadi, pertimbangkan:
1. **Include vendor/ yang sudah di-build** - Ubah `.vercelignore` untuk tidak exclude `vendor/`
2. **Gunakan platform lain** - Railway atau Render yang lebih mudah untuk Laravel

Lihat `DEPLOYMENT_OPTIONS.md` untuk alternatif platform.

