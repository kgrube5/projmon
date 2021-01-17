<template>
    <div v-if="this.$store.state.user != null">
        <router-view></router-view>
    </div>
    <div v-else>
        <login-component></login-component>
    </div>
</template>

<script>
    import LoginComponent from './components/LoginComponent';
    export default {
        components: {
            LoginComponent
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