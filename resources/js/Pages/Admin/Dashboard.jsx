import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import SuratIcon from "@/Components/Icons/SuratIcon";
import { useState, useEffect } from "react";

import {
    BarChart,
    Bar,
    LineChart,
    Line,
    XAxis,
    YAxis,
    CartesianGrid,
    Tooltip,
    ResponsiveContainer,
} from "recharts";

export default function Dashboard({
    totalSuratTahunIni,
    totalSuratBulanIni,
    totalSuratHariIni,
    chartData,
    suratPerJenis,
}) {
    const monthNames = [
        "",
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Agu",
        "Sep",
        "Okt",
        "Nov",
        "Des",
    ];

    const formattedData = chartData.map((item) => ({
        bulan: monthNames[item.bulan],
        total: item.total,
    }));
    return (
        <AuthenticatedLayout>
            <Head title="Dashboard" />

            <div className="py-6">
                <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div className="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                        <div className="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mr-4">
                            <SuratIcon className="text-blue-600 text-lg" />
                        </div>
                        <div>
                            <p className="text-sm text-gray-500 font-medium">
                                Total Surat Tahun Ini
                            </p>
                            <p className="text-2xl font-bold text-gray-800">
                                {totalSuratTahunIni}
                            </p>
                        </div>
                    </div>

                    <div className="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                        <div className="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center mr-4">
                            <SuratIcon className="text-emerald-600 text-lg" />
                        </div>
                        <div>
                            <p className="text-sm text-gray-500 font-medium">
                                Total Surat Bulan Ini
                            </p>
                            <p className="text-2xl font-bold text-emerald-600">
                                {totalSuratBulanIni}
                            </p>
                        </div>
                    </div>

                    <div className="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center">
                        <div className="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center mr-4">
                            <SuratIcon className="text-rose-600 text-lg" />
                        </div>
                        <div>
                            <p className="text-sm text-gray-500 font-medium">
                                Total Surat Hari Ini
                            </p>
                            <p className="text-2xl font-bold text-rose-600">
                                {totalSuratHariIni}
                            </p>
                        </div>
                    </div>
                </div>
                <div className="flex">
                    <div className="bg-white p-6 rounded-xl shadow w-1/2 mt-6 ml-2 mr-4">
                        <h2 className="text-lg font-semibold mb-4 text-center text-gray-800">
                            Statistik Surat Tahun Ini
                        </h2>

                        <ResponsiveContainer width="100%" height={300}>
                            <LineChart data={formattedData}>
                                <CartesianGrid strokeDasharray="3 3" />
                                <XAxis dataKey="bulan" />
                                <YAxis />
                                <Tooltip />
                                <Line
                                    type="monotone"
                                    dataKey="total"
                                    stroke="#4f46e5"
                                    strokeWidth={3}
                                />
                            </LineChart>
                        </ResponsiveContainer>
                    </div>
                    <div className="bg-white p-6 rounded-xl shadow mt-6 w-1/2 mr-2">
                        <h2 className="text-lg font-semibold mb-4 text-center">
                            Jenis Surat Paling Sering Dibuat
                        </h2>

                        <ResponsiveContainer width="100%" height={350}>
                            <BarChart data={suratPerJenis}>
                                <CartesianGrid strokeDasharray="3 3" />
                                <XAxis
                                    dataKey="jenis"
                                    angle={-30}
                                    textAnchor="end"
                                    interval={0}
                                    height={70}
                                />
                                <YAxis />
                                <Tooltip />
                                <Bar
                                    dataKey="total"
                                    fill="#16a34a"
                                    radius={[8, 8, 0, 0]}
                                />
                            </BarChart>
                        </ResponsiveContainer>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
