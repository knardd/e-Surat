/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#2B6CB0", // Biru Profesional
                "primary-hover": "#2C5282", // Biru Interaksi
                background: "#F7FAFC", // Latar Halaman (Cool Gray)
                surface: "#FFFFFF", // Latar Komponen (Putih)
                "text-main": "#2D3748", // Teks Utama (Slate Dark)
                "border-soft": "#E2E8F0", // Border Halus
                danger: "#E53E3E",
            },
            boxShadow: {
                glow: "0 4px 14px 0 rgba(43, 108, 176, 0.39)", // Efek glow untuk tombol utama
            },
            fontFamily: {
                sans: ["Inter", "sans-serif"], // Pastikan font Inter aktif
            },
        },
    },
    plugins: [],
};
