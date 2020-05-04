// Create axios instance
const service = window.axios.create({
    baseURL: process.env.MIX_BASE_API,
    timeout: 10000, // Request timeout
});

// Request intercepter
service.interceptors.request.use(
    config => {
        return config;
    },
    error => {
        // Do something with request error
        console.log(error); // for debug
        Promise.reject(error);
    }
);


export default service;
