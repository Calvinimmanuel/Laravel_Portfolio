# 🔧 Build Vendor untuk Vercel Deployment

## Masalah
Vercel PHP runtime tidak memiliki PHP/Composer di build environment, jadi dependencies tidak bisa diinstall di Vercel.

## ✅ Solusi: Build Vendor Lokal

Karena Vercel tidak bisa install dependencies, kita perlu build `vendor/` folder lokal dan include di deployment.

### Langkah-langkah:

1. **Build vendor dengan --no-dev**:
   ```powershell
   composer install --no-dev --optimize-autoloader --no-interaction
   ```

2. **Cek ukuran**:
   ```powershell
   .\check-vercel-size.ps1
   ```
   
   Pastikan ukuran < 200MB.

3. **Commit vendor/**:
   ```bash
   git add vendor/
   git commit -m "Add vendor/ for Vercel deployment"
   git push
   ```

4. **Deploy ke Vercel**:
   - Vercel akan menggunakan vendor/ yang sudah di-build
   - Tidak perlu install dependencies di Vercel

## ⚠️ Penting

- **JANGAN commit vendor/ dengan dev dependencies**
- **Selalu gunakan `--no-dev`** sebelum commit vendor/
- **Update vendor/ setiap kali composer.json berubah**

## 🔄 Update Vendor

Jika menambah/mengubah dependencies:

1. Update `composer.json` atau `composer.lock`
2. Rebuild vendor:
   ```powershell
   composer install --no-dev --optimize-autoloader
   ```
3. Commit perubahan:
   ```bash
   git add vendor/ composer.lock
   git commit -m "Update dependencies"
   git push
   ```

## 📊 Ukuran

Setelah build dengan `--no-dev`:
- Vendor size: ~23 MB
- Total size: ~24 MB
- Dengan runtime: ~74 MB ✅

## 🚨 Alternatif

Jika tidak ingin commit vendor/:
- Gunakan platform lain (Railway, Render) yang lebih cocok untuk Laravel
- Lihat `DEPLOYMENT_OPTIONS.md` untuk detail

