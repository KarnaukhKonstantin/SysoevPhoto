<template>
    <div class="row justify-content-between align-items-center px-3 mx-3">
        <img src="assets/images/sys2.png" height="40px">
        <transition name="fade">
            <div class="row menu t" v-if="showMenu">
                <span class="mx-1">Портфолио</span>
                <span class="mx-1">Цены</span>
                <span class="mx-1">Контакты</span>
            </div>
        </transition>
        <button class="btn btn-outline-light btn-menu" @click="showMenu = !showMenu">
            <i class="fa fa-th"></i>
        </button>
    </div>
</template>
<script>
export default {
    data () {
        return {
            showMenu: false
        }
    }
}
</script>
<style type="text/css">
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
    opacity: 0;
}
</style>
