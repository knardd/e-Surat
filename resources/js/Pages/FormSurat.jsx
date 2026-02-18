import AppLayout from "@/Layouts/AppLayout";
import { useState } from "react";
import { Link, router } from "@inertiajs/react";

// Komponen ikon sesuai nama field
function FieldIcon({ name, type }) {
    const cls = "h-5 w-5 text-gray-400";

    if (name === "nama") {
        return (
            <svg
                xmlns="http://www.w3.org/2000/svg"
                className={cls}
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                strokeWidth={2}
            >
                <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        );
    }
    if (name === "nik") {
        return (
            <svg
                xmlns="http://www.w3.org/2000/svg"
                className={cls}
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                strokeWidth={2}
            >
                <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"
                />
            </svg>
        );
    }
    if (
        name === "tempat_tanggal_lahir" ||
        name === "tgl_lahir" ||
        type === "date"
    ) {
        return (
            <svg
                xmlns="http://www.w3.org/2000/svg"
                className={cls}
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                strokeWidth={2}
            >
                <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"
                />
            </svg>
        );
    }
    if (name === "pekerjaan") {
        return (
            <svg
                xmlns="http://www.w3.org/2000/svg"
                className={cls}
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                strokeWidth={2}
            >
                <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"
                />
            </svg>
        );
    }
    // Default icon
    return (
        <svg
            xmlns="http://www.w3.org/2000/svg"
            className={cls}
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            strokeWidth={2}
        >
            <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
            />
        </svg>
    );
}

// Komponen error message
function ErrorMessage({ message }) {
    if (!message) return null;
    return (
        <div className="mt-2 flex items-center text-red-500 text-sm font-medium">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                className="h-4 w-4 mr-1.5"
                viewBox="0 0 20 20"
                fill="currentColor"
            >
                <path
                    fillRule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 011 1v4a1 1 0 11-2 0V6a1 1 0 011-1z"
                    clipRule="evenodd"
                />
            </svg>
            {message}
        </div>
    );
}
const FormSurat = ({ jenis, fields }) => {
    const [formData, setFormData] = useState({});
    const [errors, setErrors] = useState({});
    const [submitted, setSubmitted] = useState(false);

    // Menangani perubahan nilai input
    const handleChange = (name, value) => {
        setFormData((prev) => ({ ...prev, [name]: value }));
        // Hapus error saat user mulai mengisi
        if (errors[name]) {
            setErrors((prev) => ({ ...prev, [name]: null }));
        }
    };

    // Validasi form sederhana
    const validate = () => {
        const newErrors = {};
        Object.entries(fields).forEach(([name, field]) => {
            if (field.required && !formData[name]) {
                newErrors[name] = `${field.label} wajib diisi.`;
            }
        });
        return newErrors;
    };

    // Menangani submit form
    const handleSubmit = (e) => {
        e.preventDefault();
        const validationErrors = validate();
        if (Object.keys(validationErrors).length > 0) {
            setErrors(validationErrors);
            return;
        }
        // Kirim data (ganti dengan API call sesuai kebutuhan)
        router.post("/surat/proses", {
            jenis_id: jenis.id,
            detail: formData,
        });
        setSubmitted(true);
    };

    // Input style helper
    const inputClass = (name) =>
        `w-full pl-12 pr-4 py-3 rounded-xl border text-sm focus:outline-none focus:ring-2 transition-colors ${
            errors[name]
                ? "border-red-400 focus:ring-red-200 bg-red-50"
                : "border-gray-200 focus:ring-blue-200 focus:border-blue-400 bg-white"
        }`;

    return (
        <div className="py-8 md:py-12">
            <div className="max-w-3xl mx-auto px-4 sm:px-6">
                {/* Breadcrumb */}
                <nav className="mb-6">
                    <ol className="flex items-center gap-2 text-sm">
                        <li>
                            <Link
                                href="/"
                                className="text-gray-400 hover:text-blue-600 transition-colors inline-flex items-center gap-1"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    strokeWidth={2}
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                    />
                                </svg>
                                Pilih Surat
                            </Link>
                        </li>
                        <li>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="h-4 w-4 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                strokeWidth={2}
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    d="M8.25 4.5l7.5 7.5-7.5 7.5"
                                />
                            </svg>
                        </li>
                        <li className="text-blue-600 font-medium">
                            Form Pengisian
                        </li>
                    </ol>
                </nav>

                {/* Form Card */}
                <div className="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    {/* Card Header with Gradient */}
                    <div className="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-5 md:px-8 md:py-6">
                        <div className="flex items-center gap-4">
                            <div className="flex-shrink-0 p-3 bg-white/20 backdrop-blur rounded-xl">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-7 w-7 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    strokeWidth={2}
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                    />
                                </svg>
                            </div>
                            <div>
                                <h1 className="text-xl md:text-2xl font-bold text-white">
                                    {jenis.name}
                                </h1>
                                <p className="text-white/80 text-sm mt-0.5">
                                    Silakan lengkapi data dengan benar
                                </p>
                            </div>
                        </div>
                    </div>

                    {/* Form Body */}
                    <div className="p-6 md:p-8">
                        <form onSubmit={handleSubmit}>
                            <input
                                type="hidden"
                                name="jenis_id"
                                value={jenis.id}
                            />

                            <div className="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                                {Object.entries(fields).map(([name, field]) => {
                                    const isError = !!errors[name];

                                    // Field textarea → full width (md:col-span-2)
                                    if (field.type === "textarea") {
                                        return (
                                            <div
                                                key={name}
                                                className="md:col-span-2"
                                            >
                                                <label className="block text-sm font-semibold text-gray-700 mb-2">
                                                    {field.label}{" "}
                                                    <span className="text-red-500">
                                                        *
                                                    </span>
                                                </label>
                                                <div className="relative">
                                                    <div className="absolute left-4 top-4 pointer-events-none">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            className="h-5 w-5 text-gray-400"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            strokeWidth={2}
                                                        >
                                                            <path
                                                                strokeLinecap="round"
                                                                strokeLinejoin="round"
                                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                            />
                                                            <path
                                                                strokeLinecap="round"
                                                                strokeLinejoin="round"
                                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                            />
                                                        </svg>
                                                    </div>
                                                    <textarea
                                                        name={`detail[${name}]`}
                                                        value={
                                                            formData[name] || ""
                                                        }
                                                        onChange={(e) =>
                                                            handleChange(
                                                                name,
                                                                e.target.value,
                                                            )
                                                        }
                                                        className={`w-full pl-12 pr-4 py-3 rounded-xl border text-sm focus:outline-none focus:ring-2 transition-colors resize-none ${
                                                            isError
                                                                ? "border-red-400 focus:ring-red-200 bg-red-50"
                                                                : "border-gray-200 focus:ring-blue-200 focus:border-blue-400 bg-white"
                                                        }`}
                                                        rows={4}
                                                        placeholder={`Masukkan ${field.label.toLowerCase()}...`}
                                                        required={
                                                            field.required
                                                        }
                                                    />
                                                </div>
                                                <ErrorMessage
                                                    message={errors[name]}
                                                />
                                            </div>
                                        );
                                    }

                                    // Field select
                                    if (field.type === "select") {
                                        return (
                                            <div key={name}>
                                                <label className="block text-sm font-semibold text-gray-700 mb-2">
                                                    {field.label}{" "}
                                                    <span className="text-red-500">
                                                        *
                                                    </span>
                                                </label>
                                                <div className="relative">
                                                    <select
                                                        name={`detail[${name}]`}
                                                        value={
                                                            formData[name] || ""
                                                        }
                                                        onChange={(e) =>
                                                            handleChange(
                                                                name,
                                                                e.target.value,
                                                            )
                                                        }
                                                        className={`w-full px-4 py-3 rounded-xl border text-sm appearance-none bg-none cursor-pointer pr-10 focus:outline-none focus:ring-2 transition-colors ${
                                                            isError
                                                                ? "border-red-400 focus:ring-red-200 bg-red-50"
                                                                : "border-gray-200 focus:ring-blue-200 focus:border-blue-400 bg-white"
                                                        }`}
                                                        required={
                                                            field.required
                                                        }
                                                    >
                                                        <option
                                                            value=""
                                                            disabled
                                                        >
                                                            -- Pilih{" "}
                                                            {field.label} --
                                                        </option>
                                                        {field.options.map(
                                                            (option) => (
                                                                <option
                                                                    key={option}
                                                                    value={
                                                                        option
                                                                    }
                                                                >
                                                                    {option}
                                                                </option>
                                                            ),
                                                        )}
                                                    </select>
                                                    <div className="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                                        <svg
                                                            className="h-4 w-4"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24"
                                                        >
                                                            <path
                                                                strokeLinecap="round"
                                                                strokeLinejoin="round"
                                                                strokeWidth={2}
                                                                d="M19 9l-7 7-7-7"
                                                            />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ErrorMessage
                                                    message={errors[name]}
                                                />
                                            </div>
                                        );
                                    }

                                    // Field input biasa (text, date, number, dll)
                                    return (
                                        <div key={name}>
                                            <label className="block text-sm font-semibold text-gray-700 mb-2">
                                                {field.label}{" "}
                                                <span className="text-red-500">
                                                    *
                                                </span>
                                            </label>
                                            <div className="relative">
                                                <div className="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                                    <FieldIcon
                                                        name={name}
                                                        type={field.type}
                                                    />
                                                </div>
                                                <input
                                                    type={field.type}
                                                    name={`detail[${name}]`}
                                                    value={formData[name] || ""}
                                                    onChange={(e) =>
                                                        handleChange(
                                                            name,
                                                            e.target.value,
                                                        )
                                                    }
                                                    className={inputClass(name)}
                                                    placeholder={field.label}
                                                    required={field.required}
                                                />
                                            </div>
                                            <ErrorMessage
                                                message={errors[name]}
                                            />
                                        </div>
                                    );
                                })}
                            </div>

                            {/* Submit Section */}
                            <div className="mt-8 pt-6 border-t border-gray-100">
                                <button
                                    type="submit"
                                    className="w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold text-lg py-4 rounded-xl transition-colors shadow-md hover:shadow-lg"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        className="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        strokeWidth={2}
                                    >
                                        <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                    Buat Surat Sekarang
                                </button>

                                <p className="text-center text-xs text-gray-400 mt-5">
                                    Dengan menekan tombol di atas, Anda
                                    menyatakan data yang diisi adalah benar dan
                                    sesuai dokumen resmi.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};
FormSurat.layout = (page) => <AppLayout children={page} />;

export default FormSurat;
