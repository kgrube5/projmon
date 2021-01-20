<template>
    <div>
        <nav-component></nav-component>

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Task: {{this.task.title}}
                </h1>
                <p>Created On: {{this.task.created_at}}</p>
            </div>
        </header>
        <main>
            <form class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8" action="#">

                <div class="col-span-6 sm:col-span-4">
                    <label for="project" class="block text-sm font-medium text-gray-700">Project</label>
                    <input
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    type="text" v-model="task.project.title" disabled read-only/>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <input
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    type="text" v-model="task.type" disabled read-only/>
                </div>
                
                <div class="col-span-6 sm:col-span-4">
                    <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                    <select 
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    v-model="task.priority" name="priority" id="priority">
                        <option value="lowest">Lowest</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                        <option value="highest">Highest</option>
                    </select>
                </div>
                
                <div class="col-span-6 sm:col-span-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea 
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    v-model="task.description" 
                    name="description" 
                    id="description" 
                    cols="30" 
                    rows="10"></textarea>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="creator" class="block text-sm font-medium text-gray-700">Creator</label>
                    <input 
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    type="text" v-model="task.creator.name" disabled read-only/>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="assignee" class="block text-sm font-medium text-gray-700">Assigned To</label>
                    <select 
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    v-model="task.assignee.id" name="assignee" id="assignee">
                        <option value="null">Not Assigned</option>
                        <option value="1">Person 1</option>
                        <option value="2">Person 2</option>
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="progress" class="block text-sm font-medium text-gray-700">Progress</label>
                    <select
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    v-model="task.progress" name="progress" id="progress">
                        <option value="0">Idle</option>
                        <option value="1">Started</option>
                        <option value="2">Completed</option>
                    </select>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>

            </form>

            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">Comments</h1>
                <p>No comments yet...</p>
            </div>

            <form action="" ref="commentform" class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="col-span-6 sm:col-span-4">
                    <label for="comment" 
                    class="block text-sm font-medium text-gray-700">Add Comment</label>
                    <textarea 
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    name="comment" id="comment" cols="30" rows="10"></textarea>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit Comment
                    </button>
                </div>
            </form>

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
                task: {
                    project: {},
                    creator: {},
                    assignee: {}
                }
            }
        },
        beforeCreate () {
            axios.get('/api/tasks/' + this.$route.params.id)
            .then(response => {
                if(!response.data.error) {
                    this.task = response.data.data;
                } else {
                    console.log(response.data.error);
                }
            });
        },
    }
</script>

<style lang="scss" scoped>

</style>