import http from '@/api/http';

export default (): Promise<void> => {
    return new Promise((resolve, reject) => {
        http.post('/api/security/logout')
            .then(() => resolve())
            .catch(reject);
    });
};