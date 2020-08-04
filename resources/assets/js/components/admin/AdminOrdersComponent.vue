<template>
    <div  style="background: #f5f5f5" :class="gray">
        <!--navigation bar-->
        <navigation></navigation>

        <!--page content-->

        <div class="container">
            <div class="header mt-5">
                <div class="header-title">
                    <h3>Orders</h3>
                </div>
            </div>
            <div  class="mt-4">
                <b-row class="table-col" >
                    <!--bulk select option-->
                    <b-col class="col-md-2 pr-0 mt-2 ">
                        <b-input-group class="mb-0 text-right  ">
                            <v-select v-model="bulkOptionSelected"
                                      :options="selectBulkOption" style="width: 96%"></v-select>
                        </b-input-group>
                    </b-col >
                    <!--user type option-->
                    <b-col class="col-md-2 pr-0 mt-2" >
                        <b-input-group class="mb-0 text-right ">
                            <v-select v-model="userTypeSelected"
                                      :options="selectUserType" style="width: 96%" ></v-select>
                        </b-input-group>
                    </b-col>
                    <!--select date option-->
                    <b-col class="col-md-3 pr-0 mt-2">
                        <b-input-group class="mb-0 text-right "
                                       style="float:left">
                            <date-picker v-model="time3"
                                         range :shortcuts="shortcuts"
                                         :lang="lang">
                            </date-picker>
                        </b-input-group>
                    </b-col>
                    <b-col class="col-md-2 mt-2">
                        <b-input-group class="mb-0 text-right "
                                       style="float:right">
                            <button class="btn btn-primary text-uppercase btn-block">Apply</button>
                        </b-input-group>
                    </b-col>
                    <b-col class="col-md-3 mt-2">
                        <b-input-group class="mb-0 text-right  pr-0"
                                       style="float:right">
                            <b-form-input v-model="filter"
                                          placeholder="Search"
                                          class="pull-right"/>
                        </b-input-group>
                    </b-col>
                </b-row>

                <b-table  outlined
                          show-empty
                          ref="table"
                          :items="orders"
                          :fields="fields"
                          :current-page="currentPage"
                          :per-page="perPage"
                          :filter="filter"
                          @filtered="onFiltered"
                          responsive
                          class=" mt-2 cart-table p-0 mt-2" v-if="orders!=null">

                    <!--A custom formatted column -->
                    <template slot="HEAD_checked" slot-scope="row">
                        <b-form-checkbox v-model="selectAll"
                                         @click.native.stop="select">
                        </b-form-checkbox>
                    </template>
                    <template slot="checked" slot-scope="row">
                        <b-form-checkbox v-model="selected" :value="row.item.uuid">
                        </b-form-checkbox>
                    </template>
                    <template slot="price" slot-scope="row">
                        <span class="font-weight-bold">${{row.value}} </span>
                    </template>
                    <template slot="action" slot-scope="row" class="text-center">
                        <img width="25px" @click="deleteEvent(row.item.uuid)"  src="https://png.icons8.com/material/50/000000/delete-forever.png">
                    </template>
                </b-table>
                <b-row>
                    <div  class="my-1 mx-auto mt-5 mb-4">
                        <b-pagination :total-rows="totalRows"
                                      :per-page="perPage"
                                      v-model="currentPage" class="my-0" />
                    </div>
                </b-row>
            </div>
            <div v-if="loading" class="loading-div">
                <spinner class="spinner-load"
                         :speed="1" :size="50">
                </spinner>
            </div>
        </div>
    </div>
</template>


<script>
    import navigation from './AdminNavbarComponent';
    import bFormCheckboxGroup from 'bootstrap-vue/es/components/form-checkbox/form-checkbox-group';
    import bFormCheckbox from 'bootstrap-vue/es/components/form-checkbox/form-checkbox';
    import bPagination from 'bootstrap-vue/es/components/pagination/pagination';
    import bTable from 'bootstrap-vue/es/components/table/table';
    import bFormGroup from 'bootstrap-vue/es/components/form-group/form-group';
    import bFormInput from 'bootstrap-vue/es/components/form-input/form-input';
    import bFormSelect from 'bootstrap-vue/es/components/form-select/form-select';
    import bInputGroupAppend from 'bootstrap-vue/es/components/input-group/input-group-append';
    import bInputGroup from 'bootstrap-vue/es/components/input-group/input-group';
    import bDropdown from 'bootstrap-vue/es/components/dropdown/dropdown';
    import bDropdownItem from 'bootstrap-vue/es/components/dropdown/dropdown-item';
    import vSelect from 'vue-select';
    import DatePicker from 'vue2-datepicker';
    import bSpinner from 'vue-simple-spinner';
    import axios from 'axios';
    const API_URL = window.location.origin;

    const orders = null;

    export default {
        name: 'admin-orders-component',
        data() {
            return {
                gray:'',
                loading:false,
                orders,
                fields: [
                    { key: 'checked' },
                    { key: 'search_criterias', label: 'Search Criteria', sortable: false, sortDirection: 'desc' },
                    { key: 'total_price', label: 'Price', sortable: false },
                    { key: 'order_date', label: 'Add To Cart on', sortable: false },
                    { key: 'user.email', label: 'User', sortable: false },
                    { key: 'delivery_type', label: 'Delivery Type', sortable: false },
                    { key: 'order_fullfiled', label: 'Status', sortable: false },
                    { key: 'action', label: 'Action' },
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                pageOptions: [5, 10, 15],
                filter: null,
                userTypeSelected: null,
                fetchedUserTypeSelected: '',
                selectUserType: [
                    { id: 0, label: 'Completed' },
                    { id: 1, label: 'Pending' }
                ],
                bulkOptionSelected: null,
                fetchedBulkOptionSelected: '',
                selectBulkOption: [
                    { id: 1, label: 'foo' },
                    { id: 3, label: 'bar' },
                    { id: 2, label: 'baz' },
                ],
                time3: '',
                shortcuts: [
                    {
                        text: 'Today',
                        onClick: () => {
                            this.time3 = [new Date(), new Date()];
                        },
                    },
                ],
                lang: {
                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    pickers: ['next 7 days', 'next 30 days', 'previous 7 days', 'previous 30 days'],
                    placeholder: {
                        date: 'Select Date',
                        dateRange: 'Select Date Range',
                    },
                },
                selected: [],
                selectAll: false,
            };
        },
        components: {
            navigation,
            'b-form-checkbox': bFormCheckbox,
            'b-form-checkbox-group': bFormCheckboxGroup,
            'b-pagination': bPagination,
            'b-table': bTable,
            'b-form-group': bFormGroup,
            'b-form-input': bFormInput,
            'b-form-select': bFormSelect,
            'b-input-group': bInputGroup,
            'b-input-group-append': bInputGroupAppend,
            'b-dropdown': bDropdown,
            'b-dropdown-item': bDropdownItem,
            'v-select': vSelect,
            DatePicker,
            'spinner':bSpinner
        },
        computed: {
            sortOptions() {
                // Create an options list from our fields
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => ({ text: f.label, value: f.key }));
            },
        },
        created() {
            this.fillTable();
            setTimeout(() => {
                this.fetchedUserTypeSelected = 'Order Type';
                this.userTypeSelected = this.fetchedUserTypeSelected;
                this.fetchedBulkOptionSelected = 'Bulk';
                this.bulkOptionSelected = this.fetchedBulkOptionSelected;
            }, 1000);
        },
        methods: {
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1;
            },
            select() {
                this.selected = [];
                if (!this.selectAll) {
                    for (const i in this.orders) {
                        this.selected.push(this.orders[i].id);
                    }
                }
            },
            deleteEvent(index) {
                this.gray='gray-image';
                this.loading=true;
                axios.post(API_URL+'/deleteOrder',{uuid:index})
                    .then(req => {
                        let self=this;
                        self.orders=req.data.data;
                        self.totalRows=this.orders.length;
                        this.$refs.table.refresh();
                        this.gray='';
                        this.loading=false;
                    });
            },
            fillTable()
            {
                axios.post(API_URL+'/getAllOrders')
                    .then(request => this.OrderSuccessfull(request))
                    .catch(error => this.OrderFailed(error))
            },
            OrderSuccessfull(req){
                this.orders=req.data.data;
                this.totalRows=this.orders.length;
            },
            OrderFailed(err)
            {
            }
        },
    };
</script>

<style scoped>
    .custom-control-inline {
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin-right: 1rem;
        margin-left: 1rem;
        padding-top: 6px;
    }
    .loading-div{
        z-index:1;
        position:absolute;
        top:50%;
        left:50%;
        margin-left:-30px;
        margin-top:40px;
        width:200px;
        height:200px;
    }
    .gray-image{
        background: gray;
        opacity:0.2;
    }
</style>