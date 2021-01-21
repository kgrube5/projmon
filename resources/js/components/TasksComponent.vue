<template>
  <div>
      <nav-component></nav-component>

      <header class="bg-white shadow">
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
              <h1 class="text-3xl font-bold leading-tight text-gray-900">
                  My Tasks
              </h1>
          </div>
      </header>
      <main>
          <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Assigned
                  </h1>
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Task
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Project Name
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Progress
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Reporter
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Priority
                          </th>
                        </tr>
                      </thead>

                      <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="task in this.assignedTasks" :key="task.id">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <router-link :to="{ name: 'task', params: { id:task.project.id, taskid: task.id }}">{{task.title}}</router-link>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <router-link :to="{ name: 'project', params: { id: task.project.id }}">{{task.project.title}}</router-link>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            {{task.type.name}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              {{task.progress.name}}
                            </span>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{task.creator.name}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{task.priority.name}}
                          </td>
                        </tr>

                        <!-- More items... -->
                      </tbody>
                    </table>
                  </div>

                  <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Created
                  </h1>
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Task
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Project Name
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Progress
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Reporter
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Priority
                          </th>
                        </tr>
                      </thead>

                      <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="task in this.createdTasks" :key="task.id">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <router-link :to="{ name: 'task', params: { id: task.project.id,taskid: task.id, }}">{{task.title}}</router-link>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <router-link :to="{ name: 'project', params: { id: task.project.id }}">{{task.project.title}}</router-link>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            {{task.type.name}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              {{task.progress.name}}
                            </span>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{task.creator.name}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{task.priority.name}}
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
        assignedTasks: [],
        createdTasks:[]
      }
    },
    beforeCreate () {
      axios.get('/api/tasks')
      .then(response => {
          if(!response.data.error) {
            this.assignedTasks = response.data.data.assigned;
            this.createdTasks = response.data.data.created;
          }
      }).catch(err => {
        // this.$store.commit('removeUser');
        // sessionStorage.clear();
        // this.$router.push('/');
      });
    }
  }
</script>

<style lang="scss" scoped>

</style>