import React from "react";

const Footer = () => {
    return (
        <footer className="mt-auto border-t border-border-soft bg-white/50">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div className="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div className="flex items-center gap-3">
                        <img
                            src="/storage/Logo.png"
                            alt="Logo Pemerintah"
                            className="h-8 w-auto"
                        />
                        <div className="text-sm">
                            <p className="font-semibold text-text-main">
                                Desa Bakipandeyan
                            </p>
                            <p className="text-text-muted text-xs">
                                Kecamatan Baki, Kabupaten Sukoharjo
                            </p>
                        </div>
                    </div>

                    <div className="text-center md:text-right text-xs text-text-muted">
                        <p>
                            &copy; 2026 Pemerintah Kabupaten Sukoharjo. All
                            rights reserved.
                        </p>
                        <p className="mt-1">
                            <span className="inline-flex items-center gap-1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-3 w-3"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    strokeWidth="2"
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
                                Jl. Kelengkeng No.13 Bakipandeyan, Baki,
                                Sukoharjo
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
