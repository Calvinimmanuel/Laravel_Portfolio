# 🔧 Fix: "Target class [view] does not exist" Error

## Masalah
```
"error": "Target class [view] does not exist."
"file": ".../Illuminate/Container/Container.php"
"line": 1124
```

## Penyebab
Laravel tidak bisa menemukan service binding untuk 'view'. Ini biasanya terjadi karena:
1. Service providers tidak ter-register dengan benar
2. Bootstrap cache tidak ada atau corrupt
3. ViewServiceProvider tidak ter-load

## ✅ Solusi

### 1. Clear Bootstrap Cache

Bootstrap cache mungkin corrupt atau tidak ada. Clear cache:

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### 2. Rebuild Bootstrap Cache

Jika masih error, rebuild bootstrap cache:

```bash
# Hapus cache files
rm -rf bootstrap/cache/*.php

# Rebuild (akan otomatis dibuat saat app boot)
```

### 3. Pastikan Service Providers Ter-register

Laravel 11 menggunakan auto-discovery untuk service providers. Pastikan:
- `bootstrap/providers.php` ada dan berisi minimal `App\Providers\AppServiceProvider::class`
- Core service providers (View, Routing, dll) akan auto-discovered

### 4. Check Environment Variables

Pastikan environment variables sudah di-set dengan benar:
```bash
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xxxxx...
LOG_CHANNEL=stderr
```

### 5. Rebuild Vendor (Jika Perlu)

Jika masalah persist, rebuild vendor:
```bash
composer install --no-dev --optimize-autoloader
```

## 🚀 Langkah-langkah untuk Vercel

### Step 1: Clear Cache Lokal
```bash
php artisan optimize:clear
```

Ini akan clear semua cache termasuk bootstrap cache.

### Step 2: Rebuild Bootstrap Cache
```bash
php artisan optimize
```

Ini akan rebuild bootstrap cache dengan benar.

### Step 3: Pastikan Bootstrap Cache Tidak Di-ignore

Cek `.gitignore` - bootstrap cache **TIDAK** seharusnya di-ignore karena:
- Laravel perlu cache untuk performance
- Di Vercel, filesystem read-only jadi tidak bisa rebuild
- Cache harus di-commit ke Git

Pastikan `.gitignore` **TIDAK** berisi:
```
# JANGAN ignore ini:
# bootstrap/cache/*.php  ❌
```

### Step 4: Commit Bootstrap Cache
```bash
git add bootstrap/cache/*.php
git commit -m "Add bootstrap cache for Vercel deployment"
git push
```

### Step 5: Redeploy di Vercel
- Vercel akan menggunakan bootstrap cache yang sudah di-commit
- Service providers akan ter-register dengan benar
- View service akan tersedia

## 🔍 Debugging

### Check Service Providers
```bash
php artisan about
```

Cek apakah Views terdeteksi.

### Check Bootstrap Files
Pastikan file berikut ada:
- `bootstrap/app.php`
- `bootstrap/providers.php`
- `bootstrap/cache/` (akan dibuat otomatis)

### Enable Debug Mode (Temporary)
Set di Vercel:
```
APP_DEBUG=true
```

Ini akan menampilkan error details yang lebih lengkap.

## ⚠️ Catatan Penting

- **Jangan commit** `bootstrap/cache/*.php` ke Git
- Bootstrap cache akan dibuat otomatis saat app boot
- Jika cache corrupt, hapus dan biarkan Laravel rebuild

## 📝 Checklist

- [ ] Clear config/cache/view cache
- [ ] Hapus bootstrap/cache/*.php
- [ ] Pastikan bootstrap/providers.php ada
- [ ] Rebuild vendor dengan --optimize-autoloader
- [ ] Environment variables sudah di-set
- [ ] Commit dan push
- [ ] Redeploy di Vercel

## 🔗 Related

- `VERCEL_HTTP_500_FIX.md` - General HTTP 500 troubleshooting
- `VERCEL_READONLY_FIX.md` - Read-only filesystem fix
- `bootstrap/app.php` - Application bootstrap

