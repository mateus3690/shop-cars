<template>
    <main>

        <Head>
            <link rel="icon" href="../img/logo.png">
            <title>Concessionária - MTS</title>
        </Head>

        <header>
            <NavMenu/>
        </header>

        <article  class="m-3">
            <slot />
        </article>

        <footer class="my-5">
            <Footer/>
        </footer>
    </main>

</template>

<script>

import NavMenu  from './components/NavMenu.vue'
import Footer from './components/Footer.vue'
import { defineComponent, ref } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'

export default defineComponent({
    components: {
        Head,
        NavMenu,
        Footer
    }
})

</script>
