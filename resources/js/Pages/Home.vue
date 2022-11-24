<template>

    <Layout>
        <!-- alert de sucesso -->
        <MensageAlert :msg="$page.props.flash.success"/>

        <!-- carousel -->
        <div>
            <Carousel/>
        </div>
       
        <hr/>
        <h3 class="text-secondary">Catálogo:</h3>
        <!-- Cards de catalogo -->
        <div class="row my-3">
            <div 
                v-for="item in products" 
                :key="item.id"
                class="col-4 col-md-4"
            >
                
                <Link 
                    class="card w-100 card-link" 
                    :href="'/product-detail/' + item.id"
                >
                    <img :src="item.image" class="card-img-top img-hover" alt="..." height="250">

                    <div class="card-body">
                      <h5 class="card-title">{{item.name + '-' + item.type_model.name}}</h5>
                      <p class="card-text">{{formatDescription(item.description)}}</p>
                      <p>R$:{{ (item.price).toFixed(2).replace('.', ',') }}</p>
                    </div>

                  </Link> 

            </div>
        </div>

    </Layout>

</template>

<script>

import Layout from '../Layout.vue';
import MensageAlert from '../components/MensageAlert.vue'
import Carousel from '../components/Carousel.vue'
import { Link } from '@inertiajs/inertia-vue3'
import { defineComponent, ref, onMounted } from 'vue'

export default defineComponent({
    props:{
        products: Object
    },
    setup(props) {
        const formatDescription = (text) => {
            return text.length <= 100 ? text : text.slice(0, 100) + ' (...)'
        }

        return{
            formatDescription
        }
    },
    components: {
        Layout,
        MensageAlert,
        Carousel,
        Link
    }
})

</script>

<style>
    .card-link{
        height: 460px; 
        margin-bottom: 2rem;
        text-decoration: none;
        color: black;
    }
    .card-link:hover{
        color: black;
        background: rgba(0,0,0,0.1);
    }

    .img-hover:hover{
        opacity: 0.8;
    }

</style>
