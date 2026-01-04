# 🔧 Fix: File index.php Terdownload di Vercel

## Masalah
Ketika mengakses URL Vercel, file `index.php` terdownload sebagai file, bukan dijalankan sebagai PHP.

## Penyebab
1. `outputDirectory: "public"` menyebabkan Vercel serve semua file di `public/` sebagai static files
2. Routing tidak bekerja dengan benar
3. Static files tidak di-handle dengan benar

## ✅ Solusi yang Diterapkan

### 1. Update `vercel.json`
- **Hapus `outputDirectory`** - Tidak diperlukan karena kita handle routing manual
- **Tambah routes untuk static files** - Serve assets dari `public/`
- **Route semua request ke `api/lambda.php`** - Kecuali static files

```json
{
  "routes": [
    {
      "src": "/build/(.*)",
      "dest": "/public/build/$1"
    },
    {
      "src": "/images/(.*)",
      "dest": "/public/images/$1"
    },
    {
      "src": "/(.*\\.(js|css|png|jpg|jpeg|gif|svg|ico|woff|woff2|ttf|eot))",
      "dest": "/public/$1"
    },
    {
      "src": "/(.*)",
      "dest": "/api/lambda.php"
    }
  ]
}
```

### 2. Update `api/lambda.php`
Menambahkan proper request handling dengan kernel:
```php
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
```

## 🚀 Deploy

1. **Commit perubahan**:
   ```bash
   git add vercel.json api/lambda.php
   git commit -m "Fix: Proper routing for Vercel, prevent index.php download"
   git push
   ```

2. **Deploy ke Vercel**:
   - Static files akan di-serve dari `public/`
   - PHP requests akan di-handle oleh `api/lambda.php`
   - Tidak ada lagi file download

## 📝 Penjelasan Routes

1. **Static Assets** (`/build/*`, `/images/*`, `*.js`, `*.css`, dll):
   - Di-serve langsung dari `public/` folder
   - Tidak melalui PHP

2. **All Other Requests** (`/(.*)`):
   - Di-route ke `api/lambda.php`
   - Laravel akan handle routing

## ⚠️ Troubleshooting

Jika masih ada masalah:
- Cek build logs di Vercel dashboard
- Pastikan `vendor/` folder sudah di-commit
- Pastikan static files ada di `public/build/` setelah build
- Cek environment variables di Vercel dashboard

## 🔗 Environment Variables

Pastikan setup di Vercel Dashboard:
```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:... (generate dengan: php artisan key:generate)
APP_URL=https://your-domain.vercel.app
```

