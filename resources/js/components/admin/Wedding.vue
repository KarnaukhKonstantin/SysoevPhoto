<template>
    <section>
        <section class="admin-panel">
            <div class="row">
                <div class="col-md-8">
                    <multiple-file-uploader :postURL="'/api/upload-photo' + '?categoryId=' + categoryId + '&sessionId=' + sessionId"
                                            successMessagePath="Uploaded!!"
                                            dropAreaPrimaryMessage="Download Here!"
                                            errorMessagePath=""
                                            fileUploadErrorMessage="ERROR">
                    </multiple-file-uploader>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-3">
                        <div class="row justify-content-between align-items-end px-4">
                            <label>Exists PhotoSessions</label>
                            <button class="btn btn-success" @click="addAlbum()">+ Album</button>
                        </div>
                        <div class="row justify-content-between px-2 mt-3">
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
                </div>
            </div>
        </section>
        <section class="admin-panel mt-3" style="overflow-y: scroll; overflow-x: hidden">
           <div class="row">
               <div class="col-md-6">
                    <div class="row align-items-center px-3">
                        <div class="col-md-6 py-1 thumbnail text-center" v-for="wSession in weddingSessions" @click="openSession(wSession)">
                            <div class="card" v-if="wSession.photos.length > 0">
                                <img :src="wSession.photos[0].link" class="img-fluid">
                                <p class="py-1">{{wSession.name}}</p>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="col-md-6">
                   <div class="row align-items-center px-3">
                       <div class="col-md-6 py-1 thumbnail text-center" v-for="(wPhoto, index) in weddingPhotos" @click="selectItem(wPhoto, index)">
                           <img :src="wPhoto.link" class="img-fluid" :class="{'selected': selectedItems.includes(index)}">
                       </div>
                   </div>
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
        <section>
            <div id="showPhotoSession" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body mt-0 pt-1">
                            <div class="container-fluid px-0">
                                <div class="row align-items-center">
                                    <div class="col-md-3 py-1 thumbnail text-center" v-for="(photo, index) in currentPhotoSession">
                                        <div class="card">
                                            <img :src="photo.link" class="img-fluid">
                                            <div class="row justify-content-end p-3">
                                                <button class="btn btn-sm btn-info mx-1" @click="useAsMainPhoto(photo, index)">
                                                    <i class="fa fa-picture-o"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger" @click="toRemove(photo)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <button class="btn btn-sm btn-info mx-1" @click="declineRemove(photo)">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
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
            weddingSessions: [],
            weddingPhotos: [],
            currentPhotoSession: [],
            countWP: 0,
            offset: 0,
            selectedItems: [],
            forRemove: [],
            removeIndexes: [],
            new: [],
            categoryId: 1,
            sessionTitle: '',
            sessionId: '',
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
        openSession(session) {
            axios.get('/api/photo-sessions/' + session.id)
                .then(response => {
                    this.currentPhotoSession = response.data;
                })
            $('#showPhotoSession').modal('show');
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
            this.sessionId = null
        },
        check() {
            console.log(this.new);
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
                    console.log(response.data);
                    this.weddingPhotos = this.weddingPhotos.concat(response.data.weddingSinglePhotos);
                    this.countWP = response.data.count;
                    this.declineRemoving();
                })
        },
        loadWeddingSessions() {
            axios.get('/api/wedding-sessions-list?perPage=10&offset=' + this.offset)
                .then(response => {
                    this.weddingSessions = this.weddingSessions.concat(response.data.photoSessions);
                })
        },
        loadMore() {
            this.offset += 10;
            this.loadWeddingPhotos();
            this.loadWeddingSessions();
        },
        uploadSuccess() {
            this.resetData();
            this.loadWeddingPhotos();
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
        },
        toRemove(item) {
            //
        },
        declineRemove(item) {
            //
        },
        useAsMainPhoto(item, index) {
            axios.patch('/api/photo-sessions/' + item.photo_session_id + '/photo/' + item.id + '/set-main')
                .then(response => {
                    this.currentPhotoSession[index] = response.data;
                });
        }
    },
    created() {
        this.loadPhotoSessions();
        this.loadWeddingPhotos();
        this.loadWeddingSessions();
    }
}
</script>
