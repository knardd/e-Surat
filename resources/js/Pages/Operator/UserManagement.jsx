import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import Dropdown from "@/Components/Dropdown";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import Modal from "@/Components/Modal";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextInput from "@/Components/TextInput";
import { Head, useForm, router } from "@inertiajs/react";
import { useState } from "react";

export default function UserManagement({ users, filters }) {
    const [isCreateModalOpen, setIsCreateModalOpen] = useState(false);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);
    const [selectedUser, setSelectedUser] = useState(null);
    const [search, setSearch] = useState(filters.search || "");

    const { data, setData, post, patch, delete: destroy, processing, errors, reset, clearErrors } = useForm({
        name: "",
        email: "",
        nik: "",
        password: "",
        password_confirmation: "",
    });

    const openCreateModal = () => {
        reset();
        clearErrors();
        setIsCreateModalOpen(true);
    };

    const openEditModal = (user) => {
        setSelectedUser(user);
        setData({
            name: user.name,
            email: user.email,
            nik: user.nik,
            password: "",
            password_confirmation: "",
        });
        clearErrors();
        setIsEditModalOpen(true);
    };

    const openDeleteModal = (user) => {
        setSelectedUser(user);
        setIsDeleteModalOpen(true);
    };

    const handleSearch = (e) => {
        e.preventDefault();
        router.get(route('operator.users.index'), { search }, { preserveState: true });
    };

    const submitCreate = (e) => {
        e.preventDefault();
        post(route("operator.users.store"), {
            onSuccess: () => {
                setIsCreateModalOpen(false);
                reset();
            },
        });
    };

    const submitEdit = (e) => {
        e.preventDefault();
        patch(route("operator.users.update", selectedUser.id), {
            onSuccess: () => {
                setIsEditModalOpen(false);
                reset();
            },
        });
    };

    const submitDelete = (e) => {
        e.preventDefault();
        destroy(route("operator.users.destroy", selectedUser.id), {
            onSuccess: () => setIsDeleteModalOpen(false),
        });
    };

    return (
        <AuthenticatedLayout>
            <Head title="Kelola User" />

            <div className="min-h-screen bg-[#F9FAFB] text-slate-900 pb-8">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    
                    {/* Compact Header */}
                    <div className="mb-6 flex items-center justify-between border-b border-slate-200 pb-4">
                        <div>
                            <h1 className="text-xl font-bold text-slate-800 tracking-tight">Kelola User</h1>
                            <p className="text-xs text-slate-500 font-medium mt-0.5">Daftar dan manajemen akun pemohon surat</p>
                        </div>
                        <PrimaryButton 
                            onClick={openCreateModal}
                            className="bg-blue-600 hover:bg-blue-700 text-[11px] font-bold py-1.5 shadow-sm shadow-blue-100"
                        >
                            + User Baru
                        </PrimaryButton>
                    </div>

                    {/* Filters & Search */}
                    <div className="mb-4 flex items-center justify-between">
                        <form onSubmit={handleSearch} className="relative">
                            <input 
                                type="text" 
                                value={search}
                                onChange={(e) => setSearch(e.target.value)}
                                placeholder="Cari Nama, NIK, atau Email..." 
                                className="pl-8 pr-3 py-1.5 text-xs bg-white border border-slate-200 rounded-lg focus:ring-1 focus:ring-blue-500 w-64 transition-all"
                            />
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-3.5 w-3.5 absolute left-2.5 top-2.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </form>
                        <div className="text-[10px] font-bold text-slate-400 uppercase">
                            Total: {users.total} Users
                        </div>
                    </div>

                    {/* Compact Data Table */}
                    <div className="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div className="overflow-x-auto">
                            <table className="min-w-full divide-y divide-slate-100">
                                <thead className="bg-slate-50/50">
                                    <tr>
                                        <th className="px-4 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">User Details</th>
                                        <th className="px-4 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">NIK</th>
                                        <th className="px-4 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">Email</th>
                                        <th className="px-4 py-3 text-right text-[10px] font-bold text-slate-400 uppercase tracking-widest">Actions</th>
                                    </tr>
                                </thead>
                                <tbody className="bg-white divide-y divide-slate-100">
                                    {users.data.map((user) => (
                                        <tr key={user.id} className="hover:bg-slate-50/50 transition-colors duration-150">
                                            <td className="px-4 py-3 whitespace-nowrap">
                                                <div className="flex items-center space-x-3">
                                                    <div className="w-8 h-8 rounded-lg bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 font-bold text-[10px]">
                                                        {user.name.charAt(0)}
                                                    </div>
                                                    <div className="text-sm font-bold text-slate-800 leading-tight">{user.name}</div>
                                                </div>
                                            </td>
                                            <td className="px-4 py-3 whitespace-nowrap text-[11px] font-medium text-slate-600">
                                                {user.nik}
                                            </td>
                                            <td className="px-4 py-3 whitespace-nowrap text-[11px] text-slate-500 font-medium">
                                                {user.email}
                                            </td>
                                            <td className="px-4 py-3 whitespace-nowrap text-right space-x-2">
                                                <button 
                                                    onClick={() => openEditModal(user)}
                                                    className="text-[10px] font-bold text-blue-600 hover:text-blue-800 uppercase tracking-tight"
                                                >
                                                    Edit
                                                </button>
                                                <button 
                                                    onClick={() => openDeleteModal(user)}
                                                    className="text-[10px] font-bold text-rose-600 hover:text-rose-800 uppercase tracking-tight"
                                                >
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>

                        {users.data.length === 0 && (
                            <div className="py-12 text-center text-slate-400 italic text-xs">
                                Tidak ada user ditemukan.
                            </div>
                        )}
                        
                        {/* Compact Pagination */}
                        <div className="px-4 py-3 border-t border-slate-50 bg-slate-50/30 flex items-center justify-between text-[10px] font-bold text-slate-400 uppercase">
                            <div className="flex space-x-1">
                                {users.links.map((link, i) => (
                                    <button
                                        key={i}
                                        onClick={() => router.get(link.url, { search }, { preserveState: true })}
                                        disabled={!link.url || link.active}
                                        className={`px-2 py-1 rounded border ${
                                            link.active ? 'bg-blue-600 text-white border-blue-600' : 
                                            link.url ? 'bg-white border-slate-200 hover:bg-slate-50 text-slate-600' : 
                                            'bg-slate-50 border-slate-100 text-slate-300 cursor-not-allowed'
                                        }`}
                                        dangerouslySetInnerHTML={{ __html: link.label }}
                                    />
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* CREATE MODAL */}
            <Modal show={isCreateModalOpen} onClose={() => setIsCreateModalOpen(false)} maxWidth="md">
                <form onSubmit={submitCreate} className="p-4">
                    <h2 className="text-base font-bold text-slate-800 border-b border-slate-100 pb-3 mb-4">Tambah User Baru</h2>
                    
                    <div className="space-y-3">
                        <div>
                            <InputLabel htmlFor="create_name" value="Nama Lengkap" className="text-[10px] uppercase font-bold" />
                            <TextInput id="create_name" value={data.name} onChange={e => setData('name', e.target.value)} className="mt-1 block w-full text-xs" required isFocused />
                            <InputError message={errors.name} className="mt-1" />
                        </div>
                        <div>
                            <InputLabel htmlFor="create_nik" value="NIK (16 Digit)" className="text-[10px] uppercase font-bold" />
                            <TextInput id="create_nik" value={data.nik} onChange={e => setData('nik', e.target.value)} className="mt-1 block w-full text-xs" required maxLength="16" />
                            <InputError message={errors.nik} className="mt-1" />
                        </div>
                        <div>
                            <InputLabel htmlFor="create_email" value="Email" className="text-[10px] uppercase font-bold" />
                            <TextInput type="email" id="create_email" value={data.email} onChange={e => setData('email', e.target.value)} className="mt-1 block w-full text-xs" required />
                            <InputError message={errors.email} className="mt-1" />
                        </div>
                        <div className="grid grid-cols-2 gap-3">
                            <div>
                                <InputLabel htmlFor="create_password" value="Password" className="text-[10px] uppercase font-bold" />
                                <TextInput type="password" id="create_password" value={data.password} onChange={e => setData('password', e.target.value)} className="mt-1 block w-full text-xs" required />
                            </div>
                            <div>
                                <InputLabel htmlFor="create_password_confirmation" value="Konfirmasi" className="text-[10px] uppercase font-bold" />
                                <TextInput type="password" id="create_password_confirmation" value={data.password_confirmation} onChange={e => setData('password_confirmation', e.target.value)} className="mt-1 block w-full text-xs" required />
                            </div>
                        </div>
                        <InputError message={errors.password} className="mt-1" />
                    </div>

                    <div className="mt-6 flex justify-end gap-3 border-t border-slate-100 pt-4">
                        <SecondaryButton onClick={() => setIsCreateModalOpen(false)} className="text-[10px] font-bold">Batal</SecondaryButton>
                        <PrimaryButton className="bg-blue-600 hover:bg-blue-700 text-[10px] font-bold py-1.5" disabled={processing}>Simpan User</PrimaryButton>
                    </div>
                </form>
            </Modal>

            {/* EDIT MODAL */}
            <Modal show={isEditModalOpen} onClose={() => setIsEditModalOpen(false)} maxWidth="md">
                <form onSubmit={submitEdit} className="p-4">
                    <h2 className="text-base font-bold text-slate-800 border-b border-slate-100 pb-3 mb-4">Edit Data User</h2>
                    
                    <div className="space-y-3">
                        <div>
                            <InputLabel htmlFor="edit_name" value="Nama Lengkap" className="text-[10px] uppercase font-bold" />
                            <TextInput id="edit_name" value={data.name} onChange={e => setData('name', e.target.value)} className="mt-1 block w-full text-xs" required />
                            <InputError message={errors.name} className="mt-1" />
                        </div>
                        <div>
                            <InputLabel htmlFor="edit_nik" value="NIK" className="text-[10px] uppercase font-bold" />
                            <TextInput id="edit_nik" value={data.nik} onChange={e => setData('nik', e.target.value)} className="mt-1 block w-full text-xs" required />
                            <InputError message={errors.nik} className="mt-1" />
                        </div>
                        <div>
                            <InputLabel htmlFor="edit_email" value="Email" className="text-[10px] uppercase font-bold" />
                            <TextInput type="email" id="edit_email" value={data.email} onChange={e => setData('email', e.target.value)} className="mt-1 block w-full text-xs" required />
                            <InputError message={errors.email} className="mt-1" />
                        </div>
                        <div className="p-2 bg-amber-50 rounded-lg border border-amber-100">
                            <p className="text-[10px] text-amber-700 font-medium italic">Kosongkan password jika tidak ingin mengubahnya.</p>
                        </div>
                        <div className="grid grid-cols-2 gap-3">
                            <div>
                                <InputLabel htmlFor="edit_password" value="Password Baru" className="text-[10px] uppercase font-bold" />
                                <TextInput type="password" id="edit_password" value={data.password} onChange={e => setData('password', e.target.value)} className="mt-1 block w-full text-xs" />
                            </div>
                            <div>
                                <InputLabel htmlFor="edit_password_confirmation" value="Konfirmasi" className="text-[10px] uppercase font-bold" />
                                <TextInput type="password" id="edit_password_confirmation" value={data.password_confirmation} onChange={e => setData('password_confirmation', e.target.value)} className="mt-1 block w-full text-xs" />
                            </div>
                        </div>
                        <InputError message={errors.password} className="mt-1" />
                    </div>

                    <div className="mt-6 flex justify-end gap-3 border-t border-slate-100 pt-4">
                        <SecondaryButton onClick={() => setIsEditModalOpen(false)} className="text-[10px] font-bold">Batal</SecondaryButton>
                        <PrimaryButton className="bg-blue-600 hover:bg-blue-700 text-[10px] font-bold py-1.5" disabled={processing}>Perbarui Data</PrimaryButton>
                    </div>
                </form>
            </Modal>

            {/* DELETE MODAL */}
            <Modal show={isDeleteModalOpen} onClose={() => setIsDeleteModalOpen(false)} maxWidth="sm">
                <div className="p-4">
                    <h2 className="text-base font-bold text-slate-800">Hapus User?</h2>
                    <p className="mt-2 text-xs text-slate-500">
                        Apakah Anda yakin ingin menghapus <strong>{selectedUser?.name}</strong>? Tindakan ini tidak dapat dibatalkan.
                    </p>
                    <div className="mt-6 flex justify-end gap-3">
                        <SecondaryButton onClick={() => setIsDeleteModalOpen(false)} className="text-[10px] font-bold">Batal</SecondaryButton>
                        <PrimaryButton 
                            onClick={submitDelete}
                            className="bg-rose-600 hover:bg-rose-700 text-[10px] font-bold py-1.5" 
                            disabled={processing}
                        >
                            Ya, Hapus
                        </PrimaryButton>
                    </div>
                </div>
            </Modal>
        </AuthenticatedLayout>
    );
}
