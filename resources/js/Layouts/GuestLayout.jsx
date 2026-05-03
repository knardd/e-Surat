import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/react";

export default function GuestLayout({ children }) {
    return (
        <div className="flex min-h-screen flex-col items-center bg-[#F9FAFB] pt-6 sm:justify-center sm:pt-0 font-sans antialiased text-slate-900">
            <div className="w-full sm:max-w-md mt-6 px-6 py-6 bg-white border border-slate-200 shadow-sm sm:rounded-xl overflow-hidden">
                {children}
            </div>

            <div className="mt-8 text-center text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                &copy; {new Date().getFullYear()} E-Surat &bull; Secure
                Authentication
            </div>
        </div>
    );
}
