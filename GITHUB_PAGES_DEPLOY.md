# 🚀 Deploy Portfolio ke GitHub Pages

Karena GitHub Pages hanya mendukung static files, kita perlu mengkonversi Laravel Blade templates menjadi HTML statis.

## 📋 Prerequisites

- PHP 8.2+
- Composer
- Node.js & NPM

## 🔧 Setup

### 1. Install Dependencies

```bash
composer install
npm install
```

### 2. Build Assets

```bash
npm run build
```

### 3. Generate Static HTML

```bash
php generate-static.php
```

Script ini akan:
- Generate HTML dari semua Blade templates
- Copy semua assets ke folder `docs/`
- Fix semua path untuk GitHub Pages

## 📁 Struktur Output

Setelah generate, folder `docs/` akan berisi:
```
docs/
├── index.html          # Homepage
├── dashboard/
│   └── index.html      # Dashboard
├── portfolio/
│   ├── foto/
│   │   └── index.html
│   ├── video/
│   │   └── index.html
│   ├── desain/
│   │   └── index.html
│   └── coding/
│       └── index.html
└── public/             # Assets (images, CSS, JS)
    ├── build/
    └── images/
```

## 🌐 Deploy ke GitHub Pages

### Opsi 1: Manual Deploy

1. **Generate static files:**
   ```bash
   php generate-static.php
   ```

2. **Commit dan push:**
   ```bash
   git add docs/
   git commit -m "Deploy to GitHub Pages"
   git push origin main
   ```

3. **Setup GitHub Pages:**
   - Go to repository Settings → Pages
   - Source: Deploy from a branch
   - Branch: `main` / Folder: `docs`
   - Save

4. **Selesai!** Website akan live di:
   `https://[username].github.io/[repository-name]/`

### Opsi 2: Auto Deploy dengan GitHub Actions

GitHub Actions akan otomatis generate dan deploy setiap kali push ke `main` branch.

1. **File sudah dibuat:** `.github/workflows/deploy-gh-pages.yml`

2. **Pastikan repository name di script:**
   - Edit `generate-static.php`
   - Ubah `$baseUrl = '/Portofolio';` sesuai nama repository Anda

3. **Push ke GitHub:**
   ```bash
   git add .
   git commit -m "Setup GitHub Pages deployment"
   git push origin main
   ```

4. **GitHub Actions akan otomatis:**
   - Generate static HTML
   - Deploy ke GitHub Pages
   - Update setiap kali ada push baru

## ⚙️ Konfigurasi

### Ubah Base URL

Jika repository name berbeda, edit `generate-static.php`:

```php
$baseUrl = '/nama-repository-anda'; // Ganti ini
```

### Custom Domain

Jika punya custom domain:

1. Buat file `docs/CNAME`:
   ```
   yourdomain.com
   ```

2. Setup DNS di domain provider:
   - Type: CNAME
   - Name: @ atau www
   - Value: [username].github.io

## 🔄 Update Website

Setelah mengubah konten:

1. **Generate ulang:**
   ```bash
   php generate-static.php
   ```

2. **Commit dan push:**
   ```bash
   git add docs/
   git commit -m "Update portfolio"
   git push origin main
   ```

Jika menggunakan GitHub Actions, cukup push perubahan ke `main` branch.

## ⚠️ Catatan Penting

1. **GitHub Pages hanya static files:**
   - Tidak bisa menggunakan PHP
   - Tidak bisa menggunakan database
   - Semua data harus hardcoded atau dari API (seperti GitHub API untuk coding portfolio)

2. **Asset Paths:**
   - Semua path sudah di-fix otomatis oleh script
   - Pastikan base URL sesuai dengan repository name

3. **Build Assets:**
   - Pastikan selalu run `npm run build` sebelum generate static
   - Assets akan di-copy ke `docs/public/build/`

## 🐛 Troubleshooting

### Assets tidak muncul?

1. Check base URL di `generate-static.php`
2. Pastikan `npm run build` sudah dijalankan
3. Check browser console untuk 404 errors

### GitHub Actions gagal?

1. Check Actions tab di GitHub
2. Pastikan PHP dan Node.js version sesuai
3. Pastikan semua dependencies terinstall

### Halaman 404?

1. Pastikan folder structure benar
2. GitHub Pages butuh `index.html` di setiap folder
3. Check repository name di base URL

## 📚 Resources

- [GitHub Pages Documentation](https://docs.github.com/en/pages)
- [GitHub Actions Documentation](https://docs.github.com/en/actions)

