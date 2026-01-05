# 🔧 Fix: No Output Directory Error di Vercel

## Masalah
```
Error: No Output Directory named "dist" found after the Build completed.
Update vercel.json#outputDirectory to ensure the correct output directory is generated.
```

## Penyebab
Vercel memerlukan `outputDirectory` untuk mengetahui folder mana yang berisi static files. Tanpa ini, Vercel akan mencari folder default seperti `dist` atau `out`.

## ✅ Solusi yang Diterapkan

### Update `vercel.json`
Menambahkan `outputDirectory: "public"` karena:
- Laravel serve static files dari folder `public/`
- Build assets (Vite) juga output ke `public/build/`
- Vercel perlu tahu folder ini untuk serve static files

```json
{
  "version": 2,
  "outputDirectory": "public",
  "routes": [
    {
      "src": "/build/(.*)",
      "dest": "/build/$1"
    },
    {
      "src": "/(.*)",
      "dest": "/api/lambda.php"
    }
  ]
}
```

### Update Routes
Karena `outputDirectory` sudah set ke `public`, routes tidak perlu prefix `/public/`:
- ✅ `/build/$1` (bukan `/public/build/$1`)
- ✅ `/images/$1` (bukan `/public/images/$1`)
- ✅ `/$1` untuk static files (bukan `/public/$1`)

## 🚀 Deploy

1. **Commit perubahan**:
   ```bash
   git add vercel.json
   git commit -m "Fix: Add outputDirectory for Vercel"
   git push
   ```

2. **Deploy ke Vercel**:
   - Vercel akan detect `public/` sebagai output directory
   - Static files akan di-serve dari `public/`
   - PHP requests akan di-route ke `api/lambda.php`

## 📝 Penjelasan

- `outputDirectory: "public"` - Vercel akan serve static files dari folder ini
- Routes dengan `dest: "/build/$1"` - Relative ke outputDirectory
- Route terakhir `dest: "/api/lambda.php"` - Handle semua request lainnya dengan PHP

## ⚠️ Catatan

- Pastikan `public/build/` ada setelah `npm run build`
- Pastikan static files (images, favicon, dll) ada di `public/`
- Route order penting - static files harus di-check sebelum PHP route

