<template>
    <section class="container-fluid">
        <div class="row d-flex justify-content-end px-5 admin-header align-items-center">
            <admin-header></admin-header>
        </div>
        <div class="row">
            <div class="col-md-2 pr-2">
                <admin-sidebar></admin-sidebar>

                <section class="admin-panel actions mt-3 p-3">
                    <button class="btn btn-sm btn-danger" @click="removeItems()">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button class="btn btn-sm btn-info mx-1" @click="declineRemoving()">
                        <i class="fa fa-times"></i>
                    </button>
                </section>
            </div>
            <div class="col-md-10 px-2">
                <section class="admin-panel">
                    <multiple-file-uploader postURL="/api/upload-photo"
                                            successMessagePath="Uploaded!!"
                                            dropAreaPrimaryMessage="Download Here!"
                                            errorMessagePath=""
                                            fileUploadErrorMessage="ERROR">
                    </multiple-file-uploader>
                </section>
                <section class="admin-panel" style="overflow-y: scroll; overflow-x: hidden">
                    <div class="row align-items-center px-3">
                        <div class="col-md-3 py-5 thumbnail text-center" v-for="(photo, index) in photos" @click="selectItem(photo, index)">
                            <img :src="photo.link" class="img-fluid" :class="{'selected': selectedItems.includes(index)}">
                        </div>
                    </div>
                    <div class="row justify-content-end px-3 mb-5">
                        <button class="btn btn-sm mx-3"
                                :class="{'btn-primary': this.photos.length !== this.countPhotos, 'btn-secondary': this.photos.length === this.countPhotos}"
                                @click="loadMore()">
                            Load more
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </section>
</template>
<script>
import MultipleFileUploader from 'vue-upload';

export default {
    components: {
        MultipleFileUploader
    },
    data () {
        return {
            photos: [],
            countPhotos: 0,
            offset: 0,
            selectedItems: [],
            forRemove: [],
            removeIndexes: [],
            new: []
        }
    },
    mounted() {
        Bus.$on('upload-success', data => {
            this.uploadSuccess();
        });
    },
    methods: {
        resetData() {
            this.photos = [];
            this.countPhotos = 0;
            this.offset = 0;
        },
        check() {
          console.log(this.new);
        },
        loadPhotos() {
            axios.get('/api/all-photos?perPage=10&offset=' + this.offset)
                .then(response => {
                    this.photos = this.photos.concat(response.data.photos);
                    this.countPhotos = response.data.count;
                    this.declineRemoving();
                })
        },
        loadMore() {
            this.offset += 10;
            this.loadPhotos();
        },
        uploadSuccess() {
            this.resetData();
            this.loadPhotos();
        },
        selectItem (photo, index) {
            this.selectedItems.includes(index)
                ? this.selectedItems.splice(this.selectedItems.indexOf(index), 1)
                : this.selectedItems.push(index);

            this.forRemove.push(photo);
            this.removeIndexes.push(index);
        },
        removeItems() {
            if (this.forRemove.length > 0) {
                for (let i = 0; i < this.forRemove.length; i++) {
                    this.photos = this.photos.filter(photo => photo.id !== this.forRemove[i].id);
                }
            }

            axios.post('/api/delete', this.forRemove)
                .then(response => {
                    this.selectedItems = [];
                    this.removeIndexes = [];
                    this.forRemove = [];
                });
        },
        declineRemoving() {
            this.selectedItems = [];
        }
    },
    created() {
        this.loadPhotos();
    }
}
</script>
<style>
.admin-header {
    height: 50px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    margin-bottom: 30px;
}
.admin-sidebar, .admin-panel {
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    padding-left: 0px;
    padding-right: 0px;
}
.admin-sidebar {
    height: 80vh;
}
.m-dropzone__msg-title {
    border: 1px solid #000000;
    height: 10vh;
    display: block;
    width: 100%;
    padding-top: 2em;
}
.uploadBox{
    background-color: #ffffff !important;
}
.dropArea {
    border: 1px solid #484848 !important;
}
.selected {
    opacity: 0.5;
}
.thumbnail {
    cursor: pointer;
}
.actions {
    position: fixed;
    left: 40px;
    bottom: 40px;
    z-index: 100;
}
</style>
