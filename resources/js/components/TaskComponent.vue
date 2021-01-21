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
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <type-option :selectedType="task.type.id"></type-option>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="assignee" class="block text-sm font-medium text-gray-700">Assigned To</label>
                    <people-option :selectedPerson="task.assignee.id || 0"></people-option>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="progress" class="block text-sm font-medium text-gray-700">Progress</label>
                    <progress-option :selectedProgress="task.progress.id"></progress-option>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                    <priority-option :selectedPriority="task.priority.id"></priority-option>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>

            </form>

            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">Comments</h1>
                <p v-if="!comments.length">No comments yet...</p>
                <ul v-if="comments.length">
                    <li v-for="comment in comments" :key="comment.id">{{comment.comment}}</li>
                </ul>
            </div>

            <form action="" @submit.prevent="submitComment" ref="commentform" class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <input type="hidden" name="id" v-model="this.$route.params.taskid">
                <input type="hidden" name="type" value="task">
                <div class="col-span-6 sm:col-span-4">
                    <label for="comment" 
                    class="block text-sm font-medium text-gray-700">Add Comment</label>
                    <textarea 
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    name="comment" id="comment" cols="30" rows="10"></textarea>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <button type="submit" :disabled="disableCommentForm" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit Comment
                    </button>
                </div>
            </form>

        </main>
    </div>
</template>

<script>
    import NavComponent from './NavComponent';
    import TypeOption from './TypeOptions';
    import ProgressOption from './ProgressOptions';
    import PeopleOption from './PeopleOptions';
    import PriorityOption from './PriorityOptions';
    export default {
        components: {
            NavComponent,
            TypeOption,
            ProgressOption,
            PeopleOption,
            PriorityOption
        },
        data() {
            return {
                task: {
                    project: {},
                    creator: {},
                    assignee: {},
                    type: {},
                    progress: {},
                    priority: {}
                },
                comments: [],
                disableCommentForm: false
            }
        },
        beforeCreate () {
            axios.get('/sanctum/csrf-cookie');
            axios.get('/api/tasks/' + this.$route.params.taskid)
            .then(response => {
                if(!response.data.error) {
                    this.task = response.data.data;
                } else {
                    console.log(response.data.error);
                }
            });

            axios.get('/api/tasks/' + this.$route.params.taskid + '/comments')
            .then(response => {
                if(!response.data.error) {
                    this.comments = response.data;
                } else {
                    console.log(response.data.error);
                }
            });
        },
        methods: {
            submitComment() {
                const formData = new FormData(this.$refs.commentform);
                this.disableCommentForm = true;
                axios.post('/api/comment', formData).then(response => {
                    if(response.data.success){
                        this.$refs.commentform.comment.value = '';
                        this.disableCommentForm = false;
                        this.comments.push(response.data.data);
                    }
                });
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>