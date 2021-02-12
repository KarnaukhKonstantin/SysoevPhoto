<template>
    <section>
        <section class="admin-panel">
            <multiple-file-uploader :postURL="'/api/upload-photo' + '?categoryId=' + categoryId + '&sessionId=' + sessionId"
                                    successMessagePath="Uploaded!!"
                                    dropAreaPrimaryMessage="Download Here!"
                                    errorMessagePath=""
                                    fileUploadErrorMessage="ERROR">
            </multiple-file-uploader>
        </section>
        <section class="admin-panel mb-3 p-3">
            <div class="row justify-content-between align-items-center px-3">
                <div class="col-md-4">
                    <div class="form-group row mt-3">
                        <label class="col-md-12">Exists PhotoSessions</label>
                        <div class="col-md-12" id="photo_sessions">
                            <v-select class="white selected-tag br-5"
                                      :options="photoSessions"
                                      :get-option-label="getLabel"
                                      placeholder="Choose Session"
                                      label="name"
                                      @input="setSelected"></v-select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-2">
                    <button class="btn btn-success" @click="addAlbum()">+ Album</button>
                </div>
            </div>
        </section>
        <section class="admin-panel" style="overflow-y: scroll; overflow-x: hidden">
            <div class="row align-items-center px-3">
                <div class="col-md-3 py-5 thumbnail text-center" v-for="(wPhoto, index) in weddingPhotos" @click="selectItem(wPhoto, index)">
                    <img :src="wPhoto.link" class="img-fluid" :class="{'selected': selectedItems.includes(index)}">
                </div>
            </div>
            <div class="row justify-content-end px-3 mb-5">
                <button class="btn btn-sm mx-3"
                        :class="{'btn-primary': this.weddingPhotos.length !== this.countWP, 'btn-secondary': this.weddingPhotos.length === this.countWP}"
                        @click="loadMore()">
                    Load more
                </button>
            </div>
        </section>
        <section>
            <div id="newAlbum" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body mt-0 pt-1">
                            <div class="container-fluid px-0">
                                <div class="row align-items-center">
                                    <div class="col-md-8 offset-md-2 text-center">
                                        <h1 class="text-right">Add new PhotoSession</h1>
                                        <div class="form-group text-left">
                                            <label>Title</label>
                                            <input type="text"
                                                   class="form-control"
                                                   v-model="form.title"
                                                   id="session-title">
                                        </div>
                                        <div class="row justify-content-end px-3">
                                            <button class="btn btn-success" @click="saveSession()">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>
<script>
import MultipleFileUploader from 'vue-upload';
import vSelect from 'vue-select'

export default {
    components: {
        MultipleFileUploader,
        vSelect,
    },
    data () {
        return {
            photoSessions: [],
            weddingPhotos: [],
            countWP: 0,
            offset: 0,
            selectedItems: [],
            forRemove: [],
            removeIndexes: [],
            new: [],
            categoryId: 1,
            sessionTitle: '',
            sessionId: null,
            form: {
                title: ''
            }
        }
    },
    mounted() {
        Bus.$on('upload-success', data => {
            this.uploadSuccess();
        });
    },
    methods: {
        addAlbum() {
            $('#newAlbum').modal('show');
        },
        saveSession() {
            axios.post('/api/session', this.form)
                .then(response => {
                    this.photoSessions.push(response.data);
                    this.cleanForm();
                    $('#newAlbum').modal('hide');
                });
        },
        getLabel(option) {
            return option.name
        },
        setSelected(value) {
            this.sessionId = value.id;
        },
        cleanForm() {
            this.form.title = ''
        },
        resetData() {
            this.weddingPhotos = [];
            this.countWP = 0;
            this.offset = 0;
        },
        check() {
            console.log(this.new);
        },
        loadPhotos() {

        },
        loadPhotoSessions() {
            axios.get('/api/photo-sessions')
                .then(response => {
                    this.photoSessions = response.data;
                })
        },
        loadWeddingPhotos() {
            axios.get('/api/wedding-photos?perPage=10&offset=' + this.offset)
                .then(response => {
                    this.weddingPhotos = this.weddingPhotos.concat(response.data.weddingPhotos);
                    this.countWP = response.data.count;
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
                    this.weddingPhotos = this.weddingPhotos.filter(photo => photo.id !== this.forRemove[i].id);
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
        this.loadPhotoSessions();
    }
}
</script>
