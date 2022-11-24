<template>

    <Layout>

        <div class="row" >
            <!-- confirmar cadastro -->
            <div class="modal fade" id="formProduct" tabindex="-1" aria-labelledby="formProductLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="formProductLabel">Confirmar Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p>Os dados estão corretos, podemos processeguir?</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="SubmitForm()" data-bs-dismiss="modal">Confirmar</button>
                        </div>

                    </div>

                </div>

            </div>

            <!-- formulario -->
            <form class="row g-3 ">

                <div class="col-12 container-fluid  row">

                    <h2 class="text-dark my-3 ">
                        Registar Produto
                    </h2>

                    <!-- 1º parte -->
                    <div class="col-6">

                        <div class="col-12 my-2">

                            <label for="name" class="form-label">Produto</label>

                            <input
                                v-model="payload.name"
                                type="text"
                                class="form-control border-secondary"
                                id="name"
                                placeholder="Produto"
                            >

                            <p v-if="errors.name" class="text-danger">{{ errors.name }}</p>

                        </div>

                        <div class="col-12 my-2">

                            <label for="category" class="form-label">Categoria</label>

                            <select
                                v-model="payload.category_id"
                                class="form-control border-secondary text-secondary"
                                aria-label=".form-select-lg example"
                                id="category"
                            >
                                <option disabled selected >Selecione uma opção</option>
                                <option v-for="option in categories" :key="option.id" :value="option.id">
                                {{ option.name }}
                                </option>
                            </select>

                            <p v-if="errors.category_id" class="text-danger">{{ errors.category_id }}</p>

                        </div>

                        <div class="col-12 my-2">

                            <div class="row">

                                <div class="col-5">
                                    <label for="price" class="form-label">Preço</label>

                                    <input
                                        v-model="payload.price"
                                        type="number"
                                        class="form-control border-secondary"
                                        id="price"
                                        placeholder="R$"
                                        maxlength="11">

                                    <p v-if="errors.price" class="text-danger">{{ errors.price }}</p>

                                </div>

                                <div class="col-7">

                                    <label for="published" class="form-label">Status de Publicação</label>

                                    <select
                                        v-model="payload.published"
                                        class="form-control border-secondary text-secondary"
                                        aria-label=".form-select-lg example"
                                        id="published"
                                    >
                                        <option disabled selected value="">Selecione uma opção</option>
                                        <option :value="true" class="text-success">Ativo</option>
                                        <option :value="false" class="text-danger">Desativado</option>

                                    </select>

                                    <p v-if="errors.published" class="text-danger">{{ errors.published }}</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 my-2 row">

                            <label for="image" class="form-label">Imagem</label>

                            <div class="col-10">

                                <input
                                    type="file"
                                    class="form-control border-secondary "
                                    id="image"
                                    placeholder="Produto"
                                    @change="imgBase64"
                                >

                            </div>

                            <div class="col-2">

                                <img
                                    :src="payload.image"
                                    v-if="payload.image"
                                    width="40"
                                    height="40"
                                    class="rounded border-success border"
                                />

                            </div>

                            <p v-if="errors.image" class="text-danger">{{ errors.image }}</p>

                        </div>

                    </div>

                    <!-- 2º parte -->

                    <div class="col-6">

                        <div class="col-10">

                            <label for="model" class="form-label my-2">Modelo</label>

                            <select
                                v-model="payload.type_model_id"
                                class="form-control border-secondary text-secondary"
                                aria-label=".form-select-lg example"
                                id="model"
                            >
                                <option disabled selected value="">Selecione uma opção</option>
                                <option v-for="option in models" :key="option.id" :value="option.id">
                                {{ option.name }}
                                </option>
                            </select>

                            <p v-if="errors.type_model_id" class="text-danger">{{ errors.type_model_id }}</p>

                        </div>

                        <div class="row">

                            <div class="col-5">

                                <label for="color" class="form-label">Cor</label>

                                <input
                                    v-model="payload.color"
                                    type="text"
                                    class="form-control border-secondary"
                                    id="color"
                                >

                                <p v-if="errors.color" class="text-danger">{{ errors.color }}</p>

                            </div>

                            <div class="col-5">

                                <label for="year_product" class="form-label">Ano do Produto</label>

                                <input
                                    v-model="payload.year_product"
                                    v-maska="'####'"
                                    placeholder="0000"
                                    class="form-control border-secondary"
                                    id="year_product"
                                >

                                <p v-if="errors.year_product" class="text-danger">{{ errors.year_product }}</p>

                            </div>

                        </div>

                        <div class="col-md-10">

                            <label for="description" class="form-label">Descrição</label>

                            <textarea
                                v-model="payload.description"
                                class="form-control border-secondary"
                                id="description"
                                maxlength="1000"
                            />

                            <p class="text-secondary">
                                {{ payload.description ? (payload.description).length + ' / 1000' : null }}
                            </p>

                            <p v-if="errors.description" class="text-danger"> {{ errors.description }} </p>

                        </div>

                    </div>

                    <div class="col-11 my-1 modal-footer">

                        <Link :href="product.id ? '/product-detail/' + product.id : '/'">
                            <button class="btn btn-lg btn-light border m-2">Cancelar</button>
                        </Link>

                        <button type="button" class="btn btn-lg btn-primary m-2" data-bs-toggle="modal" data-bs-target="#formProduct">
                            Concluir
                        </button>

                    </div>

                </div>

            </form>
        </div>
    </Layout>

</template>

<script>

import Layout from '../Layout.vue'
import { defineComponent, ref, onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent ({

    props: {
        errors: Object,
        product: Object,
        categories: Object,
        models: Object
    },
    setup (props) {

        const payload = props.product.id ? ref(props.product) :
                ref({
                    name:null,
                    description:null,
                    price:null,
                    published:null,
                    image:null,
                    color:null,
                    year_product:null,
                    type_model_id:null,
                    category_id:null,
                    user_id: 99999,
                })
        
        onMounted(() => {
            if(props.product){
                payload.value.published = payload.value.published == 1 ?  true : false
            }
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

        const SubmitForm = () => {
            if(props.product.id){
                Inertia.put('/product-register', payload.value)
            }else{
                Inertia.post('/product-register', payload.value)
            }
            
        }

        return {
            payload,
            SubmitForm,
            imgBase64
        }
    },

    components: {
        Layout,
        Link
    }

})
</script>

<style>

</style>
