import { createApp } from 'vue';
require('./bootstrap');

let app=createApp({})
app.component('example-component', require('./components/ExampleComponent.vue').default);
app.mount("#app")
