interface ValidationRules {
    required?: boolean;
    email?: boolean;
    minLength?: number;
}

interface ValidationResult {
    isValid: boolean;
    message: string;
}

export const validateField = (value: string, rules: ValidationRules): ValidationResult => {
    if (rules.required && !value.trim()) {
        return {
            isValid: false,
            message: 'Este campo é obrigatório'
        };
    }

    if (rules.email && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            return {
                isValid: false,
                message: 'Email inválido'
            };
        }
    }

    if (rules.minLength && value.length < rules.minLength) {
        return {
            isValid: false,
            message: `Mínimo de ${rules.minLength} caracteres`
        };
    }

    return {
        isValid: true,
        message: ''
    };
};

export const setupFormValidation = () => {
    return {
        email: '',
        password: '',
        errors: {
            email: '',
            password: ''
        },
        loading: false,

        validateEmail() {
            const result = validateField(this.email, {
                required: true,
                email: true
            });
            this.errors.email = result.message;
            return result.isValid;
        },

        validatePassword() {
            const result = validateField(this.password, {
                required: true,
                minLength: 8
            });
            this.errors.password = result.message;
            return result.isValid;
        },

        async handleSubmit() {
            this.loading = true;
            const isEmailValid = this.validateEmail();
            const isPasswordValid = this.validatePassword();

            if (!isEmailValid || !isPasswordValid) {
                this.loading = false;
                return;
            }

            try {
                const response = await fetch('/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password
                    })
                });

                if (!response.ok) {
                    const data = await response.json();
                    throw new Error(data.message || 'Erro ao fazer login');
                }

                window.location.href = '/dashboard';
            } catch (error) {
                if (error instanceof Error) {
                    this.errors.email = error.message;
                }
            } finally {
                this.loading = false;
            }
        }
    };
};