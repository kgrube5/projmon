<template>
<div>
    <nav-component></nav-component>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">
                Tasks
            </h1>
        </div>
    </header>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
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
      return {}
    },
    mounted() {
        console.log(this.$store.state.user);
    },
  }
</script>

<style lang="scss" scoped>

</style>