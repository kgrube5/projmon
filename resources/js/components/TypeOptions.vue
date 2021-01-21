<template>
    <select name="type" class="block text-sm font-medium text-gray-700">
        <option v-for="type in types" :key="type.id" :value="type.id" :selected="type.id == selectedType">{{type.name}}</option>
    </select>
</template>

<script>
    export default {
        props: ['selectedType'],
        data() {
            return {
                types: []
            }
        },
        beforeCreate () {
            axios.get('/api/types')
            .then(response => {
                this.types = response.data.data;
            });
        },
        methods: {
            updateSelected() {
                this.selectedType = this.$refs.people;
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>