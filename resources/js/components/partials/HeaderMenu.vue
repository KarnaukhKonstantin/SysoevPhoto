<template>
            <div class="row menu t" :class="{'d-none': !showMenu}" v-scroll-reveal.reset>
                <span class="mx-1">first</span>
                <span class="mx-1">second</span>
                <span class="mx-1">third</span>
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
