declare module 'alpinejs' {
    interface Alpine {
        start(): void;
        data(name: string, callback: () => any): void;
        store(name: string, data: any): void;
        directive(name: string, callback: Function): void;
    }

    interface AlpineInstance {
        $store: {
            theme: {
                isDark: boolean;
                toggle: () => void;
            }
        }
    }

    const alpine: Alpine;
    export default alpine;
}

declare global {
    interface Window {
        Alpine: import('alpinejs').Alpine;
    }
}