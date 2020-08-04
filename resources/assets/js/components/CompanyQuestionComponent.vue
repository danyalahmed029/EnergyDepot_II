<template>
    <div class="container" v-if="show">
        <div class="mt-5"></div>
        <div class="row justify-content-md-center">

            <div class="col-md-5">
                <b-card title="Details"
                        sub-title="Provide Details">
                    <p class="card-text">
                        <span v-if="errors.companyName">
                        <b class="error-txt pt-2" >*{{ errors["companyName"] }}</b>
                        </span>
                        <b-form-input
                                type="text" class="txt-company" v-model="companyName"
                                placeholder="Enter Company Name:"></b-form-input>
                        <span v-if="errors.companyAddress">
                        <b class="error-txt pt-2" >*{{ errors["companyAddress"] }}</b>
                        </span>

                        <b-form-input
                                type="text" class="txt-company mt-2" v-model="companyAddress"
                                placeholder="Enter Company Address:"></b-form-input>

                        <span v-if="errors.customerName">
                        <b class="error-txt pt-2" >*{{ errors["customerName"] }}</b>
                        </span>
                        <b-form-input
                                type="text" class="txt-company mt-2" v-model="customerName"
                                placeholder="Enter Customer Name:"></b-form-input>

                        <span v-if="errors.customerTitle">
                        <b class="error-txt pt-2" >*{{ errors["customerTitle"] }}</b>
                        </span>
                        <b-form-input
                                type="text" class="txt-company mt-2" v-model="customerTitle"
                                placeholder="Enter Customer Title:"></b-form-input>

                    </p>
                    <b-button @click.prevent="validateForm" class="btn btn-custom btn-block"><b>SUBMIT</b></b-button>
                </b-card>
            </div>
        </div>
    </div>

</template>

<script>
    import bCard from 'bootstrap-vue/es/components/card/card';
    import bFormInput from 'bootstrap-vue/es/components/form-input/form-input';
    import bAlert from 'bootstrap-vue/es/components/alert/alert';
    import axios from 'axios';

    const API_URL = window.location.origin;

    export default {
        name: "company-question-component",
        mounted(){
        },
        components:{
            'b-card':bCard,
            'b-form-input':bFormInput,
            'b-alert':bAlert
        },
        data(){
            return{
                companyName:null,
                companyAddress:null,
                customerName:null,
                customerTitle:null,
                show: true,
                errors:[],
                uuid:null

            }
        },
        created(){
            this.uuid=localStorage.getItem('userId');
        },
        methods:{
            validateForm(){

                this.errors=[];
                if(!this.companyName)
                {
                    this.errors["companyName"] = "Company name field is required.";
                }
                if(!this.companyAddress)
                {
                    this.errors["companyAddress"] = "Company address field is required.";
                }
                if(!this.customerName)
                {
                    this.errors["customerName"] = "Customer name field is required.";
                }
                if(!this.customerTitle)
                {
                    this.errors["customerTitle"] = "Customer title field is required.";
                }

                if(Object.keys(this.errors).length==0){
                    this.addCompanyDetails();
                }


            },
            addCompanyDetails(){
                axios.post(API_URL+'/addCompanyDetails', { companyName: this.companyName,companyAddress: this.companyAddress,customerName: this.customerName,
                    customerTitle: this.customerTitle,userId: this.uuid})
                    .then(request => this.addDetailsSuccessfull(request))
                    .catch(error => this.addDetailsFailed(error))
            },
            addDetailsSuccessfull(req){
                this.error = false;
                if(req.data["has_error"] === false) {
                    this.$router.push({name:'downloadPdf', params:{url:req.data.data.url}});
                }
                else{
                    this.errors.push(req.data.message);
                }
            },
            addDetailsFailed(err){
                this.errors.push(err.response.data.message);
            }
        }
    }
</script>

<style scoped>
    .txt-company{
        padding: 15px;
    }

    .error-txt{
        float: left;
        font-size: small;
        color: red;
    }
</style>