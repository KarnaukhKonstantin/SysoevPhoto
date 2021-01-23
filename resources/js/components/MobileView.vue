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
                                <li>Main</li>
                            </a>
                            <a href="#" class="d-block" data-dismiss="modal" @click="moveToScroll('mobile-portfolio')">
                                <li>Portfolio</li>
                            </a>
                            <a href="#" class="d-block" data-dismiss="modal" @click="moveToScroll('mobile-contacts')">
                                <li>Contacts</li>
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
                    STANISLAV<br>SYSOEV
                </h1>
                <p>photographer</p>
            </div>
            <div class="col-sm-12 mb-5">
                <h6>family /</h6>
                <h6>loveStory /</h6>
                <h6>wedding /</h6>
                <h6>personal</h6>
            </div>
            <div class="col-sm-12 mt-5">
                <h6 class="title_mobile js-letter text-center" style="transform: translateX(0%) translateZ(0px);">
                    The best moments are the happy moments <br><br> save it
                </h6>
            </div>
        </div>
        <div class="row mobile-portfolio" id="mobile-portfolio">
            <div class="col-sm-12 pt-5">
                <h1 class="title_mobile js-letter" style="transform: translateX(0%) translateZ(0px);">
                    Moments
                </h1>
            </div>
            <div class="row py-3 mx-0 mobile-gallery" v-if="photos.length > 0" @scroll="listScroll">
                <div class="col-md-3 d-block w-100 mx-auto my-2 text-center" v-for="photo in photos">
                    <img :src="photo.link" class="img-fluid" style="height: 250px; object-fit: contain">
                </div>
            </div>
        </div>
        <div class="row mobile-contacts" id="mobile-contacts">
            <div class="col-sm-12 pt-5">
                <h1 class="title_mobile js-letter" style="transform: translateX(0%) translateZ(0px);">
                    Price & Contacts
                </h1>
                <p>Actual basic price / 2021</p>
            </div>
            <div class="col-sm-12 px-5 price-block services">
                <div class="row text-grey">
                    <div class="col-6 mobile-wedding-price text-right">
                        <h3>Wedding</h3>
                        <h4>300$</h4>
                    </div>
                    <div class="col-6 mobile-family-price text-left">
                        <h3>Family</h3>
                        <h4>100$</h4>
                    </div>
                </div>
                <div class="row text-grey">
                    <div class="col-6 mobile-story-price text-right">
                        <h3>Story</h3>
                        <h4>150$</h4>
                    </div>
                    <div class="col-6 mobile-studio-price text-left">
                        <h3>Studio</h3>
                        <h4>200$</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-5 text-center">
                <a href="tel:+380661906833" class="px-1">+380661906833</a>
                <a href="tel:+380965087310" class="px-1">+380965087310</a>
            </div>
            <div class="col-sm-12 text-center">
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
