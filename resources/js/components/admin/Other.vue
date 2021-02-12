<template>
    <section>
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
                        :class="{'btn-primary': this.photos.length !== this.countOP, 'btn-secondary': this.photos.length === this.countOP}"
                        @click="loadMore()">
                    Load more
                </button>
            </div>
        </section>
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
            countOP: 0,
            offset: 0,
            selectedItems: [],
            forRemove: [],
            removeIndexes: [],
            new: [],
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
            this.weddingPhotos = [];
            this.countWP = 0;
            this.countOP = 0;
            this.offset = 0;
        },
        check() {
            console.log(this.new);
        },
        loadPhotos() {

        },
        loadOtherPhotos() {
            axios.get('/api/other-photos?perPage=10&offset=' + this.offset)
                .then(response => {
                    this.photos = this.photos.concat(response.data.photos);
                    this.countOP = response.data.count;
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
