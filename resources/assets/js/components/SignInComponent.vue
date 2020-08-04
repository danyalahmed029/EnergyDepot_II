<template>
    <div class="container" v-if="show">
        <div class="margin-top-20"></div>
        <div class="row justify-content-md-center ">

            <div class="col-md-5">
                <b-card title="Sign In"
                        sub-title="Get Access to Premium Database">
                    <p class="card-text">
                        <span v-if="errors.length">
                        <b-alert show  variant="danger" >{{ errors[0] }}</b-alert>
                        </span>
                        <b-form-input
                                      type="email" class="txt-email" id="email" v-model="email"
                                      v-bind:class="{'has-error':alert_danger}"
                                      placeholder="Enter your email address:"></b-form-input>

                    </p>
                    <b-button @click.prevent="requestPin"  class="btn btn-custom btn-block"><b>SIGN IN
                        <spinner class="spinner-load" v-if="loading"
                                 :speed="1" :size="50">
                        </spinner>
                    </b></b-button>

                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import bCard from 'bootstrap-vue/es/components/card/card';
    import bFormInput from 'bootstrap-vue/es/components/form-input/form-input';
    import bAlert from 'bootstrap-vue/es/components/alert/alert';
    import bSpinner from 'vue-simple-spinner';

    import axios from 'axios';
    const API_URL = window.location.origin;


    export default {
        name: 'Login',
        baseURL: API_URL,
        mounted() {
        },
        components: {
            'b-card': bCard,
            'b-form-input': bFormInput,
            'b-alert':bAlert,
            'spinner':bSpinner
        },
        data() {
            return {
                errors:[],
                email: null,
                alert_danger:false,
                show: true,
                isValidate: true,
                loading:false,
            }
        },
        methods:{
            requestPin() {
                this.errors = [];

                if(!this.email) {
                    this.alert_danger=true;
                    this.errors.push("Please enter email address.");
                } else if(!this.validEmail(this.email)) {
                    this.alert_danger=true;
                    this.errors.push("Please enter valid email address.");
                }

                if(!this.errors.length){
                    this.performRequest();
                }

            },
            validEmail:function(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
            performRequest() {
                this.loading = true;
                axios.post(API_URL+'/requestPin', { email: this.email })
                    .then(request => this.pinRequestSuccessfull(request))
                    .catch(error => this.pinRequestFailed(error))
            },
            pinRequestSuccessfull (req) {
                localStorage.setItem("email",req.data.data.email);
                this.error = false;
                this.loading = false;
                this.$router.replace(this.$route.query.redirect || '/verifyPin')
            },
            pinRequestFailed (err) {
                this.loading = false;
                this.errors.push(err.response.statusText);
                localStorage.removeItem("email");
                localStorage.removeItem("apiToken");
            }
        },
    }
</script>
<style scoped>
    .txt-email{
        padding: 15px;
    }

    .has-error{
        border:1px solid red;
    }

    .spinner-load{
        z-index: 999;
        position: absolute;
        top: 45%;
        left: 45%;
    }

</style>
