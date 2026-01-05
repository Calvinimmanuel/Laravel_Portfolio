# 🚨 Quick Fix: "Target class [view] does not exist"

## Error
```
"error": "Target class [view] does not exist."
```

## ✅ Solusi Cepat

### 1. Rebuild Bootstrap Cache Lokal
```bash
php artisan optimize:clear
php artisan optimize
```

### 2. Commit Bootstrap Cache
```bash
git add bootstrap/cache/*.php
git commit -m "Add bootstrap cache for Vercel"
git push
```

### 3. Pastikan Environment Variables
Di Vercel Dashboard, pastikan sudah di-set:
```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xxxxx...
LOG_CHANNEL=stderr
```

### 4. Redeploy
Setelah push, Vercel akan auto-deploy.

## 📝 Penjelasan

- Bootstrap cache (`bootstrap/cache/services.php`) berisi daftar service providers
- ViewServiceProvider harus terdaftar di cache
- Di Vercel (read-only filesystem), cache harus di-commit ke Git
- Laravel tidak bisa rebuild cache di Vercel, jadi harus sudah ada

## ⚠️ Catatan

- Bootstrap cache **TIDAK** di-ignore di `.gitignore`
- Cache harus di-commit untuk Vercel deployment
- Rebuild cache setiap kali menambah service provider baru

