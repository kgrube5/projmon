<template>
    <select name="assignee" class="block text-sm font-medium text-gray-700">
        <option value="0" :selected="selectedPerson == 0">None</option>
        <option v-for="user in users" :key="user.id" :value="user.id" :selected="user.id == selectedPerson">
            {{user.name}}
        </option>
    </select>
</template>

<script>
    export default {
        props: ['selectedPerson'],
        data() {
            return {
                users: []
            }
        },
        beforeCreate () {
            axios.get('/api/projects/' + this.$route.params.id + '/users')
            .then(response=> {
                if(response.data.success) {
                    this.users = response.data.data;
                }
            });
        },
    }
</script>

<style lang="scss" scoped>

</style>