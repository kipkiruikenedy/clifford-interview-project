<!-- src/App.vue -->

<template>
  <div class="flex min-h-screen">
    <Sidebar />
    <div class="flex-1 p-4"><Dashboard /></div>
  </div>
</template>

<script>
import Sidebar from '../Sidebar.vue';
import Dashboard from './Dashboard.vue';
export default {
    components: {
        Sidebar,
      Dashboard,
    },
};
</script>

<style>
/* Add your Tailwind CSS styles here */
</style>
