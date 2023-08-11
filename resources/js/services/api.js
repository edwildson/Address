import axios, { AxiosInstance } from 'axios';

console.log(process.env.MIX_VUE_APP_API_PORT);
const api = axios.create({
    baseURL: `http://localhost:${process.env.MIX_VUE_APP_API_PORT}/api/`,
});

export default api;