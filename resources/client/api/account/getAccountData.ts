import http from '@client/api/http';

export interface AccountData {
    id: number;
    admin: number;
    name: string;
    email: string;
    language: string;
    created_at: string;
}

export default (): Promise<AccountData> => {
    return new Promise((resolve, reject) => {
        http.get('/api/client/account')
            .then(response => {
                if (!(response.data instanceof Object)) {
                    return reject(new Error('An error occurred while processing the getAccountData request.'));
                }

                return resolve(response.data.data);
            })
            .catch(reject);
    });
};
