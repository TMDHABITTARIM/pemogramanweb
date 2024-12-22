// Import createApp dari Vue
import { createApp } from "vue";

// Import komponen utama App
import App from "./App.vue";

// Import konfigurasi router
import router from "./router";

// Import file CSS global
import './assets/style.css'; // Periksa path file CSS Anda, pastikan ada di lokasi ini

// Buat aplikasi Vue
const app = createApp(App);

// Gunakan router sebagai plugin di aplikasi Vue
app.use(router);
// Kaitkan aplikasi Vue ke elemen dengan id "app"
app.mount("#app");
