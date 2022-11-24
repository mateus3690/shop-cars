<template>
    <div v-if="msg" class="alert alert-success alert-dismissible fade show" role="alert">

        <div>
            <fa-icon icon="circle-check"/>
            {{msg}}
        </div>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</template>

<script>

import { defineComponent } from 'vue'

export default defineComponent({
    props:{
        msg:null
    }
})

</script>

<style>

</style>