<template>
    <div>
        <b-navbar toggleable="md" class="navbar-top">
            <div class="container">
                <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

                <b-navbar-brand href="#">Energy Depot</b-navbar-brand>

                <b-collapse is-nav id="nav_collapse">
                    <b-navbar-nav class="ml-auto">
                        <b-nav-item active-class="active" to="/userCart">Pending Order</b-nav-item>
                        <b-nav-item active-class="active" to="/userOrderHistory">Order History</b-nav-item>
                        <b-nav-item @click="signOut">Sign Out</b-nav-item>
                    </b-navbar-nav>
                </b-collapse>
            </div>
        </b-navbar>
    </div>
</template>

<script>
    import  bNavbar from 'bootstrap-vue/es/components/navbar/navbar';
    import bNavbarToggle from 'bootstrap-vue/es/components/navbar/navbar-toggle';
    import bNavbarNav from 'bootstrap-vue/es/components/navbar/navbar-nav';
    import bNavItem from 'bootstrap-vue/es/components/nav/nav-item';
    import bBrand from 'bootstrap-vue/es/components/navbar/navbar-brand';

    export default {
        name: 'user-navbar',
        components: {
            'b-navbar': bNavbar,
            'b-navbar-toggle': bNavbarToggle,
            'b-navbar-nav': bNavbarNav,
            'b-nav-item': bNavItem,
            'b-navbar-brand': bBrand,
        },
        methods:{
            signOut(){
                localStorage.removeItem('apiToken');
                localStorage.removeItem('email');
                localStorage.removeItem('type');
                this.$router.replace(this.$route.query.redirect || '/');
            }
        }
    };
</script>

<style scoped>
    .navbar-top{
        -webkit-box-shadow: -1px 2px 8px -1px rgba(0, 0, 0, 0.21);
        -moz-box-shadow: -1px 2px 8px -1px rgba(0,0,0,0.75);
        box-shadow: -1px 2px 8px -1px rgba(0, 0, 0, 0.21);
        background: #fff;
    }
    .navbar-brand {
        font-size: 2rem;
        font-weight: 700;
    }
    .navbar-light .navbar-nav .nav-link {
        color: rgba(0, 0, 0, 1);
    }
    .navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link:focus {
        color: #4d7da8;
    }
    .navbar-light .navbar-brand {
        color: #4d7da8;
    }
    .nav-link {
        display: block;
        color: #000;
        padding: 0.5rem 1rem;
        border-bottom: 0px solid;
    }
</style>