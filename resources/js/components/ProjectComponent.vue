<template>
    <div>
        <nav-component></nav-component>

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Project: {{this.project.title}}
                </h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

                <h2>Your Tasks for {{this.project.title}}</h2>


                <h2>All Tasks for {{this.project.title}}</h2>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Task
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Priority
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Reporter
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="task in this.projectTasks" :key="task.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <router-link :to="{ name: 'task', params: { id: task.id }}">{{task.title}}</router-link>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- {{task.description}} -->
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{task.priority}}
                                </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{task.creator_id}}
                                </td>
                            </tr>

                            <!-- More items... -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</template>

<script>
    import NavComponent from './NavComponent';
    export default {
        components: {
            NavComponent,
        },
        data() {
            return {
                project: {},
                projectTasks: []
            }
        },
        beforeCreate () {
            axios.get('/api/projects/' + this.$route.params.id).then(response => {
                if(!response.data.error) {
                    this.project = response.data;
                } else {
                    console.log(response.data.error);
                }
            });

            axios.get('/api/projects/' + this.$route.params.id + '/tasks').then(response => {
                if(!response.data.error) {
                    this.projectTasks = response.data;
                } else {
                    console.log(response.data.error);
                }
            });

            
        },
    }
</script>

<style lang="scss" scoped>

</style>