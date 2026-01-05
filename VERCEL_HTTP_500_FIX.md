# 🔧 Fix: HTTP 500 Error di Vercel

## Masalah
```
This page isn't working
laravel-portfolio-nine.vercel.app is currently unable to handle this request.
HTTP ERROR 500
```

## Penyebab Umum

1. **Missing Environment Variables** (Paling sering)
   - `APP_KEY` tidak di-set (required untuk Laravel)
   - `APP_ENV` tidak di-set
   - `APP_DEBUG` tidak di-set

2. **Missing Dependencies**
   - `vendor/` folder tidak ada atau tidak lengkap
   - Autoloader tidak bisa ditemukan

3. **Path Issues**
   - Path ke file tidak benar
   - Storage folder tidak accessible

4. **PHP Errors**
   - Syntax error
   - Missing class/function

## ✅ Solusi yang Diterapkan

### 1. Update `api/lambda.php`
Menambahkan error handling yang lebih baik:
- Check jika `vendor/autoload.php` ada
- Try-catch untuk handle errors
- Error logging
- Conditional error display (berdasarkan APP_DEBUG)

### 2. Setup Environment Variables di Vercel

**PENTING**: Setup environment variables di Vercel Dashboard:

1. **Buka Vercel Dashboard** → Project → Settings → Environment Variables

2. **Tambahkan variables berikut**:

```bash
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_URL=https://laravel-portfolio-nine.vercel.app
```

3. **Generate APP_KEY**:
   ```bash
   php artisan key:generate --show
   ```
   
   Copy output dan paste ke `APP_KEY` di Vercel.

   Atau jika sudah ada `.env` lokal:
   ```bash
   # Di .env lokal, copy value APP_KEY
   # Format: base64:xxxxx...
   ```

4. **Required for Vercel** (PENTING!):
   ```bash
   LOG_CHANNEL=stderr
   SESSION_DRIVER=cookie
   CACHE_DRIVER=array
   ```
   
   **⚠️ LOG_CHANNEL=stderr WAJIB!** 
   - Vercel filesystem adalah read-only
   - Laravel tidak bisa write ke `storage/logs/`
   - `stderr` channel menulis ke stderr (Vercel Function Logs)
   - Tanpa ini, akan error: "Read-only file system"

## 🚀 Langkah-langkah

### Step 1: Generate APP_KEY

Jika belum ada APP_KEY:
```bash
php artisan key:generate --show
```

Copy output (format: `base64:xxxxx...`)

### Step 2: Setup di Vercel Dashboard

1. Go to: https://vercel.com/dashboard
2. Pilih project Anda
3. Settings → Environment Variables
4. Add variables:
   - `APP_ENV` = `production`
   - `APP_DEBUG` = `false`
   - `APP_KEY` = `base64:xxxxx...` (dari step 1)
   - `APP_URL` = `https://laravel-portfolio-nine.vercel.app`

### Step 3: Redeploy

Setelah setup environment variables:
1. Go to Deployments tab
2. Klik "..." pada deployment terbaru
3. Pilih "Redeploy"
4. Atau push commit baru untuk trigger auto-deploy

## 🔍 Debugging

### Cek Build Logs
1. Go to Vercel Dashboard → Deployments
2. Klik deployment terbaru
3. Cek "Build Logs" dan "Function Logs"

### Enable Debug Mode (Temporary)
Untuk melihat error details, set di Vercel:
```
APP_DEBUG=true
```

**⚠️ Jangan lupa set kembali ke `false` setelah debugging!**

### Cek Error Logs
Error akan di-log ke:
- Vercel Function Logs (di dashboard)
- Browser console (jika APP_DEBUG=true)

## ⚠️ Troubleshooting

### Error: "vendor/autoload.php not found"
- Pastikan `vendor/` folder sudah di-commit
- Pastikan build dengan `composer install --no-dev`

### Error: "APP_KEY not set"
- Pastikan `APP_KEY` sudah di-set di Vercel Environment Variables
- Format harus: `base64:xxxxx...`

### Error: "Class not found"
- Pastikan `vendor/` folder lengkap
- Rebuild dengan `composer install --no-dev --optimize-autoloader`

### Error: "Storage not writable"
- Vercel serverless tidak support file storage
- Gunakan `SESSION_DRIVER=cookie` dan `CACHE_DRIVER=array`

## 📝 Checklist

- [ ] APP_KEY sudah di-set di Vercel
- [ ] APP_ENV=production
- [ ] APP_DEBUG=false (atau true untuk debugging)
- [ ] APP_URL sesuai dengan domain Vercel
- [ ] vendor/ folder sudah di-commit
- [ ] Build logs tidak ada error
- [ ] Function logs tidak ada error

## 🔗 Resources

- [Laravel Environment Configuration](https://laravel.com/docs/configuration#environment-configuration)
- [Vercel Environment Variables](https://vercel.com/docs/concepts/projects/environment-variables)

