# 🔧 Fix: Vercel Next.js Detection Error

## Masalah
```
Warning: Could not identify Next.js version
Error: No Next.js version detected
```

## Penyebab
Vercel salah mendeteksi proyek sebagai Next.js karena:
- Ada `package.json` di root (untuk Vite/build assets)
- Vercel auto-detect framework dari package.json

## ✅ Solusi yang Diterapkan

### 1. Fix `api/lambda.php`
Path autoloader sudah diperbaiki:
- ❌ Sebelum: `require __DIR__.'/../public/index.php';`
- ✅ Sesudah: `require __DIR__.'/../vendor/autoload.php';`

### 2. Update `vercel.json`
Menambahkan `"framework": null` untuk explicitly disable framework detection:
```json
{
  "version": 2,
  "framework": null,
  "functions": {
    "api/lambda.php": {
      "runtime": "vercel-php@0.7.4"
    }
  }
}
```

## 🚀 Deploy

1. **Commit perubahan**:
   ```bash
   git add vercel.json api/lambda.php
   git commit -m "Fix: Disable Next.js detection, use PHP runtime"
   git push
   ```

2. **Deploy ke Vercel**:
   - Vercel akan menggunakan PHP runtime
   - Tidak akan mencari Next.js

## 📝 Penjelasan

- `"framework": null` - Explicitly disable framework auto-detection
- `"runtime": "vercel-php@0.7.4"` - Specify PHP runtime untuk function
- `package.json` tetap diperlukan untuk build Vite assets (CSS/JS)

## ⚠️ Catatan

Jika masih ada error:
- Pastikan `vendor/` folder sudah di-commit (built with --no-dev)
- Cek build logs di Vercel dashboard
- Pastikan `api/lambda.php` path benar

