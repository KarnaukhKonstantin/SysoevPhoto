<template>
    <transition appear name="fade" :duration="10000">
        <div class="container-fluid">
<!--            <loading :active.sync="isLoading"-->
<!--                     :can-cancel="true"-->
<!--                     :on-cancel="onCancel"-->
<!--                     :loader="'dots'"-->
<!--                     :is-full-page="fullPage"></loading>-->

            <div class="row py-3 align-items-center mx-0 gallery" v-if="photos.length > 0" @scroll="listScroll">
                <div class="col-md-3 d-block w-100 mx-auto my-2 text-center" v-for="photo in photos">
                    <img :src="photo.link" class="img-fluid" style="height: 250px; object-fit: contain" @click="showFullSize(photo.link)">
                </div>
            </div>

            <div id="gallery" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body mt-0 pt-1">
                            <div class="container-fluid px-0">
                                <div class="row align-items-center">
                                    <div class="col-md-12 text-center">
                                        <img :src="fullImageSource" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>

import Loading from 'vue-loading-overlay';

export default {
    components: {
        Loading
    },
    data () {
        return {
            fullImageSource: '',
            photos: [],
            isLoading: false,
            fullPage: true,
            page: 1,
            offset: 0,
            elem: '',
        }
    },
    mounted() {
        this.elem = document.getElementsByClassName('gallery');
    },
    methods: {
        listScroll() {
            if (this.elem[0].scrollTop + this.elem[0].clientHeight >= this.elem[0].scrollHeight) {
                this.loadMore();
            }
        },
        showFullSize(img) {
            this.fullImageSource = img;
            $('#gallery').modal('show');
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
<style>
/* width */
::-webkit-scrollbar {
    width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 20px;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #7a3f3e;
    border-radius: 20px;
}
</style>
