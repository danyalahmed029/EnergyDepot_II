<!--suppress ALL -->
<template>
    <div>
        <navigation></navigation>

        <div class="container">
            <div class="header mt-5">
                <div class="header-title">
                    <h3><span>Pending Order</span>
                        <span class="text-right">
                            <button @click="placeOrder" :disabled="disabled" class="btn-danger btn btn-lg pl-4 pr-4">
                                Place Your Order</button>
                        </span>
                    </h3>
                </div>
            </div>

            <div class=" mt-5">

                <table ref="table" class="table table-outlined hover cart-table" >
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Email</th>
                        <th>Search Criteria</th>
                        <th>No of records</th>
                        <th>price</th>
                        <th>Add to cart on</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr  v-for="(item,index) in cartItems" :key="index">
                        <td>{{index +1}}.</td>
                        <td>{{item.email}}.</td>
                        <td>{{item.search_criteria}}</td>
                        <td>{{item.num_of_records}}</td>
                        <td class="font-weight-bold">${{item.price}}</td>
                        <td>{{item.order_placed_on}}</td>
                        <th ><img width="25px" @click="deleteEvent(index)" src="https://png.icons8.com/material/50/000000/delete-forever.png"> </th>
                    </tr>

                    </tbody>
                    <tfoot>
                    <tr v-if="cartItems!=null">
                        <td colspan="2" class="text-left">
                            <b-dropdown id="ddown-right"
                                        left
                                        :text="deliveryMethod"
                                        class="actionBtn ml-3"
                                        size="lg"
                                        variant="primary">
                                <b-dropdown-item v-b-modal.modal1 >FTP </b-dropdown-item>
                                <b-dropdown-item v-b-modal.modal2>AWS</b-dropdown-item>
                            </b-dropdown>
                        </td>
                        <td class="font-weight-bold"><span>Total</span></td>
                        <td class="font-weight-bold"> <span>$ {{total}}</span></td>
                        <td colspan="2" class="text-right ">
                             <span class="mr-3">
                                <button @click="placeOrder" class="btn-danger btn btn-lg pl-4 pr-4" :disabled="disabled">
                                    Place Your Order</button>
                        </span>
                        </td>
                    </tr>
                    <tr v-else><td colspan="7">Empty Cart</td></tr>
                    </tfoot>
                </table>

                <div>
                    <!-- Modal Component -->
                    <b-modal id="modal1" ref="myModalRef" title="Delivery Method: FTP" @ok="handleFtpOk">
                        <!--desired url, username, and password-->
                        <form action="">
                            <div class="form-group">
                                <label for="" class="col-form-label">Desired Url:</label>
                                <input type="url" :class="{'has-error':urlDanger}" class="form-control" v-model="FTP.url">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Username:</label>
                                <input type="text" :class="{'has-error':usernameDanger}" class="form-control" v-model="FTP.username">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Password:</label>
                                <input type="password" :class="{'has-error':passwordDanger}" class="form-control" v-model="FTP.password">
                            </div>
                        </form>
                    </b-modal>

                    <b-modal id="modal2" ref="AwsModalRef" title="Delivery Method: Aws" @ok="handleAwsOk">
                        <!--bucket name, access key, and access id.-->
                        <form action="">
                            <div class="form-group">
                                <label for="" class="col-form-label">Bucket Name:</label>
                                <input type="text" :class="{'has-error':nameDanger}" class="form-control" v-model="AWS.bucketName">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Access Key:</label>
                                <input type="text" :class="{'has-error':keyDanger}" class="form-control"  v-model="AWS.accessKey">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Access Id:</label>
                                <input type="text" :class="{'has-error':accessDanger}" class="form-control" v-model="AWS.accessId">
                            </div>
                        </form>
                    </b-modal>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import navigation from './userNavbar';

    import bDropdown from 'bootstrap-vue/es/components/dropdown/dropdown';
    import bDropdownItem from 'bootstrap-vue/es/components/dropdown/dropdown-item';

    import axios from 'axios';
    const API_URL = window.location.origin;

    export default {
        name: 'user-cart-component',
        data() {
            return {
                totalPrice:0,
                nameDanger:false,
                keyDanger:false,
                accessDanger:false,
                passwordDanger:false,
                usernameDanger:false,
                urlDanger:false,
                cartItems : null,

                FTP: {
                    url: '',
                    password: '',
                    username: ''
                },
                AWS: {
                    bucketName:'',
                    accessKey:'',
                    accessId:''
                },
                disabled: true,
                deliveryMethod: 'Delivery Method',
            }
        },
        components: {
            navigation,
            'b-dropdown': bDropdown,
            'b-dropdown-item': bDropdownItem,
        },
        computed: {
            total () {
                let total = 0;
                if(this.cartItems!=null) {
                    this.cartItems.forEach(function (items) {
                        total += parseInt(items.price);
                    });
                }
                this.totalPrice=total;
                return total;
            },

        },
        created(){
          this.fillCart();
        },
        methods: {
            deleteEvent (index) {
                this.cartItems.splice(index, 1);
                if(this.cartItems==null) {
                    this.disabled = true;
                    this.deliveryMethod = 'Delivery Method';
                }
            },
            handleFtpOk (evt)
            {
                evt.preventDefault();
                if(this.FTP.password !== ''  && this.FTP.url !== '' && this.FTP.username !== ''){
                    this.disabled = false;
                    this.deliveryMethod = 'FTP Delivery';
                    this.FTP.password=this.FTP.url=this.FTP.username='';
                    this.passwordDanger=this.urlDanger=this.usernameDanger=false;
                    this.$root.$emit('bv::hide::modal','modal1');
                }
                else{
                    if(this.FTP.password == '')
                        this.passwordDanger = true;
                    else
                        this.passwordDanger = false;
                    if(this.FTP.url == '')
                        this.urlDanger = true;
                    else
                        this.urlDanger = false;
                    if(this.FTP.username == '')
                        this.usernameDanger = true;
                    else
                        this.usernameDanger = false;
                }
            },
            handleAwsOk(evt)
            {
                evt.preventDefault();
                if(this.AWS.bucketName !== ''  && this.AWS.accessKey !== '' && this.AWS.accessId !== ''){
                    this.disabled = false;
                    this.deliveryMethod = 'AWS Delivery';
                    this.AWS.bucketName=this.AWS.accessKey=this.AWS.accessId='';
                    this.nameDanger=this.keyDanger=this.accessDanger=false;
                    this.$root.$emit('bv::hide::modal','modal2');
                }
                else{
                    if(this.AWS.bucketName == '')
                        this.nameDanger = true;
                    else
                        this.nameDanger = false;
                    if(this.AWS.accessKey == '')
                        this.keyDanger = true;
                    else
                        this.keyDanger = false;
                    if(this.AWS.accessId == '')
                        this.accessDanger = true;
                    else
                        this.accessDanger = false;
                }

            },
            placeOrder() {
                axios.post(API_URL+'/placeOrder', { email:this.cartItems[0].email,search_criteria:this.cartItems[0].search_criteria,
                    deliverytype:this.deliveryMethod,totalPrice:this.totalPrice,data:this.cartItems})
                    .then(request => this.placeOrderSuccessfull(request))
                    .catch(error => this.placeOrderFailed(error))
            },
            placeOrderSuccessfull(req){
                if(req.data["has_error"] === false) {
                    let self=this;
                    self.cartItems=null;
                    this.$refs.table.refresh();
                    this.disabled=true;
                }
            },
            placeOrderFailed(err)
            {
            },
            fillCart() {
                axios.post(API_URL+'/loadCart', { email:localStorage.getItem('email')})
                    .then(request => this.cartSuccessfull(request))
                    .catch(error => this.cartFailed(error))
            },
            cartSuccessfull(req){
                this.cartItems=req.data.data;
            },
            cartFailed(err)
            {
            },
            validate () {

            },
        }
    };
</script>

<style scoped>
    .header{
        position: relative;
    }
    .header button{
        position: absolute;
        right: 0;
    }
    .has-error{
        border:1px solid red;
    }


</style>