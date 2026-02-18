import { Link } from "@inertiajs/react";

const Header = () => {
    return (
        <header className="header-main">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex items-center justify-between h-16 md:h-20">
                    {/*Logo & Title*/}
                    <Link href="/" className="flex items-center gap-3 group">
                        <div className="relative">
                            <img
                                src="/storage/logo.png"
                                alt="Logo Pemerintah"
                                className="h-10 md:h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
                            />
                        </div>
                        <div className="hidden sm:block">
                            <h1 className="text-sm md:text-base font-bold text-primary leading-tight">
                                PEMERINTAH KABUPATEN SUKOHARJO
                            </h1>
                            <p className="text-xs text-text-muted font-medium">
                                Sistem E-Surat Digital
                            </p>
                        </div>
                    </Link>

                    {/*Right Side - Optional Nav */}
                    <div className="flex items-center gap-4">
                        <div className="hidden md:flex items-center gap-2 text-sm text-text-muted">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                className="h-4 w-4 text-success"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                strokeWidth="2"
                            >
                                <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"
                                />
                            </svg>
                            <span>Sistem Terverifikasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    );
};

export default Header;
