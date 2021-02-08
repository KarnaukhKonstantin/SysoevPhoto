<template>
    <transition appear name="fade" :duration="10000">
        <div class="container-fluid">

            <div class="row py-3 mx-0 gallery" v-if="photos.length > 0" @scroll="listScroll">
                <masonry :cols="3" :gutter="30">
                    <div v-for="(photo, index) in photos" :key="index" class="bricks">
                        <img :src="photo.link" class="img-fluid" @click="showFullSize(photo.link)">
                    </div>
                </masonry>
            </div>

            <div id="other-gallery" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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

export default {
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
        this.elem = document.getElementsByClassName('other-gallery');
    },
    methods: {
        listScroll() {
            if (this.elem[0].scrollTop + this.elem[0].clientHeight >= this.elem[0].scrollHeight) {
                this.loadMore();
            }
        },
        showFullSize(img) {
            this.fullImageSource = img;
            $('#other-gallery').modal('show');
        },
        loadPhotos() {
            axios.get(`/api/other-photos?perPage=16`)
                .then(response => {
                    this.photos = response.data.photos;
                    this.offset += 16;
                })
        },
        loadMore() {
            axios.get(`/api/other-photos?perPage=16&offset=${this.offset}`)
                .then(response => {
                    this.photos = [...this.photos, ...response.data.photos];
                    this.offset += 16;
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
