import axios from "axios";
axios.defaults.withCredentials = true;

axios.get("http://127.0.0.1:8000/api/sanctum/csrf-cookie");

// const instance = axios.create({
//     baseURL: "http://127.0.0.1:8000/", // Replace with your Laravel app URL
//     withCredentials: true, // Include cookies with requests
// });

// instance.defaults.headers.common["X-CSRF-TOKEN"] = document.head.querySelector(
//     'meta[name="csrf-token"]'
// ).content;

// export default instance;
