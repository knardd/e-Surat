import Checkbox from "@/Components/Checkbox";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import GuestLayout from "@/Layouts/GuestLayout";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
    });

    const submit = (e) => {
        e.preventDefault();
        post(route("login"), {
            onFinish: () => reset("password"),
        });
    };

    return (
        <GuestLayout>
            <Head title="Log in" />

            {/* Background Blobs */}
            <div className="fixed -top-32 -left-32 w-[480px] h-[480px] bg-blue-400/20 rounded-full blur-3xl pointer-events-none"></div>
            <div className="fixed -bottom-28 -right-20 w-[420px] h-[420px] bg-indigo-400/20 rounded-full blur-3xl pointer-events-none"></div>

            <div className="relative z-10 bg-white rounded-3xl shadow-xl shadow-blue-500/20 p-12 w-full max-w-md animate-[fadeIn_.4s_ease-out]">
                {/* Logo */}
                <div className="flex justify-center mb-7">
                    <a href="/" className="flex items-center gap-2">
                        <div className="w-11 h-11 bg-gradient-to-br from-blue-600 to-blue-400 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/40">
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                strokeWidth="2.2"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                className="w-5 h-5 text-white"
                            >
                                <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                            </svg>
                        </div>
                        <span className="text-xl font-bold text-slate-800">
                            Volt<span className="text-blue-600">App</span>
                        </span>
                    </a>
                </div>

                <h1 className="text-2xl font-bold text-center text-slate-900 mb-1">
                    Welcome back
                </h1>
                <p className="text-sm text-center text-slate-500 mb-8">
                    Sign in to your account to continue
                </p>

                {status && (
                    <div className="bg-green-50 border border-green-200 text-green-600 rounded-lg px-4 py-2 text-sm mb-5 flex items-center gap-2">
                        <svg
                            width="15"
                            height="15"
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

                <form onSubmit={submit}>
                    {/* Email */}
                    <div className="mb-5">
                        <InputLabel
                            htmlFor="email"
                            value="Email address"
                            className="text-sm font-medium text-gray-700"
                        />
                        <div className="relative mt-2">
                            <span className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    strokeWidth="2"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                >
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </span>
                            <TextInput
                                id="email"
                                type="email"
                                name="email"
                                value={data.email}
                                autoComplete="username"
                                isFocused={true}
                                placeholder="you@example.com"
                                onChange={(e) =>
                                    setData("email", e.target.value)
                                }
                                className="pl-10 w-full rounded-lg border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-sm"
                            />
                        </div>
                        <InputError
                            message={errors.email}
                            className="text-red-500 text-xs mt-2"
                        />
                    </div>

                    {/* Password */}
                    <div className="mb-5">
                        <InputLabel
                            htmlFor="password"
                            value="Password"
                            className="text-sm font-medium text-gray-700"
                        />
                        <div className="relative mt-2">
                            <span className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg
                                    width="16"
                                    height="16"
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
                                        ry="2"
                                    />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </span>
                            <TextInput
                                id="password"
                                type="password"
                                name="password"
                                value={data.password}
                                autoComplete="current-password"
                                placeholder="••••••••"
                                onChange={(e) =>
                                    setData("password", e.target.value)
                                }
                                className="pl-10 w-full rounded-lg border border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-sm"
                            />
                        </div>
                        <InputError
                            message={errors.password}
                            className="text-red-500 text-xs mt-2"
                        />
                    </div>

                    <div className="flex items-center justify-between mt-6">
                        {canResetPassword && (
                            <Link
                                href={route("password.request")}
                                className="text-sm text-blue-600 hover:text-blue-800 hover:underline"
                            >
                                Forgot password?
                            </Link>
                        )}

                        <PrimaryButton
                            disabled={processing}
                            className="bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-6 py-2 rounded-lg shadow-md shadow-blue-500/40 transition"
                        >
                            {processing ? "Signing in…" : "Sign in →"}
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </GuestLayout>
    );
}
