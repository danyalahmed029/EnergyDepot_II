<template>
    <div  style="background: #f5f5f5">
        <!--navigation bar-->
        <navigation></navigation>

        <!--page content-->

        <div class="container">
            <div class="header mt-5">
                <div class="header-title">
                    <h3>Orders</h3>
                </div>
            </div>
            <div v-if="orders!=null" class="mt-4">
                <b-row >
                    <b-col class="col-md-3 offset-9">
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
                          :items="orders"
                          :fields="fields"
                          :current-page="currentPage"
                          :per-page="perPage"
                          :filter="filter"
                          @filtered="onFiltered"
                          responsive
                          class="text-capitalize mt-2 cart-table p-0 mt-2 orderHistory">
                    <template slot="price" slot-scope="row">
                        <span class="font-weight-bold">${{row.value}} </span>
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
        </div>
    </div>
</template>


<script>
    import navigation from './userNavbar';
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
    import axios from 'axios';
    const API_URL = window.location.origin;

    const orders = null;

    export default {
        name: 'order-hisory-component',
        data() {
            return {
                orders,
                fields: [
                    { key: 'search_criterias', label: 'Search Criteria', sortable: false, sortDirection: 'desc' },
                    { key: 'total_price', label: 'Price', sortable: false },
                    { key: 'order_date', label: 'Add To Cart on', sortable: false },
                    { key: 'delivery_type', label: 'Delivery Type', sortable: false },
                    { key: 'order_fullfiled', label: 'Status', sortable: false },
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 5,
                pageOptions: [5, 10, 15],
                filter: null,
                selected: [],
                selectAll: false,
                email:localStorage.getItem('email'),
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
                this.fetchedUserTypeSelected = 'User Type';
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
            fillTable()
            {
                axios.post(API_URL+'/getOrder', { email:this.email })
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
</style>