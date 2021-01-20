<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
    import LoginComponent from './components/LoginComponent';
    import RegisterComponent from './components/RegisterComponent';
    export default {
        components: {
            LoginComponent,
            RegisterComponent
        },
        data() {
            return {
                
            }
        },
        methods: {}
    }
</script>

<style lang="scss" scoped>
    .form-group {
        margin-bottom:10px;
    }
</style>