# Opsi Deployment untuk Laravel Portfolio

## ⚠️ Vercel TIDAK Mendukung Laravel
Vercel sudah tidak mendukung runtime PHP. Laravel memerlukan server PHP, jadi **tidak bisa di-deploy ke Vercel**.

## ✅ Rekomendasi Hosting untuk Laravel

### 1. **Railway** (PALING MUDAH) ⭐
- **URL**: https://railway.app
- **Harga**: Gratis untuk mulai ($5/bulan setelah free tier)
- **Keuntungan**:
  - Auto-deploy dari GitHub
  - Setup otomatis untuk Laravel
  - Database included
  - SSL otomatis
- **Cara**:
  1. Daftar di Railway
  2. Connect GitHub repository
  3. Railway akan auto-detect Laravel
  4. Deploy!

### 2. **Render** (GRATIS TIER) ⭐
- **URL**: https://render.com
- **Harga**: Gratis tier tersedia
- **Keuntungan**:
  - Free tier untuk web service
  - Auto-deploy dari GitHub
  - SSL otomatis
- **Cara**:
  1. Daftar di Render
  2. New Web Service
  3. Connect repository
  4. Build Command: `composer install --no-dev --optimize-autoloader && npm install && npm run build`
  5. Start Command: `php artisan serve --host=0.0.0.0 --port=$PORT`
  6. Deploy!

### 3. **VPS** (DigitalOcean/Vultr)
- **Harga**: ~$5/bulan
- **Kontrol**: Penuh
- **Setup**: Manual (perlu konfigurasi server)

### 4. **Shared Hosting** (Niagahoster, Hostinger)
- **Harga**: ~$2-5/bulan
- **Kesulitan**: Mudah untuk pemula
- **Cara**: Upload via FTP/cPanel

## 🚀 Quick Start dengan Railway

1. **Daftar**: https://railway.app
2. **New Project** → **Deploy from GitHub repo**
3. **Pilih repository** Anda
4. **Railway akan otomatis**:
   - Detect Laravel
   - Install dependencies
   - Build assets
   - Deploy!

5. **Setup Environment Variables** di Railway Dashboard:
   ```
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:... (generate dengan: php artisan key:generate)
   SESSION_DRIVER=file
   CACHE_DRIVER=file
   ```

6. **Selesai!** Portfolio Anda akan live di URL Railway.

## 📝 Catatan Penting

- **Jangan** commit file `.env` ke Git
- Set `APP_DEBUG=false` di production
- Setup SSL certificate (Railway/Render sudah include)
- Backup database secara rutin

