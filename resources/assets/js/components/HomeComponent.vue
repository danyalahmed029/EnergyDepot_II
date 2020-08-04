<template>
    <div class="landing-background-img " >
        <div class="overlay">
            <div class="container">
                <h3 class="pt-4">Energy Depot</h3>
                <h1 class="margin-top-15">DATA FOR ANALYTICS</h1>
                <h3 >Elevate your analytics with our Data.</h3>
                <h3 >Build your product with our Data.</h3>
                <h3 >Inform your Business decisions with our Data.</h3>
                <router-link to="/requestPin" tag="button" class="btn mt-4" size="lg" variant="primary">SIGN IN</router-link>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "home-component",
        data() {
            return {
                bgImage: process.url+"../img/background.jpeg"
            };
        },
    }

</script>

<style scoped>
    h3{
        color: white;
        font-weight: 900;
    }

    .margin-top-15{
        margin-top: 15%;
    }

    .p-text{
        color: white;
        font-weight: 900;
    }

    .btn{
        background-color: #4678a5;
        border-radius: 0px;
        border-color: transparent;
        color: white;
        font-weight: 900;
        font-size: 1.4rem;
        padding: 10px 60px;
        letter-spacing: 2px;
    }
    .btn:hover{
         background-color: #2d94d4;
         color: #81d2fe;
    }

    h1{
        color: white;
        font-weight: 900;
        font-size: 4rem;
    }

</style>