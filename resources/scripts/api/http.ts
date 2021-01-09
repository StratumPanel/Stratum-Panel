// This is the boilerplate for all HTTP requests made with Axios

import axios, { AxiosInstance } from 'axios';

const http: AxiosInstance = axios.create({
    timeout: 20000,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        Accept: 'application/json',
        'Content-Type': 'application/json',
        'X-XSRF-Token': (window as any).X_CSRF_TOKEN as string || '',
    },
});

export default http;