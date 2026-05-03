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

            <div className="min-h-screen bg-[#F9FAFB] text-slate-900 pb-8">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    {/* Compact Header */}
                    <div className="mb-6 flex items-center justify-between border-b border-slate-200 pb-4">
                        <div>
                            <h1 className="text-xl font-bold text-slate-800 tracking-tight">
                                Analytics Dashboard
                            </h1>
                            <p className="text-xs text-slate-500 font-medium mt-0.5">
                                Real-time system overview and letter metrics
                            </p>
                        </div>
                    </div>

                    {/* Compact Stats Grid */}
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        {/* Year Stats */}
                        <div className="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between group hover:border-indigo-200 transition-colors">
                            <div className="flex items-center space-x-3">
                                <div className="w-9 h-9 bg-indigo-50 rounded-lg flex items-center justify-center border border-indigo-100">
                                    <SuratIcon className="text-indigo-600 w-4 h-4" />
                                </div>
                                <div>
                                    <p className="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Yearly
                                    </p>
                                    <h2 className="text-xl font-bold text-slate-800 leading-tight">
                                        {totalSuratTahunIni}
                                    </h2>
                                </div>
                            </div>
                            <div className="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded border border-slate-100">
                                {new Date().getFullYear()}
                            </div>
                        </div>

                        {/* Month Stats */}
                        <div className="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between group hover:border-emerald-200 transition-colors">
                            <div className="flex items-center space-x-3">
                                <div className="w-9 h-9 bg-emerald-50 rounded-lg flex items-center justify-center border border-emerald-100">
                                    <SuratIcon className="text-emerald-600 w-4 h-4" />
                                </div>
                                <div>
                                    <p className="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Monthly
                                    </p>
                                    <h2 className="text-xl font-bold text-slate-800 leading-tight">
                                        {totalSuratBulanIni}
                                    </h2>
                                </div>
                            </div>
                            <div className="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-100">
                                This Month
                            </div>
                        </div>

                        {/* Day Stats */}
                        <div className="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between group hover:border-rose-200 transition-colors">
                            <div className="flex items-center space-x-3">
                                <div className="w-9 h-9 bg-rose-50 rounded-lg flex items-center justify-center border border-rose-100">
                                    <SuratIcon className="text-rose-600 w-4 h-4" />
                                </div>
                                <div>
                                    <p className="text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Today
                                    </p>
                                    <h2 className="text-xl font-bold text-slate-800 leading-tight">
                                        {totalSuratHariIni}
                                    </h2>
                                </div>
                            </div>
                            <div className="text-[10px] font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded border border-rose-100">
                                Live 24h
                            </div>
                        </div>
                    </div>

                    {/* Charts Section - Compact Grid */}
                    <div className="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        {/* Line Chart */}
                        <div className="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
                            <div className="flex items-center justify-between mb-4">
                                <h3 className="text-sm font-bold text-slate-800">
                                    Traffic Trends
                                </h3>
                                <div className="flex items-center space-x-2">
                                    <span className="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                    <span className="text-[10px] font-bold text-slate-500 uppercase tracking-tighter">
                                        Volume
                                    </span>
                                </div>
                            </div>

                            <div className="h-[240px] w-full">
                                <ResponsiveContainer width="100%" height="100%">
                                    <LineChart
                                        data={formattedData}
                                        margin={{
                                            top: 5,
                                            right: 5,
                                            left: -20,
                                            bottom: 0,
                                        }}
                                    >
                                        <CartesianGrid
                                            strokeDasharray="3 3"
                                            vertical={false}
                                            stroke="#F1F5F9"
                                        />
                                        <XAxis
                                            dataKey="bulan"
                                            axisLine={false}
                                            tickLine={false}
                                            tick={{
                                                fill: "#94A3B8",
                                                fontSize: 10,
                                                fontWeight: 600,
                                            }}
                                        />
                                        <YAxis
                                            axisLine={false}
                                            tickLine={false}
                                            tick={{
                                                fill: "#94A3B8",
                                                fontSize: 10,
                                                fontWeight: 600,
                                            }}
                                        />
                                        <Tooltip
                                            contentStyle={{
                                                borderRadius: "8px",
                                                border: "none",
                                                boxShadow:
                                                    "0 4px 6px -1px rgb(0 0 0 / 0.1)",
                                                fontSize: "11px",
                                                padding: "8px",
                                            }}
                                        />
                                        <Line
                                            type="monotone"
                                            dataKey="total"
                                            stroke="#4F46E5"
                                            strokeWidth={3}
                                            dot={{ fill: "#4F46E5", r: 3 }}
                                            activeDot={{ r: 5 }}
                                        />
                                    </LineChart>
                                </ResponsiveContainer>
                            </div>
                        </div>

                        {/* Bar Chart */}
                        <div className="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
                            <div className="flex items-center justify-between mb-4">
                                <h3 className="text-sm font-bold text-slate-800">
                                    Popularity Rank
                                </h3>
                                <span className="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full uppercase">
                                    Categories
                                </span>
                            </div>

                            <div className="h-[240px] w-full">
                                <ResponsiveContainer width="100%" height="100%">
                                    <BarChart
                                        data={suratPerJenis}
                                        margin={{
                                            top: 5,
                                            right: 5,
                                            left: -20,
                                            bottom: 20,
                                        }}
                                    >
                                        <CartesianGrid
                                            strokeDasharray="3 3"
                                            vertical={false}
                                            stroke="#F1F5F9"
                                        />
                                        <XAxis
                                            dataKey="jenis"
                                            axisLine={false}
                                            tickLine={false}
                                            tick={{
                                                fill: "#94A3B8",
                                                fontSize: 9,
                                                fontWeight: 600,
                                            }}
                                            angle={-30}
                                            textAnchor="end"
                                            interval={0}
                                        />
                                        <YAxis
                                            axisLine={false}
                                            tickLine={false}
                                            tick={{
                                                fill: "#94A3B8",
                                                fontSize: 10,
                                                fontWeight: 600,
                                            }}
                                        />
                                        <Tooltip
                                            cursor={{ fill: "#F8FAFC" }}
                                            contentStyle={{
                                                borderRadius: "8px",
                                                border: "none",
                                                boxShadow:
                                                    "0 4px 6px -1px rgb(0 0 0 / 0.1)",
                                                fontSize: "11px",
                                                padding: "8px",
                                            }}
                                        />
                                        <Bar
                                            dataKey="total"
                                            fill="#10B981"
                                            radius={[4, 4, 0, 0]}
                                            barSize={24}
                                        />
                                    </BarChart>
                                </ResponsiveContainer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
