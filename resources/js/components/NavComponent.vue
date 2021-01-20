<template>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-white">
                        ProjMon
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                        
                        <router-link to="/dashboard"
                            :class="[this.$route.name === 'dashboard' ? activeNavClass : navClass]"
                            class="px-3 py-2 rounded-md text-sm font-medium"
                            >Dashboard</router-link>

                        <router-link to="/projects"
                            :class="[this.$route.name === 'projects' ? activeNavClass : navClass]"
                            class="px-3 py-2 rounded-md text-sm font-medium"
                            >Projects</router-link>

                        <router-link to="/tasks" 
                            :class="[this.$route.name === 'tasks' ? activeNavClass : navClass]"
                            class="px-3 py-2 rounded-md text-sm font-medium"
                            >Tasks</router-link>

                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                        <div>
                            <button @click.prevent="toggleProfileMenu" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>
                        <div :class="{hidden: profileMenuOff}" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <router-link to="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</router-link>
                            <form action="" @submit.prevent="logout">
                                <button class="w-full text-left focus:outline-none block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <div class="-mr-2 flex md:hidden">
                    <button @click.prevent="toggleMobileMenu" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="md:hidden"  :class="{hidden: mobileMenuOff}">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <router-link to="/dashboard"
                    :class="[this.$route.name === 'dashboard' ? activeMobileNavClass : mobileNavClass]"
                    class="px-3 py-2 rounded-md text-base font-medium"
                    >Dashboard</router-link>
                
                <router-link to="/projects"
                    :class="[this.$route.name === 'projects' ? activeMobileNavClass : mobileNavClass]"
                    class="px-3 py-2 rounded-md text-base font-medium"
                    >Projects</router-link>
                
                <router-link to="/tasks"
                    :class="[this.$route.name === 'tasks' ? activeMobileNavClass : mobileNavClass]"
                    class="px-3 py-2 rounded-md text-base font-medium"
                    >Tasks</router-link>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{this.$store.state.user.name}}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{this.$store.state.user.email}}</div>
                    </div>
                    <button class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <router-link to="/profile"
                        :class="[this.$route.name === 'profile' ? activeMobileNavClass : mobileNavClass]"
                        class="px-3 py-2 rounded-md text-base font-medium"
                        >Your Profile</router-link>
                
                    <form action="" @submit.prevent="logout">
                        <button class="w-full text-left focus:outline-none block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                profileMenuOff:true,
                mobileMenuOff:true,
                activeNavClass: 'bg-gray-900 text-white',
                activeMobileNavClass: 'bg-gray-900 text-white block',
                navClass: 'text-gray-300 hover:bg-gray-700 hover:text-white',
                mobileNavClass: 'text-gray-300 hover:bg-gray-700 hover:text-white block'
            }
        },
        methods: {
            logout() {
                axios.post('/api/logout').then(response => {
                    this.$store.commit('removeUser');
                    sessionStorage.clear();
                    this.$router.push('/');
                });
            },
            toggleProfileMenu() {
                this.profileMenuOff = !this.profileMenuOff;
            },
            toggleMobileMenu() {
                this.mobileMenuOff = !this.mobileMenuOff;
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>