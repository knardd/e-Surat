import InputError from "@/Components/InputError";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();
        post(route("login"), {
            onFinish: () => reset("password"),
        });
    };

    return (
        <>
            <Head title="Masuk — E-Surat" />

            {/* Full-page wrapper */}
            <div className="flex">
                {/* LEFT PANEL — Branding */}
                <div
                    className="hidden md:flex lg:w-1/2 flex-col justify-between flex-1 p-12 relative overflow-hidden"
                    style={{
                        background:
                            "linear-gradient(145deg, #0f4c8a 0%, #1a6fc4 50%, #2389e8 100%)",
                    }}
                >
                    {/* Decorative circles */}
                    <div className="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-white/5 pointer-events-none" />
                    <div className="absolute -bottom-16 -left-16 w-56 h-56 rounded-full bg-white/[0.04] pointer-events-none" />

                    {/* Brand logo */}
                    <div className="flex items-center gap-3 z-10">
                        <div className="w-10 h-10 rounded-xl bg-white/15 border border-white/20 flex items-center justify-center">
                            <svg
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="white"
                                strokeWidth="2.2"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            >
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                        </div>
                        <span className="text-white text-lg font-extrabold tracking-tight">
                            E‑Surat{" "}
                            <span className="text-white/60 font-medium">
                                / Official
                            </span>
                        </span>
                    </div>

                    {/* Illustration */}
                    <div className="z-10 flex justify-center my-6">
                        <svg
                            width="220"
                            height="180"
                            viewBox="0 0 220 180"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            {/* Back document */}
                            <rect
                                x="20"
                                y="30"
                                width="130"
                                height="90"
                                rx="8"
                                fill="rgba(255,255,255,0.12)"
                                stroke="rgba(255,255,255,0.22)"
                                strokeWidth="1.2"
                            />
                            <rect
                                x="32"
                                y="46"
                                width="70"
                                height="5"
                                rx="2.5"
                                fill="rgba(255,255,255,0.5)"
                            />
                            <rect
                                x="32"
                                y="57"
                                width="90"
                                height="4"
                                rx="2"
                                fill="rgba(255,255,255,0.25)"
                            />
                            <rect
                                x="32"
                                y="66"
                                width="80"
                                height="4"
                                rx="2"
                                fill="rgba(255,255,255,0.25)"
                            />
                            <rect
                                x="32"
                                y="75"
                                width="85"
                                height="4"
                                rx="2"
                                fill="rgba(255,255,255,0.25)"
                            />
                            <rect
                                x="32"
                                y="84"
                                width="60"
                                height="4"
                                rx="2"
                                fill="rgba(255,255,255,0.25)"
                            />
                            <rect
                                x="32"
                                y="98"
                                width="46"
                                height="14"
                                rx="5"
                                fill="rgba(255,255,255,0.18)"
                                stroke="rgba(255,255,255,0.3)"
                                strokeWidth="0.8"
                            />
                            <text
                                x="55"
                                y="109"
                                fill="rgba(255,255,255,0.7)"
                                fontSize="8"
                                fontFamily="sans-serif"
                                textAnchor="middle"
                            >
                                Kirim
                            </text>

                            {/* Front document */}
                            <rect
                                x="50"
                                y="60"
                                width="115"
                                height="82"
                                rx="8"
                                fill="rgba(255,255,255,0.13)"
                                stroke="rgba(255,255,255,0.25)"
                                strokeWidth="1.2"
                            />
                            <rect
                                x="62"
                                y="75"
                                width="70"
                                height="5"
                                rx="2.5"
                                fill="rgba(255,255,255,0.55)"
                            />
                            <rect
                                x="62"
                                y="86"
                                width="88"
                                height="4"
                                rx="2"
                                fill="rgba(255,255,255,0.28)"
                            />
                            <rect
                                x="62"
                                y="95"
                                width="75"
                                height="4"
                                rx="2"
                                fill="rgba(255,255,255,0.28)"
                            />
                            <rect
                                x="62"
                                y="104"
                                width="82"
                                height="4"
                                rx="2"
                                fill="rgba(255,255,255,0.28)"
                            />
                            <rect
                                x="62"
                                y="113"
                                width="50"
                                height="4"
                                rx="2"
                                fill="rgba(255,255,255,0.18)"
                            />
                            <rect
                                x="62"
                                y="126"
                                width="56"
                                height="14"
                                rx="5"
                                fill="rgba(255,255,255,0.2)"
                                stroke="rgba(255,255,255,0.35)"
                                strokeWidth="0.8"
                            />
                            <text
                                x="90"
                                y="137"
                                fill="rgba(255,255,255,0.8)"
                                fontSize="8"
                                fontFamily="sans-serif"
                                textAnchor="middle"
                            >
                                Tanda Tangan
                            </text>

                            {/* Check badge top-right */}
                            <circle
                                cx="172"
                                cy="48"
                                r="24"
                                fill="rgba(255,255,255,0.10)"
                                stroke="rgba(255,255,255,0.2)"
                                strokeWidth="1"
                            />
                            <path
                                d="M164 50 L170 56 L182 42"
                                stroke="rgba(255,255,255,0.8)"
                                strokeWidth="2.2"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            />

                            {/* Check badge bottom-right */}
                            <circle
                                cx="185"
                                cy="115"
                                r="16"
                                fill="rgba(255,255,255,0.08)"
                                stroke="rgba(255,255,255,0.18)"
                                strokeWidth="1"
                            />
                            <path
                                d="M179 115 L184 120 L193 108"
                                stroke="rgba(255,255,255,0.5)"
                                strokeWidth="1.8"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            />

                            {/* Check badge left */}
                            <circle
                                cx="15"
                                cy="100"
                                r="10"
                                fill="rgba(255,255,255,0.08)"
                                stroke="rgba(255,255,255,0.15)"
                                strokeWidth="1"
                            />
                            <path
                                d="M11 100 L14 103 L20 96"
                                stroke="rgba(255,255,255,0.45)"
                                strokeWidth="1.5"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                            />
                        </svg>
                    </div>

                    {/* Hero text */}
                    <div className="z-10">
                        <h2 className="text-3xl font-extrabold text-white leading-tight tracking-tight mb-3">
                            Sistem Manajemen
                            <br />
                            Surat Digital
                        </h2>
                        <p className="text-sm text-white/65 leading-relaxed max-w-xs">
                            Kelola surat masuk, keluar, dan disposisi secara
                            efisien dalam satu platform terpusat.
                        </p>
                    </div>

                    {/* Stats row */}
                    <div className="z-10 flex gap-3 mt-6">
                        {[
                            { num: "1.2K+", lbl: "Surat diproses" },
                            { num: "98%", lbl: "Akurasi sistem" },
                            { num: "24/7", lbl: "Tersedia online" },
                        ].map((s) => (
                            <div
                                key={s.lbl}
                                className="flex-1 rounded-xl bg-white/10 border border-white/10 px-4 py-3"
                            >
                                <div className="text-xl font-extrabold text-white">
                                    {s.num}
                                </div>
                                <div className="text-xs text-white/55 mt-0.5">
                                    {s.lbl}
                                </div>
                            </div>
                        ))}
                    </div>
                </div>

                {/*   RIGHT PANEL — Login Form */}
                <div className="flex-1 lg:w-1/2 bg-white flex items-center justify-center p-8 md:p-12">
                    <div className="w-full max-w-sm">
                        {/* Mobile-only brand header */}
                        <div className="flex items-center gap-2 mb-8 md:hidden">
                            <div
                                className="w-9 h-9 rounded-lg flex items-center justify-center"
                                style={{
                                    background:
                                        "linear-gradient(135deg,#1a6fc4,#2389e8)",
                                }}
                            >
                                <svg
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="white"
                                    strokeWidth="2.2"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                >
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </div>
                            <span className="text-slate-800 font-extrabold text-lg">
                                E‑Surat
                            </span>
                        </div>

                        <h1 className="text-3xl font-extrabold text-slate-900 tracking-tight mb-1">
                            Selamat datang
                        </h1>
                        <p className="text-sm text-slate-500 mb-8">
                            Masuk ke akun E-Surat Anda untuk melanjutkan
                        </p>

                        {/* Status message */}
                        {status && (
                            <div className="flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-2.5 mb-6">
                                <svg
                                    width="14"
                                    height="14"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    strokeWidth="2.5"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                >
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                    <polyline points="22 4 12 14.01 9 11.01" />
                                </svg>
                                {status}
                            </div>
                        )}

                        <form onSubmit={submit} className="space-y-5">
                            {/* Email / NIP */}
                            <div>
                                <label
                                    htmlFor="email"
                                    className="block text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1.5"
                                >
                                    Email
                                </label>
                                <div className="relative">
                                    <span className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            strokeWidth="2"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                        >
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                    </span>
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value={data.email}
                                        autoComplete="username"
                                        autoFocus
                                        placeholder="Name@gmail.com"
                                        onChange={(e) =>
                                            setData("email", e.target.value)
                                        }
                                        className="w-full h-11 pl-9 pr-4 rounded-lg border border-slate-200 bg-slate-50 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/15 transition"
                                    />
                                </div>
                                <InputError
                                    message={errors.email}
                                    className="mt-1.5 text-xs text-red-500"
                                />
                            </div>

                            {/* Password */}
                            <div>
                                <label
                                    htmlFor="password"
                                    className="block text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1.5"
                                >
                                    Password
                                </label>
                                <div className="relative">
                                    <span className="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            strokeWidth="2"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                        >
                                            <rect
                                                x="3"
                                                y="11"
                                                width="18"
                                                height="11"
                                                rx="2"
                                            />
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                        </svg>
                                    </span>
                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        value={data.password}
                                        autoComplete="current-password"
                                        placeholder="Password"
                                        onChange={(e) =>
                                            setData("password", e.target.value)
                                        }
                                        className="w-full h-11 pl-9 pr-4 rounded-lg border border-slate-200 bg-slate-50 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/15 transition"
                                    />
                                </div>
                                <InputError
                                    message={errors.password}
                                    className="mt-1.5 text-xs text-red-500"
                                />
                            </div>

                            {/* Remember + Forgot */}
                            <div className="flex items-center justify-between">
                                <label className="flex items-center gap-2 text-sm text-slate-500 cursor-pointer select-none">
                                    <input
                                        type="checkbox"
                                        checked={data.remember}
                                        onChange={(e) =>
                                            setData(
                                                "remember",
                                                e.target.checked,
                                            )
                                        }
                                        className="w-4 h-4 rounded accent-blue-600"
                                    />
                                    Remember me
                                </label>
                                {canResetPassword && (
                                    <Link
                                        href={route("password.request")}
                                        className="text-sm text-blue-600 font-medium hover:text-blue-800 hover:underline"
                                    >
                                        Forgot password
                                    </Link>
                                )}
                            </div>

                            {/* Submit button */}
                            <button
                                type="submit"
                                disabled={processing}
                                className="w-full h-11 flex items-center justify-center gap-2 rounded-lg text-sm font-bold text-white transition hover:opacity-90 active:scale-[0.98] disabled:opacity-60"
                                style={{
                                    background:
                                        "linear-gradient(135deg, #1a6fc4, #2389e8)",
                                }}
                            >
                                {processing ? (
                                    <>
                                        <svg
                                            className="animate-spin"
                                            width="15"
                                            height="15"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="white"
                                            strokeWidth="2.5"
                                            strokeLinecap="round"
                                        >
                                            <path d="M21 12a9 9 0 1 1-6.219-8.56" />
                                        </svg>
                                        Memproses…
                                    </>
                                ) : (
                                    <>Masuk</>
                                )}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </>
    );
}
