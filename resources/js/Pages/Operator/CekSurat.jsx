import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

const CekSurat = () => {
    // Dummy data dulu (nanti tinggal ambil dari controller)
    const requests = [
        {
            id: 1,
            nama: "Andi Pratama",
            jenis: "Surat Domisili",
            tanggal: "18 Feb 2026",
            status: "Menunggu",
        },
        {
            id: 2,
            nama: "Siti Rahma",
            jenis: "Surat Usaha",
            tanggal: "17 Feb 2026",
            status: "Menunggu",
        },
    ];

    return (
        <AuthenticatedLayout>
            <Head title="CekSurat" />

            <div className="min-h-screen bg-blue-50 p-6">
                {/* Header */}
                <div className="mb-8">
                    <h1 className="text-3xl font-bold text-blue-900">
                        Dashboard Operator
                    </h1>
                    <p className="text-blue-600 text-sm mt-1">
                        Kelola permintaan surat dan kirim ke admin
                    </p>
                </div>

                {/* Statistik */}
                <div className="grid md:grid-cols-3 gap-6 mb-8">
                    <div className="bg-white rounded-2xl shadow-md p-6 border border-blue-100">
                        <p className="text-sm text-blue-500">
                            Total Permintaan
                        </p>
                        <h2 className="text-2xl font-bold text-blue-900 mt-2">
                            {requests.length}
                        </h2>
                    </div>

                    <div className="bg-white rounded-2xl shadow-md p-6 border border-blue-100">
                        <p className="text-sm text-blue-500">
                            Menunggu Diproses
                        </p>
                        <h2 className="text-2xl font-bold text-blue-900 mt-2">
                            {requests.length}
                        </h2>
                    </div>

                    <div className="bg-white rounded-2xl shadow-md p-6 border border-blue-100">
                        <p className="text-sm text-blue-500">
                            Sudah Dikirim ke Admin
                        </p>
                        <h2 className="text-2xl font-bold text-blue-900 mt-2">
                            0
                        </h2>
                    </div>
                </div>

                {/* Table Permintaan */}
                <div className="bg-white rounded-2xl shadow-md border border-blue-100 overflow-hidden">
                    <div className="px-6 py-4 border-b border-blue-100 bg-blue-600">
                        <h2 className="text-white font-semibold">
                            Daftar Permintaan Surat
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
                                {requests.map((item) => (
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
                                            <span className="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                                {item.status}
                                            </span>
                                        </td>
                                        <td className="px-6 py-4 text-center">
                                            <button className="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-xs font-semibold shadow-md transition">
                                                Kirim ke Admin
                                            </button>
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
