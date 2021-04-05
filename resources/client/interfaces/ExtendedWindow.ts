export default interface ExtendedWindow extends Window {
    StratumUser?: {
        id: number;
        admin: number;
        name: string;
        email: string;
        language: string;
        created_at: string;
    };
}
