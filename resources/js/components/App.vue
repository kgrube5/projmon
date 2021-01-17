<template>
    <div>
        <form action="" @submit.prevent="login" v-if="this.$store.state.user == null">
            <div class="form-group">
                <input type="email" id="email" placeholder="Email" v-model="formData.email">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" v-model="formData.password">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>

        <form action="" @submit.prevent="logout"  v-if="this.$store.state.user != null">
            <button type="submit">Logout</button>
        </form>

        <div v-if="this.$store.state.user != null">
            <p>Name: {{this.$store.state.user.name}}</p>
            <p>Email: {{this.$store.state.user.email}}</p>
            <p>Signed Up: {{this.$store.state.user.created_at}}</p>
        </div>
    </div>
</template>

<script>
    //import router from '../router';
    export default {
        data() {
            return {
                formData: {
                    'email': '',
                    'password': ''
                }
            }
        },
        mounted () {
            console.log(this.$store.state.user);
        },
        methods: {
            login() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/login', this.formData).then(response => {
                        this.getUser();
                    });
                });
            },
            logout() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/logout').then(response => {
                        this.$store.commit('removeUser');
                        sessionStorage.clear();
                    });
                });
            },
            getUser() {
                axios.get('/api/user').then(response => {
                    this.$store.commit('updateUser', response.data);
                });
            }
        },
    }
</script>

<style lang="scss" scoped>
    .form-group {
        margin-bottom:10px;
    }
</style>