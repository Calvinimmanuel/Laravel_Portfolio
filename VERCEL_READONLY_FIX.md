# 🔧 Fix: Read-only File System Error di Vercel

## Masalah
```
"There is no existing directory at \"/var/task/user/storage/logs\" 
and it could not be created: Read-only file system"
```

## Penyebab
Vercel serverless environment menggunakan **read-only filesystem**. Laravel secara default mencoba menulis logs ke `storage/logs/laravel.log`, yang tidak bisa dilakukan di Vercel.

## ✅ Solusi

### Setup Environment Variable di Vercel

**PENTING**: Tambahkan `LOG_CHANNEL=stderr` di Vercel Environment Variables!

1. **Buka Vercel Dashboard**:
   - https://vercel.com/dashboard
   - Pilih project Anda
   - Settings → Environment Variables

2. **Tambahkan/Update**:
   ```
   LOG_CHANNEL=stderr
   ```

3. **Environment Variables Lengkap untuk Vercel**:
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:xxxxx...
   APP_URL=https://your-domain.vercel.app
   LOG_CHANNEL=stderr          # ⚠️ WAJIB untuk Vercel!
   SESSION_DRIVER=cookie       # Recommended untuk serverless
   CACHE_DRIVER=array          # Recommended untuk serverless
   ```

4. **Redeploy** setelah update environment variables

## 📝 Penjelasan

### LOG_CHANNEL=stderr
- `stderr` channel sudah dikonfigurasi di `config/logging.php`
- Menulis logs ke `php://stderr` (bukan file)
- Logs akan muncul di **Vercel Function Logs** (dashboard)
- Tidak memerlukan filesystem write permission

### SESSION_DRIVER=cookie
- Session disimpan di cookie (client-side)
- Tidak memerlukan file storage
- Cocok untuk serverless

### CACHE_DRIVER=array
- Cache disimpan di memory (temporary)
- Tidak memerlukan file storage
- Cocok untuk serverless

## 🔍 Cek Logs di Vercel

Setelah setup `LOG_CHANNEL=stderr`:
1. Go to Vercel Dashboard
2. Deployments → Pilih deployment terbaru
3. Functions tab
4. Klik function `api/lambda.php`
5. Logs akan muncul di sini (dari stderr)

## ⚠️ Troubleshooting

### Masih error "Read-only file system"
- Pastikan `LOG_CHANNEL=stderr` sudah di-set
- Pastikan sudah redeploy setelah update env vars
- Cek Function Logs untuk error lainnya

### Logs tidak muncul
- Logs akan muncul di Vercel Function Logs (dashboard)
- Tidak ada file log di storage/
- Ini normal untuk serverless

### Error lain setelah fix logging
- Cek Function Logs untuk error details
- Pastikan semua env vars sudah di-set (APP_KEY, dll)
- Lihat `VERCEL_HTTP_500_FIX.md` untuk troubleshooting lengkap

## 🚀 Quick Fix Checklist

- [ ] `LOG_CHANNEL=stderr` di Vercel Environment Variables
- [ ] `SESSION_DRIVER=cookie` di Vercel Environment Variables
- [ ] `CACHE_DRIVER=array` di Vercel Environment Variables
- [ ] `APP_KEY` sudah di-set
- [ ] Redeploy setelah update env vars
- [ ] Cek Function Logs untuk konfirmasi

## 📚 Related Files

- `VERCEL_HTTP_500_FIX.md` - General HTTP 500 troubleshooting
- `config/logging.php` - Logging configuration
- `VERCEL_DEPLOYMENT.md` - Complete deployment guide

