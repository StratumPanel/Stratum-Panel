import http from '@/api/http';

export interface LoginResponse {
    two_factor: boolean;
}

export interface LoginData {
    email: string;
    password: string;
}

export default ({ email, password}: LoginData): Promise<LoginResponse> => {
    return new Promise((resolve, reject) => {
        http.post('/api/security/login', {
            email,
            password,
        })
            .then(response => {
                if (!(response.data instanceof Object)) {
                    return reject(new Error('An error occurred while processing the login request.'));
                }

                return resolve({
                    two_factor: response.data.two_factor,
                });
            })
            .catch(reject);
    });
};