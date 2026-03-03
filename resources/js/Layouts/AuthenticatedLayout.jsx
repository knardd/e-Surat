import ApplicationLogo from "@/Components/ApplicationLogo";
import Dropdown from "@/Components/Dropdown";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink";
import { Link, usePage } from "@inertiajs/react";
import { useState } from "react";
import SideNavItem from "@/Components/SideNavItem";
import DashboardIcon from "@/Components/Icons/DashboardIcon";
import SuratIcon from "@/Components/Icons/SuratIcon";

export default function AuthenticatedLayout({ header, children }) {
    const user = usePage().props.auth.user;
    const [showingMobileMenu, setShowingMobileMenu] = useState(false);

    return (
        <div className="min-h-screen bg-gray-50 flex">
            {/* ===== SIDEBAR ===== */}
            <aside className="hidden md:flex w-60 min-h-screen bg-white border-r border-gray-100 flex-col fixed left-0 top-0 z-30">
                {/* Logo */}
                <div className="h-16 flex items-center px-6 border-b border-gray-100">
                    <div className="flex items-center gap-2.5">
                        <div className="w-7 h-7 rounded-lg bg-indigo-600 flex items-center justify-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="white"
                                className="w-4 h-4"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z"
                                    clipRule="evenodd"
                                />
                            </svg>
                        </div>
                        <span className="text-sm font-semibold text-gray-800 tracking-tight">
                            SuratKu
                        </span>
                    </div>
                </div>

                {/* Nav Links */}
                <nav className="flex-1 px-3 py-4 space-y-0.5">
                    <p className="text-[10px] font-semibold text-gray-400 uppercase tracking-widest px-4 mb-2">
                        Menu
                    </p>
                    <SideNavItem
                        href={route("admin.dashboard")}
                        active={route().current("dashboard")}
                        icon={<DashboardIcon />}
                    >
                        Dashboard
                    </SideNavItem>
                    <SideNavItem
                        href={route("admin.cekSurat")}
                        active={route().current("cekSurat")}
                        icon={<SuratIcon />}
                    >
                        Cek Surat
                    </SideNavItem>
                </nav>

                {/* User Profile di bawah */}
                <div className="border-t border-gray-100 p-4">
                    <Dropdown>
                        <Dropdown.Trigger>
                            <button className="w-full flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 transition-colors text-left">
                                <div className="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">
                                    <span className="text-xs font-semibold text-indigo-600">
                                        {user.name.charAt(0).toUpperCase()}
                                    </span>
                                </div>
                                <div className="flex-1 min-w-0">
                                    <p className="text-sm font-medium text-gray-800 truncate">
                                        {user.name}
                                    </p>
                                    <p className="text-xs text-gray-400 truncate">
                                        {user.email}
                                    </p>
                                </div>
                                <svg
                                    className="w-4 h-4 text-gray-400 flex-shrink-0"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fillRule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clipRule="evenodd"
                                    />
                                </svg>
                            </button>
                        </Dropdown.Trigger>
                        <Dropdown.Content>
                            <Dropdown.Link href={route("profile.edit")}>
                                Profile
                            </Dropdown.Link>
                            <Dropdown.Link
                                href={route("logout")}
                                method="post"
                                as="button"
                            >
                                Log Out
                            </Dropdown.Link>
                        </Dropdown.Content>
                    </Dropdown>
                </div>
            </aside>

            {/* ===== MAIN AREA ===== */}
            <div className="flex-1 flex flex-col md:ml-60">
                {/* Mobile Menu */}
                {showingMobileMenu && (
                    <div className="md:hidden bg-white border-b border-gray-100 px-3 py-2 space-y-0.5">
                        <ResponsiveNavLink
                            href={route("dashboard")}
                            active={route().current("dashboard")}
                        >
                            Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route("createSurat")}
                            active={route().current("createSurat")}
                        >
                            Buat Surat
                        </ResponsiveNavLink>
                        <div className="border-t border-gray-100 pt-2 mt-2">
                            <ResponsiveNavLink href={route("profile.edit")}>
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                method="post"
                                href={route("logout")}
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                )}

                {/* Page Content */}
                <main className="flex-1 p-2">{children}</main>
            </div>
        </div>
    );
}
