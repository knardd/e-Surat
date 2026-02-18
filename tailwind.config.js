import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
    ],

    theme: {
        extend: {
            colors: {
                // Primary Blues - Government Professional
                primary: {
                    DEFAULT: "#1E40AF",
                    50: "#EFF6FF",
                    100: "#DBEAFE",
                    200: "#BFDBFE",
                    300: "#93C5FD",
                    400: "#60A5FA",
                    500: "#3B82F6",
                    600: "#2563EB",
                    700: "#1D4ED8",
                    800: "#1E40AF",
                    900: "#1E3A8A",
                },
                "primary-hover": "#1E3A8A",
                "primary-light": "#3B82F6",

                // Backgrounds
                background: "#F8FAFC",
                surface: "#FFFFFF",

                // Text
                "text-main": "#1E293B",
                "text-muted": "#64748B",

                // Accent Colors
                accent: "#0EA5E9",
                success: "#10B981",
                danger: "#EF4444",
                warning: "#F59E0B",

                // Borders
                "border-soft": "#E2E8F0",
                "border-primary": "#93C5FD",
            },
            boxShadow: {
                glow: "0 4px 20px -2px rgba(30, 64, 175, 0.25)",
                "glow-lg": "0 8px 30px -4px rgba(30, 64, 175, 0.3)",
                card: "0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1)",
                "card-hover":
                    "0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1)",
                glass: "0 8px 32px 0 rgba(31, 38, 135, 0.15)",
            },
            fontFamily: {
                sans: ["Inter", "sans-serif"],
            },
            backgroundImage: {
                "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
                "hero-pattern":
                    "linear-gradient(135deg, #1E40AF 0%, #3B82F6 50%, #0EA5E9 100%)",
                "hero-subtle":
                    "linear-gradient(135deg, #EFF6FF 0%, #F8FAFC 50%, #F0F9FF 100%)",
                "card-shine":
                    "linear-gradient(135deg, rgba(255,255,255,0.2) 0%, transparent 50%, transparent 100%)",
            },
            animation: {
                "fade-in": "fadeIn 0.5s ease-out",
                "slide-up": "slideUp 0.5s ease-out",
                "scale-in":
                    "scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275)",
                float: "float 3s ease-in-out infinite",
                "pulse-slow": "pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite",
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                slideUp: {
                    "0%": { opacity: "0", transform: "translateY(20px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                scaleIn: {
                    "0%": { transform: "scale(0)", opacity: "0" },
                    "100%": { transform: "scale(1)", opacity: "1" },
                },
                float: {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-10px)" },
                },
            },
            borderRadius: {
                "4xl": "2rem",
            },
        },
    },

    plugins: [forms],
};
