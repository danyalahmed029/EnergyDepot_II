<template>
    <div>
    <b-navbar toggleable="md" type="dark" variant="info">

        <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

        <b-navbar-brand href="#">NavBar</b-navbar-brand>

        <b-collapse is-nav id="nav_collapse">
            <b-navbar-nav class="ml-auto">
                <b-nav-item-dropdown right>
                    <template slot="button-content">
                        <em>User</em>
                    </template>
                    <b-dropdown-item @click="signOut">Signout</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>

        <b-card >
            <p class="card-text">
                <b>You have successfully uploaded the contract, you should receive an email when the contract is approved</b>
            </p>

        </b-card>
    </div>
</template>
<script>
    import bNavbar from 'bootstrap-vue/es/components/navbar/navbar';
    import bCard from 'bootstrap-vue/es/components/card/card';
    import axios from 'axios';
    import * as UserConstants  from '../UserConstant';

    const API_URL = window.location.origin;

    export default {

        name: 'Login',
        baseURL: API_URL,
        components: {
            'b-navbar':bNavbar,
            'b-card':bCard
        },
        created(){
          this.checkRole();
        },
        methods:{
            signOut(){
                localStorage.removeItem('apiToken');
                localStorage.removeItem('email');
                localStorage.removeItem('type');
                this.$router.replace(this.$route.query.redirect || '/');
            },
            checkRole(){
                    axios.post(API_URL+'/checkRole', { email:localStorage.getItem('email')})
                        .then((req) => {
                            if(req.data.data.role_type.role_type===UserConstants.TYPE_ACTIVE_USER)
                            {
                                localStorage.setItem('type',"ACTIVE_USER");
                                this.$router.go(this.$router.currentRoute);
                            }
                        })

            }
        },
        data () {
            return {
            }
        },

    }
</script>


