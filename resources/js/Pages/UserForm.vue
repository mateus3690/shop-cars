<template>

    <Layout>

        <div class="row" >

            <!-- confirmar cadastro -->
            <div class="modal fade" id="formUser" tabindex="-1" aria-labelledby="formUserLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="formUserLabel">Confirmar Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p>Os dados estão corretos, podemos processeguir?</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" @click="PostForm()" data-bs-dismiss="modal">Confirmar</button>
                        </div>

                    </div>

                </div>

            </div>

            <!-- formulario -->
            <form class="row g-3">

                <div class="col-12 container-fluid row">

                    <h2 class="text-dark my-3 ">
                        Cadastro de Usuário
                    </h2>

                    <!-- 1º parte -->
                    <div class="col-10">

                        <div class="row my-2">

                            <div class="col-8">

                                <label for="name" class="form-label">Nome Completo</label>

                                <input
                                    v-model="payload.name"
                                    type="text"
                                    class="form-control border-secondary"
                                    id="name"
                                    placeholder="Nome"
                                >

                                <p v-if="errors.name" class="text-danger">{{ errors.name }}</p>

                            </div>

                            <div class="col-4">

                                <label for="birth" class="form-label">Data de Nascimento</label>

                                <input
                                    v-model="payload.birth"
                                    type="date"
                                    class="form-control border-secondary"
                                    id="birth"
                                />

                                <p v-if="errors.birth" class="text-danger">{{ errors.birth }}</p>

                            </div>


                        </div>

                        <div class="col-12 my-2">

                            <div class="row">

                                <div class="col-4">

                                    <label for="cpf" class="form-label">CPF</label>

                                    <input
                                        v-model="payload.cpf"
                                        v-maska="'###.###.###-##'"
                                        type="text"
                                        class="form-control border-secondary"
                                        placeholder="CPF"
                                        id="cpf"
                                    />

                                    <p v-if="errors.cpf" class="text-danger">{{ errors.cpf }}</p>

                                </div>

                                <div class="col-3">

                                    <label for="type_user" class="form-label">Tipo de conta</label>

                                    <select
                                        v-model="payload.type_user"
                                        class="form-control border-secondary text-secondary"
                                        aria-label=".form-select-lg example"
                                        id="type_user"
                                    >
                                        <option disabled selected >Selecione uma opção</option>
                                        <option value="C" > Cliente </option>
                                        <option value="V" > Vendedor </option>

                                    </select>

                                    <p v-if="errors.type_user" class="text-danger">{{ errors.type_user }}</p>

                                </div>

                                <div class="col-5">
                                    <div class="col-12 row">

                                        <label for="image" class="form-label">Imagem</label>

                                        <div class="col-11">

                                            <input
                                                type="file"
                                                class="form-control border-secondary "
                                                id="image"
                                                placeholder="Produto"
                                                @change="imgBase64"
                                            >

                                        </div>

                                        <div class="col-1">

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
                            </div>

                        </div>

                    </div>

                    <div class="col-8">

                        <label for="name" class="form-label">E-mail</label>

                        <input
                            v-model="payload.email"
                            type="email"
                            class="form-control border-secondary"
                            id="name"
                            placeholder="E-mail"
                        >

                        <p v-if="errors.email" class="text-danger">{{ errors.email }}</p>

                    </div>

                    <div class="col-8">

                        <label for="password" class="form-label">Senha</label>

                        <input
                            v-model="payload.password"
                            type="password"
                            class="form-control border-secondary"
                            id="password"
                            placeholder="Senha"
                        >

                        <p v-if="errors.password" class="text-danger">{{ errors.password }}</p>

                    </div>

                    <div class="col-10 my-4 modal-footer">

                        <Link href="/">
                            <button class="btn btn-lg btn-light border m-2">Cancelar</button>
                        </Link>

                        <button type="button" class="btn btn-lg btn-primary m-2" data-bs-toggle="modal" data-bs-target="#formUser">
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
import { defineComponent, ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent ({

    props: {
        errors: Object,
        categories: Object,
        models: Object
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
        Link
    }

})
</script>

<style>

</style>
