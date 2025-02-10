interface ValidationRules {
    required?: boolean;
    email?: boolean;
    minLength?: number;
    match?: string;
}

interface ValidationResult {
    isValid: boolean;
    message: string;
}

export const validateField = (value: string, rules: ValidationRules, formData?: any): ValidationResult => {
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

    if (rules.match && formData && value !== formData[rules.match]) {
        return {
            isValid: false,
            message: 'As senhas não coincidem'
        };
    }

    return {
        isValid: true,
        message: ''
    };
};

export const setupRegisterFormValidation = () => {
    return {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        errors: {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        },
        loading: false,

        validateName() {
            const result = validateField(this.name, {
                required: true,
                minLength: 3
            });
            this.errors.name = result.message;
            return result.isValid;
        },

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

        validatePasswordConfirmation() {
            const result = validateField(this.password_confirmation, {
                required: true,
                match: 'password'
            }, this);
            this.errors.password_confirmation = result.message;
            return result.isValid;
        },

        async handleSubmit() {
            this.loading = true;
            const isNameValid = this.validateName();
            const isEmailValid = this.validateEmail();
            const isPasswordValid = this.validatePassword();
            const isPasswordConfirmationValid = this.validatePasswordConfirmation();

            if (!isNameValid || !isEmailValid || !isPasswordValid || !isPasswordConfirmationValid) {
                this.loading = false;
                return;
            }

            try {
                const response = await fetch('/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    })
                });

                if (!response.ok) {
                    const data = await response.json();
                    throw new Error(data.message || 'Erro ao realizar cadastro');
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