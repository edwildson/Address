require('./bootstrap')

import { createApp } from 'vue'
// import Welcome from './components/Welcome'
import Index from './pages/Index'
import '../css/app.css'
import router from './routes/router'
import App from './App'

const app = createApp({})

app.component('app', App)
app.use(router);

app.mount('#app')