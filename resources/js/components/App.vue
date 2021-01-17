<template>
    <div>
        <form action="" @submit.prevent="login">
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

        <div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: [],
                formData: {
                    'email': '',
                    'password': ''
                }
            }
        },
        methods: {
            login() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    console.log(response);
                    axios.post('/login', this.formData).then(response => {
                        console.log(response);
                        this.getUsers();
                    });
                });
            },
            getUsers() {
                axios.get('/api/users').then(response => {
                    console.log(response);
                    this.users = response.data;
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