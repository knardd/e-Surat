# ✅ Checklist Implementasi Workflow Approval

## 📌 Fase 1: Backend Logic (SELESAI ✅)

### Database & Models

- ✅ `user_id` sudah ada di tabel `surats`
- ✅ Surat model: relasi ke User, SuratLogs, dan approval handlers
- ✅ SuratLogs model: fixed typo dari `chaged_by` → `changed_by`
- ✅ Migration SuratLogs: sudah ada structure yang benar

### Controllers - Approval Logic

- ✅ **SuratController**
    - `proses()` - set `user_id` dan `status = 'diproses'`
    - `userDashboard()` - list surat user dengan status
    - `download()` - download PDF (hanya jika `final_approved`)

- ✅ **OperatorController**
    - `index()` - list surat `status = 'diproses'`
    - `show()` - detail surat pending
    - `approve()` - ubah ke `status = 'disetujui'` + log
    - `reject()` - ubah ke `status = 'ditolak'` + log

- ✅ **AdminController**
    - `cekSurat()` - list surat `status = 'disetujui'` dan `waiting_admin`
    - `show()` - detail surat waiting admin
    - `approve()` - ubah ke `internal_status = 'final_approved'`
    - `reject()` - ubah ke `status = 'ditolak'`

### Routes

- ✅ User routes: `/user/dashboard`, `/surat/download/{id}`
- ✅ Operator routes: `/operator/dashboard`, `/operator/surat/{id}`, approval routes
- ✅ Admin routes: `/admin/cekSurat`, approval routes

### Middleware

- ✅ Role middleware `CheckRole` sudah ada dan registered

---

## 📌 Fase 2: Frontend Pages (TODO)

### Halaman yang Perlu Dibuat:

#### 1. User Dashboard (`resources/js/Pages/User/Dashboard.jsx`)

```
- List surat user dengan kolom:
  - Tanggal dibuat
  - Jenis surat
  - Status (badge color-coded)
  - Action buttons:
    - View Detail (modal)
    - Download (jika final_approved)
    - Delete (jika masih pending)
```

#### 2. Operator Dashboard (`resources/js/Pages/Operator/Dashboard.jsx`)

```
- List surat status "diproses"
- Filter, search
- Tabel dengan:
  - No Surat
  - Jenis
  - Pemohon (user name)
  - Tanggal diminta
  - Status
  - Action: View → Approve/Reject
```

#### 3. Operator Show Surat (`resources/js/Pages/Operator/ShowSurat.jsx`)

```
- Detail surat
- Semua field yang user masukkan
- History (logs)
- Form approval:
  - Textarea untuk catatan (optional)
  - Buttons: Approve / Reject / Back
```

#### 4. Admin Dashboard (`resources/js/Pages/Admin/CekSurat.jsx`)

```
SAMA seperti Operator Dashboard, tapi:
- Filter surat `status = 'disetujui'` and `internal_status = 'waiting_admin'`
- Menampilkan siapa (operator) yang approve sebelum admin
- History dari operator review
```

#### 5. Admin Show Surat (`resources/js/Pages/Admin/ShowSurat.jsx`)

```
- Detail surat
- History approval dari operator
- Catatan dari operator
- Form approval admin:
  - Textarea untuk catatan (optional)
  - Buttons: Approve / Reject / Back
```

---

## 🔄 Status Colors Guide

```
Untuk badge/styling di pages:
- "diproses" (pending operator) = YELLOW
- "disetujui" (approved operator, waiting admin) = BLUE
- "ditolak" (rejected) = RED
- "final_approved" (approved by admin) = GREEN
```

---

## 📝 Data yang Tersedia di Pages

### User Dashboard

```javascript
surats = [
    {
        id,
        user_id,
        jenis: { id, name, slug },
        status: "diproses|disetujui|ditolak",
        internal_status:
            "submitted|waiting_admin|admin_rejected|final_approved",
        no_surat,
        tanggal_surat,
        catatan, // jika ditolak
        logs: [{ status, changed_by, catatan, created_at }],
    },
];
```

### Operator Dashboard

```javascript
surats = [
    {
        id,
        user: { id, name, email, nik },
        jenis: { id, name },
        status: "diproses",
        no_surat,
        tanggal_surat,
        created_at,
    },
];
```

---

## 🚀 Next Steps

### Langkah 1: Create User Dashboard

1. Buat folder `resources/js/Pages/User/`
2. Buat file `Dashboard.jsx`
3. Show list surat + status badges
4. Add download button untuk yang approved

### Langkah 2: Create Operator Pages

1. Buat folder `resources/js/Pages/Operator/`
2. Buat `Dashboard.jsx` - list pending surats
3. Buat `ShowSurat.jsx` - detail + approval form
4. Implement approve/reject modal atau separate page

### Langkah 3: Create Admin Pages

1. Buat folder `resources/js/Pages/Admin/`
2. Update/create `CekSurat.jsx` - list waiting surats
3. Buat `ShowSurat.jsx` - detail + final approval form
4. Keep existing Dashboard component unchanged

### Langkah 4: Testing

1. Create user → request surat → status should be "diproses"
2. Login as operator → approve/reject
3. Login as admin → approve/reject
4. User should be able to download final surat

---

## 🔑 Resource Routes untuk Frontend

```javascript
// Untuk form submissions:
POST /operator/surat/{id}/approve
POST /operator/surat/{id}/reject
POST /admin/surat/{id}/approve
POST /admin/surat/{id}/reject

// Payload:
{
  "catatan": "string (optional untuk approve, required untuk reject)"
}

// Response (redirect + flash message):
session('success') atau session('error')
```

---

## 📊 Database Summary

### Status Flow

```
User submit surat
    ↓
status = "diproses", internal_status = "submitted"
    ↓
Operator approve → status = "disetujui", internal_status = "waiting_admin"
         atau
Operator reject → status = "ditolak", internal_status = "operator_rejected"
    ↓
Admin approve → status = "disetujui", internal_status = "final_approved"
        atau
Admin reject → status = "ditolak", internal_status = "admin_rejected"
    ↓
User can download (hanya jika final_approved)
```

---

Siap untuk buat frontend pages?
