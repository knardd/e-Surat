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
            <Head title="Operator Dashboard" />

            <div className="min-h-screen bg-[#F9FAFB] text-slate-900 pb-8">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    {/* Compact Header */}
                    <div className="mb-6 flex items-center justify-between border-b border-slate-200 pb-4">
                        <div>
                            <h1 className="text-xl font-bold text-slate-800 tracking-tight">
                                Operator Dashboard
                            </h1>
                            <p className="text-xs text-slate-500 font-medium mt-0.5">
                                Manage letter requests and submit to admin
                            </p>
                        </div>
                    </div>

                    {/* Compact Statistics Grid */}
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div className="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between group hover:border-blue-200 transition-colors">
                            <div>
                                <p className="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                    Total Requests
                                </p>
                                <h2 className="text-xl font-bold text-slate-800 leading-tight">
                                    {requests.length}
                                </h2>
                            </div>
                            <div className="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center border border-blue-100">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-4 w-4 text-blue-600"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth={2}
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                    />
                                </svg>
                            </div>
                        </div>

                        <div className="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between group hover:border-amber-200 transition-colors">
                            <div>
                                <p className="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                    Pending Process
                                </p>
                                <h2 className="text-xl font-bold text-slate-800 leading-tight">
                                    {requests.length}
                                </h2>
                            </div>
                            <div className="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center border border-amber-100 text-amber-600">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth={2}
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                        </div>

                        <div className="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between group hover:border-emerald-200 transition-colors">
                            <div>
                                <p className="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                    Sent to Admin
                                </p>
                                <h2 className="text-xl font-bold text-slate-800 leading-tight">
                                    0
                                </h2>
                            </div>
                            <div className="w-8 h-8 bg-emerald-50 rounded-lg flex items-center justify-center border border-emerald-100 text-emerald-600">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth={2}
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>

                    {/* Compact Table Section */}
                    <div className="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div className="px-4 py-3 border-b border-slate-100 flex items-center justify-between bg-white">
                            <h3 className="text-sm font-bold text-slate-800">
                                Pending Requests
                            </h3>
                            <div className="relative">
                                <input
                                    type="text"
                                    placeholder="Search..."
                                    className="pl-8 pr-3 py-1 text-xs bg-slate-50 border border-slate-200 rounded-md focus:ring-1 focus:ring-blue-500 w-48 transition-all"
                                />
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-3.5 w-3.5 absolute left-2.5 top-2 text-slate-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth={2}
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                    />
                                </svg>
                            </div>
                        </div>

                        <div className="overflow-x-auto">
                            <table className="min-w-full divide-y divide-slate-100">
                                <thead className="bg-slate-50/50">
                                    <tr>
                                        <th className="px-4 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            Pemohon
                                        </th>
                                        <th className="px-4 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            Jenis Surat
                                        </th>
                                        <th className="px-4 py-3 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            Tanggal
                                        </th>
                                        <th className="px-4 py-3 text-center text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            Status
                                        </th>
                                        <th className="px-4 py-3 text-right text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody className="bg-white divide-y divide-slate-100">
                                    {requests.map((item) => (
                                        <tr
                                            key={item.id}
                                            className="hover:bg-slate-50/50 transition-colors duration-150"
                                        >
                                            <td className="px-4 py-3 whitespace-nowrap">
                                                <div className="flex items-center space-x-3">
                                                    <div className="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600 font-bold text-[10px]">
                                                        {item.nama.charAt(0)}
                                                    </div>
                                                    <div>
                                                        <div className="text-sm font-bold text-slate-800 leading-tight">
                                                            {item.nama}
                                                        </div>
                                                        <div className="text-[10px] text-slate-400 font-medium">
                                                            REF-
                                                            {item.id
                                                                .toString()
                                                                .padStart(
                                                                    4,
                                                                    "0",
                                                                )}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td className="px-4 py-3 whitespace-nowrap text-sm font-medium text-slate-600">
                                                {item.jenis}
                                            </td>
                                            <td className="px-4 py-3 whitespace-nowrap text-[11px] text-slate-500 font-medium">
                                                {item.tanggal}
                                            </td>
                                            <td className="px-4 py-3 whitespace-nowrap text-center">
                                                <span className="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-600 border border-amber-100 uppercase tracking-tight">
                                                    {item.status}
                                                </span>
                                            </td>
                                            <td className="px-4 py-3 whitespace-nowrap text-right">
                                                <button className="px-3 py-1.5 bg-blue-600 text-white text-[10px] font-bold rounded-md hover:bg-blue-700 shadow-sm transition-all">
                                                    Kirim ke Admin
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>

                        <div className="px-4 py-3 border-t border-slate-50 bg-slate-50/30 flex items-center justify-between text-[10px] font-bold text-slate-400 uppercase">
                            <span>{requests.length} Permintaan Ditemukan</span>
                            <div className="flex space-x-1">
                                <button className="p-1 rounded bg-white border border-slate-200 hover:bg-slate-50">
                                    Prev
                                </button>
                                <button className="p-1 rounded bg-white border border-slate-200 hover:bg-slate-50">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default CekSurat;
