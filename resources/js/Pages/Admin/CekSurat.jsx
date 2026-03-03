import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { useState } from "react";

const CekSurat = () => {
    // Dummy data (nanti ambil dari backend)
    const [letters, setLetters] = useState([
        {
            id: 1,
            nama: "Andi Pratama",
            jenis: "Surat Domisili",
            tanggal: "18 Feb 2026",
            status: "Menunggu Verifikasi",
        },
        {
            id: 2,
            nama: "Siti Rahma",
            jenis: "Surat Usaha",
            tanggal: "17 Feb 2026",
            status: "Menunggu Verifikasi",
        },
    ]);

    const handleApprove = (id) => {
        const updated = letters.map((item) =>
            item.id === id ? { ...item, status: "Siap Cetak" } : item,
        );
        setLetters(updated);
    };

    return (
        <AuthenticatedLayout>
            <Head title="Cek Surat" />

            <div className="min-h-screen bg-blue-50 p-6">
                {/* Header */}
                <div className="mb-8">
                    <h1 className="text-3xl font-bold text-blue-900">
                        Dashboard Admin
                    </h1>
                    <p className="text-blue-600 text-sm mt-1">
                        Verifikasi surat dari operator dan aktifkan siap cetak
                    </p>
                </div>

                {/* Statistik */}
                <div className="grid md:grid-cols-3 gap-6 mb-8">
                    <div className="bg-white rounded-2xl shadow-md p-6 border border-blue-100">
                        <p className="text-sm text-blue-500">
                            Total Surat Masuk
                        </p>
                        <h2 className="text-2xl font-bold text-blue-900 mt-2">
                            {letters.length}
                        </h2>
                    </div>

                    <div className="bg-white rounded-2xl shadow-md p-6 border border-blue-100">
                        <p className="text-sm text-blue-500">
                            Menunggu Verifikasi
                        </p>
                        <h2 className="text-2xl font-bold text-blue-900 mt-2">
                            {
                                letters.filter(
                                    (l) => l.status === "Menunggu Verifikasi",
                                ).length
                            }
                        </h2>
                    </div>

                    <div className="bg-white rounded-2xl shadow-md p-6 border border-blue-100">
                        <p className="text-sm text-blue-500">Siap Cetak</p>
                        <h2 className="text-2xl font-bold text-blue-900 mt-2">
                            {
                                letters.filter((l) => l.status === "Siap Cetak")
                                    .length
                            }
                        </h2>
                    </div>
                </div>

                {/* Table */}
                <div className="bg-white rounded-2xl shadow-md border border-blue-100 overflow-hidden">
                    <div className="px-6 py-4 border-b border-blue-100 bg-blue-600">
                        <h2 className="text-white font-semibold">
                            Surat Masuk dari Operator
                        </h2>
                    </div>

                    <div className="overflow-x-auto">
                        <table className="min-w-full text-sm">
                            <thead className="bg-blue-50 text-blue-700 uppercase text-xs">
                                <tr>
                                    <th className="px-6 py-3 text-left">
                                        Nama
                                    </th>
                                    <th className="px-6 py-3 text-left">
                                        Jenis Surat
                                    </th>
                                    <th className="px-6 py-3 text-left">
                                        Tanggal
                                    </th>
                                    <th className="px-6 py-3 text-left">
                                        Status
                                    </th>
                                    <th className="px-6 py-3 text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody className="divide-y divide-blue-100">
                                {letters.map((item) => (
                                    <tr
                                        key={item.id}
                                        className="hover:bg-blue-50 transition"
                                    >
                                        <td className="px-6 py-4 font-medium text-blue-900">
                                            {item.nama}
                                        </td>
                                        <td className="px-6 py-4 text-gray-700">
                                            {item.jenis}
                                        </td>
                                        <td className="px-6 py-4 text-gray-500">
                                            {item.tanggal}
                                        </td>
                                        <td className="px-6 py-4">
                                            {item.status === "Siap Cetak" ? (
                                                <span className="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                                    {item.status}
                                                </span>
                                            ) : (
                                                <span className="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                                    {item.status}
                                                </span>
                                            )}
                                        </td>
                                        <td className="px-6 py-4 text-center">
                                            {item.status !== "Siap Cetak" && (
                                                <button
                                                    onClick={() =>
                                                        handleApprove(item.id)
                                                    }
                                                    className="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-md transition"
                                                >
                                                    Aktifkan Siap Cetak
                                                </button>
                                            )}
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default CekSurat;
