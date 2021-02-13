import http from '@client/api/http';

export interface AccountData {
    name: string;
    email: string;
}

export default ({ name, email }: AccountData): Promise<void> => {
    return new Promise((resolve, reject) => {
        http.put('/api/security/user/profile-information', { name, email })
            .then(() => resolve())
            .catch(reject);
    });
};