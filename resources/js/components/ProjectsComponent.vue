<template>
<div>
    <nav-component></nav-component>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">
                My Projects
            </h1>
            <button @click="toggleCreate" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              + Create Project
            </button>
        </div>
    </header>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          # Assigned Tasks
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Role
                        </th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr v-for="project in projects" :key="project.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                          <router-link :to="{ name: 'project', params: { id: project.id }}">{{project.title}}</router-link>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          0
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{project.user_id == userid ? 'Admin' : 'Member'}}
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

    <create-project v-if="this.$store.state.toggleCreateProject"></create-project>
    
</div>
</template>

<script>
  import NavComponent from './NavComponent';
  import CreateProject from './ProjectCreateComponent'
  export default {
    components: {
      NavComponent,
      CreateProject
    },
    data() {
      return {
        projects: [],
        userid: this.$store.state.user.id
      }
    },
    beforeCreate () {
      axios.get('/api/projects')
      .then(response => {
          if(!response.data.error) {
            this.projects = response.data;
          }
      }).catch(err => {
        this.$store.commit('removeUser');
        sessionStorage.clear();
        this.$router.push('/');
      });
    },
    methods: {
      toggleCreate() {
        this.$store.commit('toggleCreateProject')
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>