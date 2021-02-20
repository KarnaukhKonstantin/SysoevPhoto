<template>
    <div class="container-fluid">
        <div class="row mobile-sidebar">
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-outline-light mt-3 menu-actions-button" @click="openMobMenu()">
                    <i class="fa fa-th-large"></i>
                </button>
                <div class="row mobile-router modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="mob-router">
                    <div class="modal-dialog modal-dialog modal-xl" role="document">
                        <button type="button" class="btn btn-outline-secondary mt-4" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </button>
                        <div class="modal-content mobile-menu">
                            <a href="#" class="d-block" data-dismiss="modal" @click="moveToScroll('mobile-main-page')">
                                <li>Головна</li>
                            </a>
                            <a href="#" class="d-block" data-dismiss="modal" @click="moveToScroll('mobile-portfolio')">
                                <li>Портфоліо</li>
                            </a>
                            <a href="#" class="d-block" data-dismiss="modal" @click="moveToScroll('mobile-contacts')">
                                <li>Ціни та Контакти</li>
                            </a>
                            <div class="row justify-content-center align-items-end mt-30vh">
                                <img src="assets/images/sysoev-logo.png" class="img-thumbnail" width="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mobile-main-page" id="mobile-main-page">
            <div class="col-sm-12 mt-5">
                <h1 class="title_mobile js-letter" style="transform: translateX(0%) translateZ(0px);">
                    СТАНІСЛАВ<br>СИСОЄВ
                </h1>
                <p>фотограф</p>
            </div>
            <div class="col-sm-12 mb-5">
                <div class="row justify-content-around px-0">
                    <div class="col-xs-8">
                        <a href="https://www.instagram.com/sysoevphoto/" target="_blank">
                            <img src="/assets/images/stas1.png" class="img-preview">
                        </a>
                    </div>
                    <div class="col-xs-4 text-right mobile-info">
                        <h6>сімейна /</h6>
                        <h6>loveStory /</h6>
                        <h6>весілля /</h6>
                        <h6>індивідуальна</h6>
                        <h6 class="mt-200"><a href="tel:+380661906833">+380661906833</a></h6>
                        <h6><a href="tel:+380965087310">+380965087310</a></h6>

                        <div class="row justify-content-end mt-4">
                            <a href="https://www.facebook.com/dchnmkn"><i class="fa fa-facebook mr-2"></i></a>
                            <a href=""><i class="fa fa-youtube mr-2"></i></a>
                            <a href="https://www.instagram.com/sysoevphoto/" target="_blank"><i class="fa fa-instagram mr-2"></i></a>
                            <a href="https://t.me/sysoevphoto"><i class="fa fa-telegram mr-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 my-5">
                <h6 class="title_mobile js-letter text-center" style="transform: translateX(0%) translateZ(0px);">
                    Цінуйте моменти... <br><br> Збережемо їх!
                </h6>
            </div>
        </div>
        <div class="col-sm-12 my-5">
            <h1 class="title_mobile js-letter mb-0">
                Моменти & Спогади
            </h1>
        </div>
        <div class="row mobile-portfolio" id="mobile-portfolio">
            <div class="row py-3 mx-0 mobile-gallery" v-if="photos.length > 0" @scroll="listScroll">
                <div class="col-md-12 d-block w-100 text-center px-1 my-1" v-for="photo in photos">
                    <img :src="photo.link" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row mobile-contacts my-5" id="mobile-contacts">
            <div class="col-sm-12">
                <h1 class="title_mobile js-letter" style="transform: translateX(0%) translateZ(0px);">
                    Ціни та Контакти
                </h1>
                <p>Актуальний базовий прайс / 2021</p>
            </div>
            <div class="col-sm-12 price-block">
                <div class="row justify-content-around">
                    <div class="col-xs-6">
                        <h5 class="mb-1">Стандарт</h5>
                        <h5>6000 грн</h5>
                    </div>
                    <div class="col-xs-6 text-right">
                        <h6>- 6 годин зйомки</h6>
                        <h6>- повна обробка усіх фото</h6>
                        <h6>  (не менше 400)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 15%</h6>

                    </div>
                </div>
                <div class="row justify-content-around mt-3">
                    <div class="col-xs-6">
                        <h5 class="mb-1">Преміум</h5>
                        <h5>8000 грн</h5>
                    </div>
                    <div class="col-xs-6 text-right">
                        <h6>- 8 годин зйомки</h6>
                        <h6>- повна обробка усіх фото</h6>
                        <h6>  (не менше 500)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 25%</h6>
                    </div>
                </div>
                <div class="row justify-content-around mt-3">
                    <div class="col-xs-6">
                        <h5 class="mb-1">Повний день</h5>
                        <h5>10500 грн</h5>
                    </div>
                    <div class="col-xs-6 text-right">
                        <h6>- 12 годин зйомки</h6>
                        <h6>- повна обробка усіх фото</h6>
                        <h6> (не менше 700)</h6>
                        <h6>- термін готовності 1 - 2 місяці</h6>
                        <h6>- ретуш великих портретів</h6>
                        <h6>- знижка на loveStory 50%</h6>
                    </div>
                </div>
                <div class="row justify-content-around mt-3">
                    <div class="col-xs-6">
                        <h5 class="mb-3">Індивідуальна</h5>
                    </div>
                    <div class="col-xs-6 text-right">
                        <h6>Умови та Прайс</h6>
                        <h6> розглядаються в</h6>
                        <h6> залежності від побажань</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-5 text-center">
                <a href="tel:+380661906833" class="px-1">+380661906833</a>
                <a href="tel:+380965087310" class="px-1">+380965087310</a>
            </div>
            <div class="col-sm-12 text-center my-4">
                <a href="https://www.facebook.com/dchnmkn"><i class="fa fa-2x fa-facebook mr-2"></i></a>
                <a href=""><i class="fa fa-2x fa-youtube mr-2"></i></a>
                <a href="https://www.instagram.com/sysoevphoto/" target="_blank"><i class="fa fa-2x fa-instagram mr-2"></i></a>
                <a href="https://t.me/sysoevphoto"><i class="fa fa-2x fa-telegram mr-2"></i></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            photos: [],
            isLoading: false,
            fullPage: true,
            page: 1,
            offset: 0,
            elem: '',
        }
    },
    mounted() {
        this.elem = document.getElementsByClassName('mobile-gallery');
    },
    methods: {
        openMobMenu() {
            $('#mob-router').modal('show');
        },
        hideMobMenu() {
            $('#mob-router').modal('hide');
        },
        moveToScroll(targetBlock) {
            let block = document.getElementById(targetBlock);
            block.scrollIntoView({block: "start", behavior: "smooth"});
        },
        listScroll() {
            if (this.elem[0].scrollTop + this.elem[0].clientHeight >= this.elem[0].scrollHeight) {
                this.loadMore();
            }
        },
        loadPhotos() {
            axios.get(`/api/all-photos?perPage=10`)
                .then(response => {
                    this.photos = response.data.photos;
                    this.offset += 10;
                })
        },
        loadMore() {
            axios.get(`/api/all-photos?perPage=10&offset=${this.offset}`)
                .then(response => {
                    this.photos = [...this.photos, ...response.data.photos];
                    this.offset += 10;
                })
        },
        onCancel() {
            console.log('User cancelled the loader.')
        }
    },
    created() {
        this.loadPhotos();
    }
}
</script>
