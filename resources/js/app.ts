import './bootstrap';
import Alpine from 'alpinejs';
import { setupFormValidation } from './utils/validation';
import { setupRegisterFormValidation } from './utils/registerValidation';
import { setupTheme } from './utils/theme';

declare global {
    interface Window {
        Alpine: typeof Alpine;
    }
}

// Initialize Alpine
window.Alpine = Alpine;

// Register components
Alpine.data('loginForm', setupFormValidation);
Alpine.data('registerForm', setupRegisterFormValidation);

// Initialize theme
const theme = setupTheme();

// Register theme component with initial state
Alpine.data('theme', () => ({
    isDark: theme.isDark,

    init() {
        // Apply initial theme
        if (this.isDark) {
            document.documentElement.classList.add('dark');
        }
    },

    toggle() {
        this.isDark = !this.isDark;
        
        if (this.isDark) {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        }
    }
}));

// Start Alpine
Alpine.start();

// Initialize theme on page load
document.addEventListener('DOMContentLoaded', () => {
    theme.init();
});
