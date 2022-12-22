<template>

    <!-- Login -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login In</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form class="row g-3 m-2">

                        <div class="col-12 container-fluid row">

                            <div class="col-9">

                                <label for="name" class="form-label">E-mail</label>

                                <input
                                    v-model="payload.email"
                                    type="email"
                                    class="form-control border-secondary"
                                    id="name"
                                    placeholder="E-mail"
                                >

                                <!-- <p v-if="errors.email" class="text-danger">{{ errors.email }}</p> -->

                            </div>

                            <div class="col-9">

                                <label for="password" class="form-label">Senha</label>

                                <input
                                    v-model="payload.password"
                                    type="password"
                                    class="form-control border-secondary"
                                    id="password"
                                    placeholder="Senha"
                                >

                                <!-- <p v-if="errors.password" class="text-danger">{{ errors.password }}</p> -->

                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entrar</button>
                </div>

            </div>

        </div>

    </div>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light ">

      <div class="container-fluid">

        <button class="navbar-toggler bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <Link href="/" class="navbar-brand text-light text-hover">
            <img src="../../img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
            Concessionária - MTS
          </Link>

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">

              <Link href="/" class=" text-light nav-link text-hover">
                 Inicio
              </Link>
            </li>
            <li class="nav-item dropdawn">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">

                  <li class="nav-item dropdown dropleft">

                    <a class="nav-link dropdown-toggle text-white text-hover"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Produtos
                    </a>

                    <ul class="dropdown-menu">

                      <li >
                        <Link href="/product-view" class="text-dark dropdown-item">Registrados</Link>
                      </li>

                      <li >
                        <Link href="/product-register" class="dropdown-item">Registrar Produto</Link>
                      </li>

                    </ul>

                  </li>

                  </ul>

                </div>

            </li>

            <li class="nav-item">
              <Link href="/" class="text-light nav-link text-hover">Sobre</Link>
            </li>

          </ul>

        </div>

        <div class="d-flex align-items-center">


          <Link class="border-bottom text-hover nav-link text-white me-4">
            <img src="../../img/logo.png" alt="" width="30" height="30" class="rounded-circle">
            {{ 'Visitante' }}
          </Link>

          <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">

            <ul class="navbar-nav me-5 mb-2 mb-lg-0">

              <li class="nav-item dropdown dropleft  me-5">

                <a class="nav-link dropdown-toggle text-white border rounded"  role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>

                <ul class="dropdown-menu">

                  <li data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item">
                        <img src="../../img/login.png" width="20" height="20"/>
                        Login
                  </li>

                  <li  >
                    <Link href="/user-register" class="dropdown-item">
                        <img src="../../img/registreLogin.png" width="20" height="20"/>
                        Cadastra-se
                    </Link>
                  </li>

                  <li  class="">
                    <a class="dropdown-item text-danger" @click="exitt()">
                        <img src="../../img/logout.png" width="20" height="20"/>
                        Sair
                    </a>
                  </li>

                </ul>

              </li>

            </ul>

          </div>

        </div>

      </div>

    </nav>

</template>

<script>

import { Link } from '@inertiajs/inertia-vue3'
import { defineComponent, ref } from 'vue'

export default defineComponent({
    name:'NavMenu',

    props: {
        errors: Object,
    },

    setup () {

        const payload = ref({
            email:null,
            password:null
        })

        return {
            payload
        }

    },
    components: {
        Link,
    }
})
</script>
<style>
    .text-hover:hover{
        opacity: 0.4;
        font-size: 1.30rem;
    }
</style>
