## Versi Bahasa Indonesia

Dokumentasi ini menjelaskan seluruh endpoint API pada sistem Prayerkids HR.

### Ringkasan

- Base URL mengikuti konfigurasi environment backend.
- Semua response mengikuti pola standar: `meta`, `data` (sukses), dan `errors` (gagal).
- Hampir semua endpoint membutuhkan autentikasi Sanctum Bearer token.

### Langkah Penggunaan Cepat

1. Login lewat endpoint `POST /api/login`.
2. Ambil nilai `access_token` dari response.
3. Kirim header: `Authorization: Bearer {token}`.
4. Gunakan endpoint lain sesuai role dan permission user.

### Format Response

```json
{
    "meta": {
        "status": "success",
        "code": 200,
        "message": "Pesan"
    },
    "data": {}
}
```

```json
{
    "meta": {
        "status": "error",
        "code": 422,
        "message": "Validasi request gagal."
    },
    "errors": {
        "field": ["Pesan error"]
    }
}
```
