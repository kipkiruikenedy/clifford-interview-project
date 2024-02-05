<template>
  <footer class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
      <div>
        <p class="text-sm">&copy; 2024 B2B Travel Platform. All rights reserved.</p>
      </div>

      <div class="flex space-x-4">
        <router-link to="/about" class="hover:text-gray-300">About</router-link>
        <router-link to="/contact" class="hover:text-gray-300">Contact</router-link>
        <a href="https://github.com/kipkiruikenedy/Travel-Agents-and-Accommodation-client-test" target="_blank" rel="noopener noreferrer" class="hover:text-gray-300">GitHub</a>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
    name: 'Footer',
};
</script>

<style scoped>
/* Add custom styles for the Footer component if needed */
</style>
