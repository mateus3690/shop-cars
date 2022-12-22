<template>
<Layout>

    <div class="container text-white">
        <div class="m-2 row">

            <div class="col-12 row">

                <div class="col-4">
                    <img
                    :src="product.image"
                    alt="imagem"
                    class="rounded"
                    width="320"
                    height="280"
                    >
                </div>

                <div class="col-6">
                    <h4>Descrição:</h4>
                    <h5 class="descript">{{product.description}}</h5>
                </div>

            </div>

            <div class="col-12 my-3">
                <h3>{{product.name}}</h3>
            </div>

            <div class="col-12 row">

                <div class="col-2">
                    <h4>Modelo</h4>
                    <h5 class="descript">- {{product.type_model.name}}</h5>
                </div>

                <div class="col-3">
                    <h4>Ano de Fabricação</h4>
                    <h5 class="descript">- {{product.year_product}}</h5>
                </div>

                <div class="col-2 m-1">
                    <h4>Cor</h4>
                    <h5 class="descript">- {{product.color}}</h5>
                </div>

                <div class="col-2 m-1">
                    <h4>Valor</h4>
                    <h5> R$:{{(product.price).toFixed(2)}}</h5>
                </div>

            </div>

            <div class="col-12 row">
                <div class="col-2">
                    <h4>Status</h4>
                    <h5 class="descript">{{ product.published == 1 ? '+ Ativo': '- Desativado'}}</h5>
                </div>

                <div class="col-7">
                    <h4>Data de Publicação</h4>
                    <h5 class="descript">{{ new Date(product.created_at) }}</h5>
                </div>
            </div>

            <div class="col-12 mb-5 my-3">

                <Link
                    class="btn btn-lg btn-light border m-2"
                    href="/product-view"
                >
                    Voltar
                </Link>

                <button
                    class="btn btn-lg btn-danger border m-2"
                    data-bs-toggle="modal"
                    data-bs-target="#formProduct"
                    @click="DeleteProduct(product.id)"
                >
                    Excluir <fa-icon icon="trash"/>
                </button>

                <Link
                    type="button"
                    class="btn btn-lg btn-primary m-2"
                    :href="'/product-register/' + product.id"
                >
                    Editar<fa-icon icon="pen"/>
                </Link>
            </div>

        </div>
    </div>
</Layout>

</template>

<script>

import Layout from '../Layout.vue'
import { defineComponent, ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent ({

    props: {
        product: Object,
    },
    setup () {

        const DeleteProduct = (id) => {
            Inertia.delete('/product-register/' + id)
        }

        return {
            DeleteProduct
        }
    },
    components: {
        Layout,
        Link,

    }

})

</script>

<style>
    .descript{
        opacity: 0.6;
    }
    .descript:hover{
        opacity: 1;
        font-size: 1.26rem;
    }

</style>
