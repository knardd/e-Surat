import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Head, useForm } from "@inertiajs/react";

const CreateUser = () => {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: "",
        email: "",
        nik: "",
        password: "",
        password_confirmation: "",
    });

    const submit = (e) => {
        e.preventDefault();
        post(route("operator.storeUser"), {
            onFinish: () => reset("password", "password_confirmation"),
        });
    };

    return (
        <AuthenticatedLayout>
            <Head title="Create User" />

            <div className="min-h-screen bg-[#F9FAFB] text-slate-900 pb-8">
                <div className="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    
                    {/* Compact Header */}
                    <div className="mb-6 flex items-center justify-between border-b border-slate-200 pb-4">
                        <div>
                            <h1 className="text-xl font-bold text-slate-800 tracking-tight">Pendaftaran User Baru</h1>
                            <p className="text-xs text-slate-500 font-medium mt-0.5">Daftarkan pemohon surat baru ke dalam sistem</p>
                        </div>
                    </div>

                    {/* Compact Form Card */}
                    <div className="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div className="px-4 py-3 border-b border-slate-100 bg-slate-50/50">
                            <h3 className="text-sm font-bold text-slate-800 uppercase tracking-wider text-[10px]">Data Akun Pemohon</h3>
                        </div>
                        
                        <form onSubmit={submit} className="p-4 space-y-4">
                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {/* Name */}
                                <div>
                                    <InputLabel htmlFor="name" value="Nama Lengkap" className="text-[11px] font-bold uppercase text-slate-500" />
                                    <TextInput
                                        id="name"
                                        name="name"
                                        value={data.name}
                                        className="mt-1 block w-full text-sm bg-slate-50 border-slate-200 focus:bg-white transition-all"
                                        autoComplete="name"
                                        isFocused={true}
                                        onChange={(e) => setData("name", e.target.value)}
                                        required
                                        placeholder="Masukkan nama lengkap"
                                    />
                                    <InputError message={errors.name} className="mt-1 text-[10px]" />
                                </div>

                                {/* NIK */}
                                <div>
                                    <InputLabel htmlFor="nik" value="NIK (16 Digit)" className="text-[11px] font-bold uppercase text-slate-500" />
                                    <TextInput
                                        id="nik"
                                        name="nik"
                                        value={data.nik}
                                        className="mt-1 block w-full text-sm bg-slate-50 border-slate-200 focus:bg-white transition-all"
                                        onChange={(e) => setData("nik", e.target.value)}
                                        required
                                        placeholder="Masukkan 16 digit NIK"
                                        maxLength="16"
                                    />
                                    <InputError message={errors.nik} className="mt-1 text-[10px]" />
                                </div>
                            </div>

                            {/* Email */}
                            <div>
                                <InputLabel htmlFor="email" value="Alamat Email" className="text-[11px] font-bold uppercase text-slate-500" />
                                <TextInput
                                    id="email"
                                    type="email"
                                    name="email"
                                    value={data.email}
                                    className="mt-1 block w-full text-sm bg-slate-50 border-slate-200 focus:bg-white transition-all"
                                    autoComplete="username"
                                    onChange={(e) => setData("email", e.target.value)}
                                    required
                                    placeholder="email@contoh.com"
                                />
                                <InputError message={errors.email} className="mt-1 text-[10px]" />
                            </div>

                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-slate-50 pt-4">
                                {/* Password */}
                                <div>
                                    <InputLabel htmlFor="password" value="Password" className="text-[11px] font-bold uppercase text-slate-500" />
                                    <TextInput
                                        id="password"
                                        type="password"
                                        name="password"
                                        value={data.password}
                                        className="mt-1 block w-full text-sm bg-slate-50 border-slate-200 focus:bg-white transition-all"
                                        autoComplete="new-password"
                                        onChange={(e) => setData("password", e.target.value)}
                                        required
                                        placeholder="Min. 8 karakter"
                                    />
                                    <InputError message={errors.password} className="mt-1 text-[10px]" />
                                </div>

                                {/* Confirm Password */}
                                <div>
                                    <InputLabel htmlFor="password_confirmation" value="Konfirmasi Password" className="text-[11px] font-bold uppercase text-slate-500" />
                                    <TextInput
                                        id="password_confirmation"
                                        type="password"
                                        name="password_confirmation"
                                        value={data.password_confirmation}
                                        className="mt-1 block w-full text-sm bg-slate-50 border-slate-200 focus:bg-white transition-all"
                                        autoComplete="new-password"
                                        onChange={(e) => setData("password_confirmation", e.target.value)}
                                        required
                                        placeholder="Ulangi password"
                                    />
                                    <InputError message={errors.password_confirmation} className="mt-1 text-[10px]" />
                                </div>
                            </div>

                            <div className="flex items-center justify-end pt-4">
                                <PrimaryButton className="bg-blue-600 hover:bg-blue-700 text-xs font-bold py-2 shadow-sm shadow-blue-100" disabled={processing}>
                                    Daftarkan User Baru
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default CreateUser;
