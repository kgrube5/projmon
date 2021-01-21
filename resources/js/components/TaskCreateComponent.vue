<template>
<form
action="#" @submit.prevent="createProject" ref="createprojectform" 
class="fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
              Create Task
            </h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500">
                Fill out the form to create a task.
              </p>
            </div>
          </div>
        </div>
      </div>

      <input type="hidden" name="project" v-model="this.$route.params.id">

      <div class="col-span-6 sm:col-span-4">
          <label for="title" class="block text-sm font-medium text-gray-700">
              Task Title
          </label>
          <input 
          class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
          type="text" name="title" placeholder="Task Title...">
      </div>

      <div class="col-span-6 sm:col-span-4">
          <label for="title" class="block text-sm font-medium text-gray-700">
              Task Description
          </label>
          <textarea 
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            name="description" cols="30" rows="10" placeholder="Task Description..."></textarea>
      </div>

      <div class="col-span-6 sm:col-span-4">
          <label for="title" class="block text-sm font-medium text-gray-700">
              Task Type
          </label>
          <type-option selectedType="1"></type-option>
      </div>

      <div class="col-span-6 sm:col-span-4">
          <label for="title" class="block text-sm font-medium text-gray-700">
              Progress Type
          </label>
          <progress-option selectedProgress="1"></progress-option>
      </div>

      <div class="col-span-6 sm:col-span-4">
          <label for="title" class="block text-sm font-medium text-gray-700">
              Assign To
          </label>
          <people-option selectedPerson="0"></people-option>
      </div>

      <div class="col-span-6 sm:col-span-4">
          <label for="title" class="block text-sm font-medium text-gray-700">
              Priority
          </label>
          <priority-option selectedPriority="1"></priority-option>
      </div>

      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
              Create
          </button>
          <button @click="toggleCreate" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              Cancel
          </button>
      </div>
    </div>
  </div>
</form>
</template>

<script>
    import TypeOption from './TypeOptions';
    import ProgressOption from './ProgressOptions';
    import PeopleOption from './PeopleOptions';
    import PriorityOption from './PriorityOptions';
    export default {
      components: {
        TypeOption,
        ProgressOption,
        PeopleOption,
        PriorityOption
      },
      data() {
        return {

        }
      },
      mounted() {
          axios.get('/sanctum/csrf-cookie');
      },
      methods: {
          createProject() {
              const formData = new FormData(this.$refs.createprojectform);
              axios.post('/api/tasks', formData).then(response => {
                  if(response.data.success){
                    this.$store.commit('toggleCreateTask');
                    this.$router.push('/projects/'+response.data.data.project_id+'/tasks/'+ response.data.data.id);
                  }
              })
              .catch((err) => {
                  console.log(err.response.data.errors);
              });
          },
          toggleCreate() {
            this.$store.commit('toggleCreateTask');
          }
      }
    }
</script>

<style lang="scss" scoped>

</style>