# Workflow Approval Surat E-Surat

## 📋 Overview

Sistem perubahan dari web statis menjadi sistem approval dengan 3 role:

- **User**: Meminta surat
- **Operator**: Review dan approve/reject dari user
- **Admin**: Final approval sebelum surat dikirim

---

## 🔄 Alur Workflow

```
USER membuat permintaan surat
    ↓
STATUS: pending (menunggu operator)
    ↓
OPERATOR melihat permintaan
    → Accept/Reject
    ↓
Jika APPROVE → STATUS: operator_approved (menunggu admin)
Jika REJECT → STATUS: operator_rejected (SELESAI - tidak lanjut)
    ↓
ADMIN melihat yang sudah di-approve operator
    → Accept/Reject
    ↓
Jika APPROVE → STATUS: admin_approved (SELESAI - BISA DI-DOWNLOAD)
Jika REJECT → STATUS: admin_rejected (SELESAI - tidak bisa)
```

---

## 📊 Status Surat

| Status              | Deskripsi                                | Siapa Lihat  | Action         |
| ------------------- | ---------------------------------------- | ------------ | -------------- |
| `pending`           | Menunggu operator review                 | Operator     | Approve/Reject |
| `operator_approved` | Sudah disetujui operator, menunggu admin | Admin        | Approve/Reject |
| `operator_rejected` | Ditolak operator                         | User         | Lihat catatan  |
| `admin_approved`    | Disetujui admin - READY                  | User + Admin | Download PDF   |
| `admin_rejected`    | Ditolak admin                            | User         | Lihat catatan  |

---

## 🗄️ Database Schema

### Surat Table (sudah ada, perlu perbaikan):

```
id
user_id ← PENTING: untuk tahu siapa yang meminta
jenis_id
status (pending, operator_approved, operator_rejected, admin_approved, admin_rejected)
internal_status (tracking detail)
current_handler (user_id dari yang lagi handle)
approved_by (user_id admin yang approve terakhir)
approved_at
catatan (untuk reject reason)
no_surat
tanggal_surat
no_urut
created_at
updated_at
```

### SuratLogs Table (untuk audit trail):

```
id
surat_id
user_id (siapa yang melakukan action)
action (created, operator_approved, operator_rejected, admin_approved, admin_rejected)
catatan
created_at
```

---

## 🎛️ Controller Actions yang Diperlukan

### SuratController

- `create()` - user bikin permintaan (sudah ada: `proses()`)
- `userDashboard()` - user lihat status surat mereka
- `downloadPdf()` - user download surat yang approved

### OperatorController

- `index()` - list surat yang `pending`
- `show()` - lihat detail surat yang pending
- `approve()` - approve surat (ubah status ke `operator_approved`)
- `reject()` - reject surat (ubah status ke `operator_rejected`, simpan catatan)

### AdminController

- `index()` - list surat yang `operator_approved`
- `show()` - lihat detail surat yang approved operator
- `approve()` - approve surat (ubah status ke `admin_approved`)
- `reject()` - reject surat (ubah status ke `admin_rejected`, simpan catatan)

---

## 🔒 Middleware & Authorization

### Role Middleware (sudah ada)

```php
// Di routes:
Route::middleware(['auth', 'role:operator'])->group(function() { ... });
```

### Permission Checks

- Only `operator` can approve pending surat
- Only `admin` can approve operator_approved surat
- Only `user` can see their own surat
- Only logged-in user can download their approved surat

---

## 📱 Pages/Views yang Diperlukan

### 1. User Dashboard

- List surat yang sudah dibuat user
- Status masing-masing surat
- Button download (hanya jika admin_approved)
- Show catatan jika di-reject

### 2. Operator Dashboard

- List surat status `pending`
- Filter, search
- Quick action: approve/reject
- Button lihat detail

### 3. Admin Dashboard

- List surat status `operator_approved`
- Filter, search
- Quick action: approve/reject
- Button lihat detail

### 4. Modal/Component untuk Approval

- Show detail surat
- Textarea untuk catatan (terutama untuk reject)
- Buttons: Approve / Reject / Cancel

---

## 🚀 Implementation Steps

### Langkah 1: Perbaiki Migration

- Pastikan kolom `user_id` ada di tabel `surats`
- Tambahkan relation user ke surat

### Langkah 2: Update Model

- Tambah method ke Surat model untuk relasi
- Tambah Status enum/constant

### Langkah 3: Update SuratController

- Update `proses()` untuk set `user_id` dan `status = 'pending'`
- Add `userDashboard()` method

### Langkah 4: Lengkapi OperatorController

- `index()` - query surat where status = pending
- `approve()` & `reject()` - update status + logging
- `show()` - detail view

### Langkah 5: Lengkapi AdminController

- `index()` - query surat where status = operator_approved
- `approve()` & `reject()` - update status + logging
- `show()` - detail view

### Langkah 6: Create Frontend Pages

- User dashboard (List surat user)
- Operator dashboard (List pending)
- Admin dashboard (List untuk approved)

### Langkah 7: Testing

- Test workflow dari awal sampai akhir
- Test edge cases (reject, re-submit, dll)

---

## 🔑 Key Points

1. **User yang membuat surat harus tercatat** (user_id)
2. **Setiap action harus terlog** (SuratLogs)
3. **Status jelas di database** (jangan pakai internal_status yang ambigu)
4. **Catatan untuk reject harus tersave**
5. **Role middleware harus konsisten di routes**
6. **User hanya bisa lihat surat mereka sendiri**

---

Mau mulai dari mana dulu?
