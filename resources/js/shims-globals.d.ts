import {AxiosInstance} from "axios";
import {Config, Router} from "ziggy-js";

declare global {
    function route(): Router;
    function route(name: string, params?: any, absolute?: boolean, customZiggy?: Config): string;
    function usePage(): any;
}