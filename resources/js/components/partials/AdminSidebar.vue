<template>
    <section class="admin-sidebar">
        <div class="row d-flex flex-column align-items-start pt-5 px-5">
            <p class="text-black">Gallery</p>
            <router-link class="d-block" :to="{ name: 'wedding'}" tag="a">
                <li class="line-other">Wedding</li>
            </router-link>
            <router-link class="d-block" :to="{ name: 'other'}" tag="a">
                <li class="line-other">Other</li>
            </router-link>
        </div>
    </section>
</template>
<script>
export default {
    components: {
        //
    },
    data() {
        return {
            name: ''
        }
    },
    methods: {
        //
    },
    created() {
        //
    }
}
</script>
