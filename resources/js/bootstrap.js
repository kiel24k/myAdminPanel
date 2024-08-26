import axios from "axios";
window.axios = axios;
window.axios.defaults.withCredentials = true;
window.axios.defaults.withXSRFToken = true;

axios.get("http://127.0.0.1:8000/sanctum/csrf-cookie");

const instance = axios.create({
    baseURL: "http://127.0.0.1:8000/api", // Replace with your API URL
    withCredentials: true, // Include cookies in requests
});

instance.defaults.headers.common["X-CSRF-TOKEN"] = document.head.querySelector(
    'meta[name="csrf-token"]'
).content;
export default instance;
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import "./echo";
