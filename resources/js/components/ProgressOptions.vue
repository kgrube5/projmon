<template>
    <select name="progress" class="block text-sm font-medium text-gray-700">
        <option v-for="p in progress" :key="p.id" :value="p.id" :selected="p.id === selectedProgress">{{p.name}}</option>
    </select>
</template>

<script>
    export default {
        props: ['selectedProgress'],
        data() {
            return {
                progress: []
            }
        },
        beforeCreate () {
            axios.get('/api/progress')
            .then(response => {
                this.progress = response.data.data;
            });
        },
    }
</script>

<style lang="scss" scoped>

</style>