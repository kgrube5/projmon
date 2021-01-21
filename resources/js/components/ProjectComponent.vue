<template>
    <div>
        <nav-component></nav-component>

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Project: {{this.project.title}}
                </h1>
                <button @click="toggleCreate" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                + Create Task
                </button>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

                <h2 class="text-3xl font-bold leading-tight text-gray-900">
                    Your Tasks for {{this.project.title}}
                </h2>
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
                                Assignee
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
                                
                                <tr v-for="task in this.projectTasks" :key="task.id" v-show="task.assignee.id == userid">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <router-link :to="{ name: 'task', params: { id: project.id, taskid: task.id }}">{{task.title}}</router-link>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{task.assignee.name != null ? task.assignee.name : 'Not Assigned'}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{task.priority.name}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{task.creator.name}}
                                    </td>
                                </tr>

                            <!-- More items... -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>


                <h2 class="text-3xl font-bold leading-tight text-gray-900">
                    All Tasks for {{this.project.title}}
                </h2>
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
                                Assignee
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
                                    <router-link :to="{ name: 'task', params: { id: project.id, taskid: task.id }}">{{task.title}}</router-link>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{task.assignee.name != null ? task.assignee.name : 'Not Assigned'}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{task.priority.name}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{task.creator.name}}
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

        <create-task v-if="this.$store.state.toggleCreateTask"></create-task>

    </div>
</template>

<script>
    import NavComponent from './NavComponent';
    import CreateTask from './TaskCreateComponent';
    export default {
        components: {
            NavComponent,
            CreateTask
        },
        data() {
            return {
                userid: this.$store.state.user.id,
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
                    this.projectTasks = response.data.data;
                } else {
                    console.log(response.data.error);
                }
            });
        },
        methods: {
            toggleCreate() {
                this.$store.commit('toggleCreateTask');
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>