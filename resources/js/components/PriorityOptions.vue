<template>
    <select name="priority" class="block text-sm font-medium text-gray-700">
        <option v-for="p in priorities" :key="p.id" :value="p.id" :selected="p.id == selectedPriority">{{p.name}}</option>
    </select>
</template>

<script>
    export default {
        props: ['selectedPriority'],
        data() {
            return {
                priorities: []
            }
        },
        beforeCreate () {
            axios.get('/api/priorities')
            .then(response => {
                if(response.data.success) {
                    this.priorities = response.data.data;
                }
            });
        },
    }
</script>

<style lang="scss" scoped>

</style>