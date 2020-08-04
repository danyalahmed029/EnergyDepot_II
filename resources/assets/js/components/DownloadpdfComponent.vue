<template>
    <div class="container" v-if="show">
        <div class="margin-top-20"></div>
        <div class="row justify-content-md-center ">

            <div class="col-md-5">
                <b-card title="Download PDF"
                        sub-title="Signature the pdf & upload back">
                    <p class="card-text">
                        <a target="_blank" :href="url"> <i class="fa fa-file-download fa-8x"></i></a>

                    </p>
                    <router-link to="/uploadPdf" tag="button"   class="btn btn-custom btn-block"><b>CLICK TO UPLOAD YOUR PDF</b></router-link>

                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import bCard from 'bootstrap-vue/es/components/card/card';


    export default {
        name: "donloadpdf-component",
        mounted(){
        },
        components:{
            'b-card': bCard,
        },
        data(){
            return{
                show: true,
                url: null,
                uuid:null,
            }
        },
        created() {
            this.url = this.$route.params.url;
            this.uuid=localStorage.getItem('userId');
        },
    }
</script>

<style scoped>

</style>