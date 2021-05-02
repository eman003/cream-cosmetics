require('./bootstrap');

// Import modules...
import { createApp, h, } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faWhatsapp, faInstagram, faYoutube, faTwitter } from '@fortawesome/free-brands-svg-icons';
import {
    faLock,
    faProjectDiagram,
    faShoppingBasket,
    faBullhorn,
    faPlus,
    faShoppingCart,
    faPaperPlane
} from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(
    faLock, faProjectDiagram, faShoppingBasket, faBullhorn, faPlus, faShoppingCart, faPaperPlane,
    faWhatsapp, faInstagram, faYoutube, faTwitter
)

const el = document.getElementById('app');

const  app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
});

app.component('font-awesome-icon', FontAwesomeIcon)

app.config.productionTip = false

app.mixin({ methods: { route } })
    .use(InertiaPlugin)
    .mount(el)

InertiaProgress.init({ color: '#68D391' });
