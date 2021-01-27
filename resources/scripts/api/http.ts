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


/**
 * Converts an error into a human readable response. Mostly just a generic helper to
 * make sure we display the message from the server back to the user if we can.
 */
export function httpErrorToHuman (error: any, messageOnly = false): any {
    if (error.response && error.response.data && !messageOnly) {
        let { data } = error.response;

        // Some non-JSON requests can still return the error as a JSON block. In those cases, attempt
        // to parse it into JSON so we can display an actual error.
        if (typeof data === 'string') {
            try {
                data = JSON.parse(data);
            } catch (e) {
                // do nothing, bad json
            }
        }

        if (data.errors) {
            return data.errors;
        }

        // Errors from wings directory, mostly just for file uploads.
        if (data.error && typeof data.error === 'string') {
            return data.error;
        }
    }

    return error.message;
}