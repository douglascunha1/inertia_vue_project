import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import '../css/app.css';
import Layout from "./Layouts/Layout.vue";

createInertiaApp({
    title: title => `My App ${title}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page =  pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head) // Add Head as global component
            .component('Link', Link) // Add Link as global component
            .mount(el)
    },
})
