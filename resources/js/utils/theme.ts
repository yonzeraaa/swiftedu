interface ThemeManager {
    isDark: boolean;
    toggle: () => void;
    init: () => void;
}

export const setupTheme = (): ThemeManager => ({
    isDark: localStorage.theme === 'dark' || 
            (!('theme' in localStorage) && 
            window.matchMedia('(prefers-color-scheme: dark)').matches),

    init() {
        // Set initial state
        if (this.isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    },

    toggle() {
        // Toggle state
        this.isDark = !this.isDark;

        // Apply changes
        if (this.isDark) {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        }
    }
});

// Initialize theme on script load
document.addEventListener('DOMContentLoaded', () => {
    const theme = setupTheme();
    theme.init();
});