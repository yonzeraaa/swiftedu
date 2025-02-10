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

// Initialize theme
const theme = setupTheme();

// Register Alpine store
document.addEventListener('alpine:init', () => {
    Alpine.store('theme', {
        isDark: theme.isDark,
        toggle() {
            this.isDark = !this.isDark;
            document.documentElement.classList.toggle('dark', this.isDark);
            localStorage.theme = this.isDark ? 'dark' : 'light';
        }
    });
});

// Register form components
Alpine.data('loginForm', setupFormValidation);
Alpine.data('registerForm', setupRegisterFormValidation);

// Start Alpine
Alpine.start();

// Apply initial theme
document.addEventListener('DOMContentLoaded', () => {
    document.documentElement.classList.toggle('dark', theme.isDark);
});
