<template>
    <transition appear name="fade" :duration="20000">
        <div class="row pt-5 site">
            <div class="col-md-2">
                <div class="row px-3 title title--top">
                    <h1 class="title__text js-letter" style="transform: translateX(0%) translateZ(0px);">
                        ДЛЯ<br>ЗВ'ЯЗКУ
                    </h1>
                    <div class="business-title pt-3">
                        <a href="https://t.me/sysoevphoto" target="_blank"><h6><i class="fa fa-telegram"></i> https://t.me/sysoevphoto</h6></a>
                        <a href="https://www.instagram.com/sysoevphoto/" target="_blank"><h6><i class="fa fa-instagram"></i> @sysoevphoto</h6></a>
                        <a href="tel:+380661906833" target="_blank"><h6><i class="fa fa-volume-control-phone"></i> +380661906833 (Viber)</h6></a>
                        <a href="tel:+380965087310" target="_blank"><h6><i class="fa fa-phone"></i> +380965087310</h6></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-6 main-block px-0">
                <div class="row d-flex flex-column pt-50">
                    <img src="assets/images/pair.jpg" class="img-fluid" width="100%">
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
export default {
    data () {
        return {
            pageNumber: 4,
        }
    },
    mounted() {
        //
    }
}
</script>
