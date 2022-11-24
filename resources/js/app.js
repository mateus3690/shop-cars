import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.bundle'
import { maska } from 'maska'

import { library } from "@fortawesome/fontawesome-svg-core";
import { faUser, faPen, faTrash, faCircleCheck} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";


library.add(
    faUser,
    faPen,
    faTrash,
    faCircleCheck
);

InertiaProgress.init({
    color:'#fff'
})

createInertiaApp({
  resolve: name => import(`./Pages/${name}.vue`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .directive('maska', maska)
      .component('fa-icon', FontAwesomeIcon)
      .mount(el)
  },
})
