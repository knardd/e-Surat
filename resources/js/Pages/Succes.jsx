import React from "react";
import { Link } from "@inertiajs/react";
import AppLayout from "@/Layouts/AppLayout";

const Succes = ({ surat }) => {
    const today = new Date().toLocaleString("id-ID", {
        day: "2-digit",
        month: "long",
        year: "numeric",
    });
    return (
        <div className="py-10 md:py-16">
            <div className="max-w-2xl mx-auto px-4">
                {/* Success Hero Section */}
                <div className="text-center mb-8 animate-fade-in">
                    {/* Animated Success Badge */}
                    <div className="inline-flex items-center justify-center mb-6">
                        <div className="relative">
                            {/* Outer Ring Animation */}
                            <div className="absolute inset-0 rounded-full border-4 border-success/30 animate-ping"></div>
                            <div className="absolute inset-0 rounded-full border-4 border-success/20 animate-pulse"></div>

                            {/* Main Circle */}
                            <div className="relative flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-success to-emerald-600 shadow-lg animate-scale-in">
                                <svg
                                    className="w-12 h-12 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    strokeWidth="2.5"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        d="M4.5 12.75l6 6 9-13.5"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <h1 className="text-3xl md:text-4xl font-extrabold text-text-main mb-2 animate-slide-up">
                        Surat Berhasil Dibuat!
                    </h1>
                    <p
                        className="text-text-muted animate-slide-up"
                        style={{ animationDelay: "0.1s" }}
                    >
                        Dokumen Anda telah siap untuk dicetak
                    </p>
                </div>

                {/* Document Preview Card */}
                <div
                    className="bg-white rounded-2xl shadow-card border border-border-soft overflow-hidden animate-slide-up"
                    style={{ animationDelay: "0.2s" }}
                >
                    {/* Card Header */}
                    <div className="bg-gradient-to-r from-primary-50 to-primary-100 px-6 py-4 border-b border-primary-200">
                        <div className="flex items-center gap-3">
                            <div className="p-2 bg-white rounded-lg shadow-sm">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-6 w-6 text-primary"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    strokeWidth="2"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                    />
                                </svg>
                            </div>
                            <div>
                                <p className="text-xs text-primary-600 font-medium uppercase tracking-wide">
                                    Dokumen Surat
                                </p>
                                <h2 className="text-lg font-bold text-primary-800">
                                    {surat.jenis.name}
                                </h2>
                            </div>
                        </div>
                    </div>

                    {/* Document Details */}
                    <div className="px-6 py-5 space-y-4">
                        <div className="flex items-center justify-between py-3 border-b border-gray-100">
                            <span className="text-sm text-text-muted flex items-center gap-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    strokeWidth="2"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"
                                    />
                                </svg>
                                Nomor Surat
                            </span>
                            <span className="text-sm font-semibold text-text-main">
                                {surat.no_surat}
                            </span>
                        </div>

                        <div className="flex items-center justify-between py-3 border-b border-gray-100">
                            <span className="text-sm text-text-muted flex items-center gap-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    strokeWidth="2"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"
                                    />
                                </svg>
                                Tanggal Surat
                            </span>
                            <span className="text-sm font-semibold text-text-main">
                                {today}
                            </span>
                        </div>

                        <div className="flex items-center justify-between py-3">
                            <span className="text-sm text-text-muted flex items-center gap-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    strokeWidth="2"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                                Status
                            </span>
                            <span className="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-success/10 text-success">
                                <span className="w-1.5 h-1.5 rounded-full bg-success mr-1.5"></span>
                                Siap Cetak
                            </span>
                        </div>
                    </div>

                    {/* Action Buttons */}
                    <div className="px-6 pb-6 pt-2 space-y-3">
                        <a
                            href={`/surat/pdf/${surat.id}`}
                            target="_blank"
                            className="btn-primary w-full justify-center text-base py-4 group"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="w-5 h-5 mr-2 transition-transform group-hover:scale-110"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                strokeWidth="2"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z"
                                />
                            </svg>
                            Cetak / Unduh PDF
                        </a>

                        <Link
                            href="/surat/pilih"
                            className="btn-secondary w-full justify-center"
                        >
                            {" "}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="w-4 h-4 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                strokeWidth="2"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    d="M12 4.5v15m7.5-7.5h-15"
                                />
                            </svg>
                            Buat Surat Lain
                        </Link>
                    </div>
                </div>

                {/* Info Tips */}
                <div
                    className="mt-6 p-4 bg-primary-50 rounded-xl border border-primary-100 animate-slide-up"
                    style={{ animationDelay: "0.3s" }}
                >
                    <div className="flex gap-3">
                        <div className="flex-shrink-0">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="h-5 w-5 text-primary"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                strokeWidth="2"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"
                                />
                            </svg>
                        </div>
                        <div>
                            <p className="text-sm font-medium text-primary-800">
                                Tips
                            </p>
                            <p className="text-xs text-primary-600 mt-0.5">
                                Pastikan untuk menyimpan file PDF sebagai arsip
                                digital. Surat dapat dicetak kapan saja dengan
                                membuka kembali file PDF tersebut.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

Succes.layout = (page) => <AppLayout children={page} />;
export default Succes;
