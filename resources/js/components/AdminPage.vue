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
                <router-view></router-view>
            </div>
        </div>
    </section>
</template>
<script>

export default {
    data () {
        return {
            //
        }
    },
    methods: {
        removeItems() {

        },
        declineRemoving() {

        }
    },
    created() {
        //
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
