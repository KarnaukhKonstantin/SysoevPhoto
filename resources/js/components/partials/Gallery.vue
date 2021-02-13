<template>
    <transition appear name="fade" :duration="10000">
        <div class="container-fluid">

            <div class="row py-3 mx-0 gallery" v-if="photos.length > 0" @scroll="listScroll">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 d-block w-100 mx-auto my-2 text-center" v-for="photo in photos">
                            <img :src="photo.link" class="img-fluid" style="height: 250px; object-fit: contain"
                                 @click="showFullSize(photo.link)">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 category d-block w-100 mx-auto my-3 text-center"
                             v-for="pack in categoryPhotos"
                             @click="showCategory(pack)">
                            <img :src="pack.link" class="img-fluid" style="object-fit: contain">
                            <div class="category-name">
                                {{ pack.session.name }}
                                <i class="fa fa-clone mx-2"></i>
                            </div>
                            <div class="overlay">
                                <div class="text">
                                    {{ pack.session.name }}
                                    <p class="mt-3">відкрий</p>
                                </div>
                            </div>
                        </div>
                    </div>
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

            <div id="category-gallery" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body mt-0">
                            <div class="container-fluid px-1">
                                <masonry :cols="3" :gutter="30">
                                    <div v-for="(session, index) in fullCategorySession" :key="index" class="bricks">
                                        <img :src="session.link" class="img-fluid">
                                    </div>
                                </masonry>
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
            categoryPhotos: [],
            fullCategorySession: [],
            isLoading: false,
            fullPage: true,
            page: 1,
            offset: 0,
            elem: ''
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
        showCategory(photoSession) {
            this.loadFullPhotoSession(photoSession.photo_session_id);
        },
        loadPhotos() {
            axios.get(`/api/all-photos?perPage=16`)
                .then(response => {
                    this.photos = response.data.photos;
                    this.categoryPhotos = [...this.categoryPhotos, ...response.data.categoryPhotos];
                    this.offset += 16;
                })
        },
        loadMore() {
            axios.get(`/api/all-photos?perPage=16&offset=${this.offset}`)
                .then(response => {
                    this.photos = [...this.photos, ...response.data.photos];
                    this.categoryPhotos = [...this.categoryPhotos, ...response.data.categoryPhotos];
                    this.offset += 16;
                })
        },
        loadFullPhotoSession(photoSessionId) {
            axios.get(`/api/full-session/${photoSessionId}`)
                .then(response => {
                    this.fullCategorySession = response.data;
                    $('#category-gallery').modal('show');
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
.category .category-name {
    position: absolute;
    width: 100%;
    bottom: 0;
    height: 20px;
    background-color: rgba(0,0,0,0.5);
}
.category .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
    background-color: rgba(0,0,0,0.5);
}
.category:hover .overlay {
    opacity: 1;
}
.category:hover  .category-name {
    display: none;
    transition: .5s ease;
}
.category .text {
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}
.category .text p {
    font-size: 12px;
}
#category-gallery .modal-content {
    background-color: rgba(0,0,0,0.9);
}
</style>
