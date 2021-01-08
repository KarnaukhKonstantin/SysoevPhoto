<template>
    <transition appear name="fade" :duration="10000">
        <div class="container-fluid price text-center">
            <div class="row align-items-center justify-content-center d-flex flex-column">
                <h1>Price List</h1>

                <h4>Family: 300$</h4>
                <h4>Love Story: 500$</h4>
                <h4>Wedding: 1000$</h4>
            </div>
        </div>
    </transition>
</template>
<script>
export default {
    data () {
        return {

        }
    },
    methods: {

    }
}
</script>
