<template>
    <div class="bg" :class="gray">
        <!--navigation bar-->
        <navigation></navigation>
        <!--page content-->
        <div class="container">
            <div class="header mt-5">
                <div class="header-title">
                    <h3>Users</h3>
                </div>
            </div>
            <div v-if="userOrder!=null" class="mt-4">
                <b-row >
                    <!--bulk select option-->
                    <b-col class="col-md-2 pr-0 mt-2 ">
                        <b-input-group class="mb-0 text-right  ">
                            <v-select v-model="bulkOptionSelected"
                                      :options="selectBulkOption" style="width: 96%"></v-select>
                        </b-input-group>
                    </b-col >
                    <!--user type option-->
                    <b-col class="col-md-2 pr-0 mt-2" >
                        <b-input-group v-if="selectUserType!=null" class="mb-0 text-right ">
                            <v-select v-model="userTypeSelected"
                                      :options="selectUserType.map(g => ({label: g.role_type, value: g.id}))" style="width: 96%" ></v-select>
                        </b-input-group>
                    </b-col>
                    <b-col class="col-md-2 mt-2">
                        <b-input-group class="mb-0 text-right "
                                       style="float:right">
                            <button class="btn btn-primary text-uppercase btn-block"
                                    >Apply
                            </button>
                        </b-input-group>
                    </b-col>
                    <b-col class="mt-2 col-md-3 " offset-md="3">
                        <b-input-group class="mb-0 text-right  pr-0"
                                       style="float:right;">
                            <b-form-input v-model="filter"
                                          placeholder="Search"/>
                        </b-input-group>
                    </b-col>
                </b-row>
                <b-table
                          ref="table"
                          outlined
                          show-empty
                          :items="userOrder"
                          :fields="fields"
                          :current-page="currentPage"
                          :per-page="perPage"
                          :filter="filter"
                          @filtered="onFiltered"
                          responsive
                          :stacked="stacked"
                          class=" mt-2 cart-table p-0 mt-2">
                    <!--A custom formatted column -->
                    <template slot="HEAD_select" slot-scope="row">
                        <b-form-checkbox v-model="selectAll"
                                         @click.native.stop="select">
                        </b-form-checkbox>
                    </template>
                    <template slot="select" slot-scope="row">
                        <b-form-checkbox v-model="selected" :value="row.item.id">
                        </b-form-checkbox>
                    </template>
                    <template slot="price" slot-scope="row">
                        <span class="font-weight-bold">${{row.value}} </span>
                    </template>
                    <template slot="pending" slot-scope="row">
                        <span v-if="row.item.pending.length===0">0 pending orders</span>
                        <span v-else>{{row.item.pending[0].count}} pending orders</span>
                    </template>
                    <template slot="complete" slot-scope="row">
                        <span v-if="row.item.complete_orders.length===0">0 orders</span>
                        <span v-else>{{row.item.complete_orders[0].count}} orders</span>
                    </template>
                    <template slot="action" slot-scope="row" class="text-center">
                        <div style="text-align: center" >
                            <span class="mr-4">

                             <img width="25px" @click="deleteEvent(row.item.uuid)"  src="https://png.icons8.com/material/50/000000/delete-forever.png">
                        </span>
                            <span v-if="row.item.role_type.role_type === 'PENDING_APPROVAL'">
                             <button @click="activate(row.item.uuid)" class="btn btn-primary">Activate</button>

                            </span>
                            <span v-if="row.item.role_type.role_type === 'ACTIVE_USER'">
                             <a target="_blank" :href="row.item.company.contract_file" class="btn btn-primary">View Contract</a>
                            </span>
                        </div>
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
    const userOrder = null;
    export default {
        name: 'admin-users-component',
        data() {
            return {
                gray:'',
                loading:false,
                userOrder,
                screenSmallerThan600: window.innerWidth < 600,
                stacked: false,
                fields: [
                    { key: 'select' },
                    { key: 'email', label: 'Email', sortable: false, sortDirection: 'desc' },
                    { key: 'role_type.role_type', label: 'User Type', sortable: false },
                    { key: 'complete',label: 'Orders', sortable: false },
                    { key: 'pending', label: 'Pending Orders', sortable: false },
                    { key: 'action', label: '' },
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 3,
                pageOptions: [3, 10, 15],
                filter: null,
                userTypeSelected: null,
                fetchedUserTypeSelected: '',
                selectUserType:[],
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
            this.fillDropdown();
            this.fillTable();
            setTimeout(() => {
                this.fetchedUserTypeSelected = 'User Type';
                this.userTypeSelected = this.fetchedUserTypeSelected;
                this.fetchedBulkOptionSelected = 'Bulk';
                this.bulkOptionSelected = this.fetchedBulkOptionSelected;
            }, 1000);
            this.stacked = this.screenSmallerThan600 === true;
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
                    for (const i in this.userOrder) {
                        this.selected.push(this.userOrder[i].id);
                    }
                }
            },
            deleteEvent(index) {
                this.gray='gray-image';
                this.loading=true;
                axios.post(API_URL+'/deleteUser',{uuid:index})
                    .then(req => {
                        let self=this;
                        self.userOrder=req.data.data;
                        self.totalRows=this.userOrder.length;
                        this.$refs.table.refresh();
                        this.gray='';
                        this.loading=false;
                    });
            },
            fillDropdown()
            {
                axios.post(API_URL+'/getAllTypes')
                    .then(request => this.typeSuccessfull(request))
                    .catch(error => this.typeFailed(error))
            },
            typeSuccessfull(req)
            {
                this.selectUserType=req.data.data;
            },
            typeFailed(err)
            {
            },
            fillTable()
            {
                axios.post(API_URL+'/getAllUsers')
                    .then(request => this.UserSuccessfull(request))
                    .catch(error => this.UserFailed(error))
            },
            UserSuccessfull(req){
                this.userOrder=req.data.data;
                this.totalRows=this.userOrder.length;
            },
            UserFailed(err)
            {
            },
            activate(id)
            {
                this.gray='gray-image';
                this.loading=true;
                axios.post(API_URL+'/activateUser',{id:id})
                    .then((req) => {
                        let self=this;
                        self.userOrder=req.data.data;
                        self.totalRows=this.userOrder.length;
                        this.$refs.table.refresh();
                        this.gray='';
                        this.loading=false;
                    })
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
