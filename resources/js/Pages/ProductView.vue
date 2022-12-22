<template>

    <Layout>

        <!-- alert de sucesso -->
        <MensageAlert :msg="$page.props.flash.success"/>

        <div class="container text-white">
            <div class="row m-5" >

                <h1 class="my-5">Produto Cadastrados</h1>

                <table className="table table-dark table-striped mb-5 ">

                    <thead>
                        <tr>
                        <th scope="col">Código #</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Valor R$</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detalhes</th>
                        </tr>
                    </thead>
                    <tbody >
                    <template v-for="item in products" :key="item.id">
                        <tr class="align-items-center">
                        <td>#{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.type_model.name }}</td>
                        <td>{{ item.category.name }}</td>
                        <td> R$:{{ (item.price).toFixed(2) }}</td>
                        <td>{{ item.year_product }}</td>
                        <td>{{ item.color }}</td>
                        <td>{{ item.published == 1 ? 'Ativo' : 'Desativado' }}</td>
                        <td><Link :href="'/product-detail/'+item.id" class="btn btn-primary col-7"><fa-icon icon="pen" /></Link></td>
                    </tr>
                    </template>
                    </tbody>
                </table>

            </div>

        </div>

    </Layout>

</template>

<script>

import Layout from '../Layout.vue'
import MensageAlert from '../components/MensageAlert.vue'
import { Link } from '@inertiajs/inertia-vue3'

import { defineComponent, ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'


export default defineComponent ({

    props: {
        errors: Object,
        products: Object,
    },
    setup () {

        const payload = ref({
            name:null,
            birth:null,
            cpf:null,
            type_user:null,
            image:null,
            email:null,
            password:null
        })

        const imgBase64 = async (e) => {
            const file = e.target.files[0]
            const reader = new FileReader()
            let rawImg
            reader.onloadend = () => {
                rawImg = reader.result
                payload.value.image = rawImg
            }
            reader.readAsDataURL(file)
        }

        const PostForm = () => {
            //Inertia.post('/user-register', payload.value)
        }

        return {
            payload,
            PostForm,
            imgBase64
        }
    },

    components: {
        Layout,
        Link,
        MensageAlert
    }

})
</script>

<style>

</style>
