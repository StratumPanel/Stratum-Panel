import http from '@/api/http';

export default (name: string, email: string): Promise<void> => {
    return new Promise((resolve, reject) => {
        http.put('/api/security/user/profile-information', { name, email })
            .then(() => resolve())
            .catch(reject);
    });
};