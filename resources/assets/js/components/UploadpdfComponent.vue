<template>
    <div class="container" v-if="show">
        <div class="margin-top-20"></div>
        <div class="row justify-content-md-center ">

            <div class="col-md-5">
                <b-card title="Upload PDF"
                        sub-title="Drag and Drop your signed pdf">
                    <div class="card-text">

                        <div class="dashed">

                        <vue-dropzone id="drop1"
                                      :options="dropOptions"
                                      @vdropzone-success="success"
                                      :include-styling="true">

                        </vue-dropzone>
                        </div>

                    </div>
                    <router-link :to="{name:'dashboard'}"  tag="button"  class="btn btn-custom btn-block mt-4"><b>UPLOAD YOUR PDF</b></router-link>

                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import bCard from 'bootstrap-vue/es/components/card/card';
    import vueDropzone from  'vue2-dropzone';
    import * as UserConstants  from '../UserConstant';

    export default {
        name: "uploadpdf-component",
        mounted(){
        },
        components:{
            'b-card': bCard,
            'vue-dropzone':vueDropzone,
        },
        data(){
            return{
                show: true,
                uuid:null,
                dropOptions: {
                    url: window.location.origin+"/uploadPdf",
                    params:{
                        uuid:localStorage.getItem('userId')
                    },
                    maxFilesize: 5, // MB
                    maxFiles: 1,
                    thumbnailWidth: 100, // px
                    thumbnailHeight: 100,
                    addRemoveLinks: true,
                    acceptedFiles: '.pdf',
                    dictDefaultMessage:'<i class="fa fa-cloud-upload-alt fa-8x"></i>',
                },
                //drop zone upload file response
                success(file, response){
                    localStorage.setItem('type',UserConstants.TYPE_PENDING_APPROVAL);
                }
            }
        },
        created(){
            this.uuid=this.$route.params.uuid;
        },
        methods:{

        }
    }
</script>

<style scoped>
    .dashed{
        border-style: dashed;
        padding:10px;
        border-color:#c3dcec;
        background-color:#e1edf5;
    }
</style>