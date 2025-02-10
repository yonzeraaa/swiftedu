declare module 'alpinejs' {
    interface Alpine {
        start(): void;
        data(name: string, callback: () => any): void;
        directive(name: string, callback: Function): void;
        magic(name: string, callback: Function): void;
        store(name: string, value: any): void;
    }

    const alpine: Alpine;
    export default alpine;
}