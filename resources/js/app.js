import {createApp, h} from 'vue'
import {createInertiaApp, Link, Head} from '@inertiajs/inertia-vue3'
import {InertiaProgress} from '@inertiajs/progress'
import * as bootstrap from 'bootstrap'
import Toast from "vue-toastification"
import "vue-toastification/dist/index.css"
import Layout from '@/Layout/Base'

createInertiaApp({

    //Define o Layout padrão para qualquer componente sem um layout.

    resolve: name => {
        const page = require(`./Pages/${name}`).default;
        //page.layout ??= Layout
        return page;
    },

    setup({el, App, props, plugin}) {
        const app = createApp({render: () => h(App, props)});

        app.config.globalProperties.$volt = window.Volt;

        app.use(plugin)
            .use(Toast)
            .component("Link", Link)
            .component("Head", Head)
            .component("Layout", Layout)
            .mixin({
                methods: {
                    route: window.route
                }
            })
            .mount(el)
    },

    title: title => {
        if (title) {
            return title
        }
    }
})

InertiaProgress.init({
    delay: 400,
    color: "red",
    showSpinner: true,
})
