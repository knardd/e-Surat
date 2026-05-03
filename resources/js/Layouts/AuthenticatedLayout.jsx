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
        <div className="min-h-screen bg-[#F9FAFB] flex font-sans antialiased text-slate-900">
            {/* ===== COMPACT SIDEBAR ===== */}
            <aside className="hidden md:flex w-60 min-h-screen bg-white border-r border-slate-200 flex-col fixed left-0 top-0 z-30 shadow-[1px_0_0_0_rgba(0,0,0,0.05)]">
                {/* Minimalist Logo */}
                <div className="h-14 flex items-center px-4 border-b border-slate-100 mb-2 shrink-0">
                    <div className="flex items-center gap-2">
                        <div className="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center shadow-sm shadow-blue-100">
                            <span className="text-blue-600">
                                <SuratIcon />
                            </span>
                        </div>
                        <span className="text-[15px] font-bold text-slate-800 tracking-tight">
                            E Surat
                        </span>
                    </div>
                </div>

                {/* Nav Links */}
                <nav className="flex-grow px-3 py-2 space-y-1 overflow-y-auto">
                    <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-3 mb-2 flex items-center">
                        Main Navigation
                    </p>

                    {/* Admin Links */}
                    {user.role === "admin" && (
                        <>
                            <SideNavItem
                                href={route("admin.dashboard")}
                                active={route().current("admin.dashboard")}
                                icon={<DashboardIcon className="w-4 h-4" />}
                            >
                                <span className="text-sm font-semibold tracking-tight">
                                    Dashboard
                                </span>
                            </SideNavItem>
                            <SideNavItem
                                href={route("admin.cekSurat")}
                                active={route().current("admin.cekSurat")}
                                icon={<SuratIcon className="w-4 h-4" />}
                            >
                                <span className="text-sm font-semibold tracking-tight">
                                    Cek Surat
                                </span>
                            </SideNavItem>
                        </>
                    )}

                    {/* Operator Links */}
                    {user.role === "operator" && (
                        <>
                            <SideNavItem
                                href={route("operator.dashboard")}
                                active={route().current("operator.dashboard")}
                                icon={<DashboardIcon className="w-4 h-4" />}
                            >
                                <span className="text-sm font-semibold tracking-tight">
                                    Dashboard
                                </span>
                            </SideNavItem>
                            <SideNavItem
                                href={route("operator.users.index")}
                                active={route().current("operator.users.*")}
                                icon={<SuratIcon className="w-4 h-4" />}
                            >
                                <span className="text-sm font-semibold tracking-tight">
                                    Kelola User
                                </span>
                            </SideNavItem>
                        </>
                    )}
                </nav>

                {/* Refined User Profile */}
                <div className="border-t border-slate-100 p-3 bg-slate-50/50 shrink-0 relative">
                    <Dropdown>
                        <Dropdown.Trigger>
                            <button
                                type="button"
                                className="w-full flex items-center gap-2.5 p-1.5 rounded-xl hover:bg-white hover:shadow-sm border border-transparent hover:border-slate-200 transition-all text-left group"
                            >
                                <div className="w-8 h-8 rounded-lg bg-blue-50 border border-blue-100 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-600 group-hover:border-blue-600 transition-colors">
                                    <span className="text-xs font-bold text-blue-600 group-hover:text-white">
                                        {user.name.charAt(0).toUpperCase()}
                                    </span>
                                </div>
                                <div className="flex-1 min-w-0">
                                    <p className="text-[13px] font-bold text-slate-800 truncate leading-tight">
                                        {user.name}
                                    </p>
                                    <p className="text-[10px] text-slate-400 truncate font-medium">
                                        {user.role.charAt(0).toUpperCase() +
                                            user.role.slice(1)}
                                    </p>
                                </div>
                                <svg
                                    className="w-3.5 h-3.5 text-slate-400 flex-shrink-0"
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

                        <Dropdown.Content
                            align="top"
                            width="48"
                            contentClasses="py-1 bg-white border border-slate-200 shadow-xl rounded-xl"
                        >
                            <div className="px-4 py-2.5 border-b border-slate-50 mb-1">
                                <p className="text-[11px] font-bold text-slate-400 uppercase tracking-tight mb-0.5">
                                    Account Info
                                </p>
                                <p className="text-xs font-bold text-slate-800 truncate">
                                    {user.email}
                                </p>
                            </div>

                            <Dropdown.Link
                                href={route("profile.edit")}
                                className="!text-xs font-semibold !text-slate-600 hover:!bg-blue-50 hover:!text-blue-600 flex items-center py-2"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-3.5 w-3.5 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth={2}
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                Edit Account
                            </Dropdown.Link>

                            <Dropdown.Link
                                href={route("logout")}
                                method="post"
                                as="button"
                                className="!text-xs font-semibold !text-rose-600 hover:!bg-rose-50 flex items-center py-2 w-full"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="h-3.5 w-3.5 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth={2}
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    />
                                </svg>
                                Sign Out
                            </Dropdown.Link>
                        </Dropdown.Content>
                    </Dropdown>
                </div>
            </aside>

            {/* ===== CLEAN MAIN AREA ===== */}
            <div className="flex-1 flex flex-col md:ml-60">
                {/* Mobile Menu (Minimal) */}
                <div className="md:hidden flex items-center justify-between h-14 bg-white border-b border-slate-200 px-4">
                    <span className="text-sm font-bold text-slate-800">
                        E Surat
                    </span>
                    <button
                        onClick={() => setShowingMobileMenu(!showingMobileMenu)}
                        className="p-2 text-slate-500"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            className="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth={2}
                                d="M4 6h16M4 12h16m-7 6h7"
                            />
                        </svg>
                    </button>
                </div>

                {showingMobileMenu && (
                    <div className="md:hidden bg-white border-b border-slate-200 px-3 py-2 space-y-1 shadow-lg">
                        {user.role === "admin" && (
                            <>
                                <ResponsiveNavLink
                                    href={route("admin.dashboard")}
                                    active={route().current("admin.dashboard")}
                                    className="!text-sm font-bold"
                                >
                                    Dashboard
                                </ResponsiveNavLink>
                                <ResponsiveNavLink
                                    href={route("admin.cekSurat")}
                                    active={route().current("admin.cekSurat")}
                                    className="!text-sm font-bold"
                                >
                                    Cek Surat
                                </ResponsiveNavLink>
                            </>
                        )}

                        {user.role === "operator" && (
                            <>
                                <ResponsiveNavLink
                                    href={route("operator.dashboard")}
                                    active={route().current(
                                        "operator.dashboard",
                                    )}
                                    className="!text-sm font-bold"
                                >
                                    Dashboard
                                </ResponsiveNavLink>
                                <ResponsiveNavLink
                                    href={route("operator.users.index")}
                                    active={route().current("operator.users.*")}
                                    className="!text-sm font-bold"
                                >
                                    Kelola User
                                </ResponsiveNavLink>
                            </>
                        )}

                        <div className="border-t border-slate-100 pt-2 mt-2">
                            <ResponsiveNavLink
                                href={route("profile.edit")}
                                className="!text-sm font-bold"
                            >
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                method="post"
                                href={route("logout")}
                                as="button"
                                className="!text-sm font-bold !text-rose-600"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                )}

                {/* Tight Page Content */}
                <main className="flex-1 p-0 overflow-x-hidden">{children}</main>
            </div>
        </div>
    );
}
