<template>
    <div class="container">
        <div class="margin-top-20"></div>
        <div class="row justify-content-md-center ">

            <div class="col-md-5">
                <b-card  title="Please Enter Pin"
                        sub-title="Check your e-mail & 6-digit pin code">

                        <span  v-if="errors.length">
                            <b-alert class="row" show  variant="danger" >{{ errors[0] }}</b-alert>
                            </span>

                    <div class="row card-text">

                        <b-form-input v-model="pin1" maxlength="1"
                                      @keyup.native="$event.target.nextElementSibling.focus()"
                                      type="text" class="col mr-1 txt-code"></b-form-input>
                        <b-form-input v-model="pin2" maxlength="1"
                                      @keyup.native="$event.target.nextElementSibling.focus()"
                                      type="text" class="col mr-1 txt-code"
                                      ></b-form-input>
                        <b-form-input v-model="pin3" maxlength="1"
                                      @keyup.native="$event.target.nextElementSibling.focus()"
                                      type="text" class="col mr-1 txt-code"
                                      ></b-form-input>
                        <b-form-input v-model="pin4" maxlength="1"
                                      @keyup.native="$event.target.nextElementSibling.focus()"
                                      type="text" class="col mr-1 txt-code"
                                      ></b-form-input>
                        <b-form-input v-model="pin5" maxlength="1"
                                      @keyup.native="$event.target.nextElementSibling.focus()"
                                      type="text" class="col mr-1 txt-code"
                                      ></b-form-input>
                        <b-form-input v-model="pin6" maxlength="1"
                                      type="text" class="col mr-1 txt-code"
                                        ></b-form-input>

                    </div>
                    <b-row>

                        <b-button @click.prevent="checkForm"  type="button" class="btn btn-custom btn-block mt-2"><b>Submit</b></b-button>
                        <b-button @click="resendPin" :disabled="bDisable" class="btn btn-custom btn-block mt-2">Resend code</b-button>
                        <vue-countdown class="timer-color" @time-expire="handleTimeExpire" :seconds="120" :message="message" :start="start">
                        </vue-countdown>
                    </b-row>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import bCard from 'bootstrap-vue/es/components/card/card';
    import bFormInput from 'bootstrap-vue/es/components/form-input/form-input';
    import VueCountdown from '@dmaksimovic/vue-countdown';
    import bAlert from 'bootstrap-vue/es/components/alert/alert';


    import axios from 'axios';
    import * as UserConstants  from '../UserConstant';

    const API_URL = window.location.origin;

    export default {
        name: 'Verification',
        baseURL: API_URL,
        mounted() {
        },
        components: {
            'b-card': bCard,
            'b-form-input': bFormInput,
            'vue-countdown': VueCountdown,
            'b-alert':bAlert,

        },data () {
            return {
                pin1: '',
                pin2: '',
                pin3: '',
                pin4: '',
                pin5: '',
                pin6: '',
                data:localStorage.getItem("email"),
                start: true,
                bDisable: true,
                errors:[],
                message: 'If you have not received pin yet please click on resend button'
            }
        },
        methods: {
            handleTimeExpire () {
                this.start=false;
                this.bDisable= false;
            },
            checkForm() {
                axios.post(API_URL+'/verifyPin', { email: this.data,password:this.pin1+""+this.pin2+""+this.pin3+""+this.pin4+""+this.pin5+""+this.pin6 })
                    .then(request => this.verificationSuccessful(request))
                    .catch(error => this.verificationFailed(error))

            },
            verificationSuccessful (req) {
                if(req.data["has_error"] === false) {
                    this.errors = [];
                    localStorage.setItem("apiToken",req.data.data.api_token);
                    localStorage.setItem("type",req.data.data.user.role_type.role_type);
                    if(req.data.data.user.role_type.role_type===UserConstants.TYPE_NEW_USER) {
                        localStorage.setItem('userId',req.data.data.user.uuid);
                        this.$router.replace(this.$route.query.redirect || '/companyQuestion');
                    }
                    else if(req.data.data.user.role_type.role_type===UserConstants.TYPE_PENDING_APPROVAL)
                    {
                        this.$router.replace(this.$route.query.redirect || '/dashboard');
                    }
                    else if(req.data.data.user.role_type.role_type===UserConstants.TYPE_ADMIN)
                    {
                        this.$router.replace(this.$route.query.redirect || '/adminOrders');
                    }
                    else if(req.data.data.user.role_type.role_type===UserConstants.TYPE_ACTIVE_USER)
                    {
                        this.$router.replace(this.$route.query.redirect || '/userCart');
                    }


                }
                else{
                    this.errors.push(req.data.message);
                }
            },
            verificationFailed(err){
                this.errors.push(err.response.data.message);
            },
            resendPin()
            {
                axios.post(API_URL+'/requestPin', { email: this.data})
                    .then(request => this.requestPinSuccessful(request))
                    .catch(error => this.requestPinFailed(error))
            },
            requestPinSuccessful (req) {
                this.bDisable=true;
                this.start=true;
                this.errors = [];
            },
            requestPinFailed(err){
                this.errors.push(err.response.statusText);
            }
        }
    }
</script>
<style scoped>
    .txt-code{
        padding: 15px;
        font-weight: bold;
        text-align: center;
        font-size: 20px;
    }
    .timer-color{
        color: red;
        font-weight: bolder;
        float: right;
    }
</style>
