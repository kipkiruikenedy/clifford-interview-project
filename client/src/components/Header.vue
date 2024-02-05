

<template>
  <header class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      <router-link to="/" class="text-xl font-bold">B2B Travel</router-link>
      <nav class="space-x-4">
        <router-link to="/" class="hover:text-gray-300">Home</router-link>
        <router-link to="/accommodations" class="hover:text-gray-300">Accommodations</router-link>
        <router-link to="/about" class="hover:text-gray-300">About Me</router-link>
        <router-link v-if="!isLoggedIn" to="/login" class="hover:text-gray-300">Login</router-link>
        <router-link v-if="!isLoggedIn" to="/register" class="hover:text-gray-300">Register</router-link>
        <button v-if="isLoggedIn" @click="logout" class="hover:text-gray-300">Logout</button>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
    name: 'Header',
    data() {
        return {
            isLoggedIn: false, // Set this based on user authentication status
        };
    },
    methods: {
        logout() {
            // Implement logout logic here
            this.isLoggedIn = false;
        },
    },
};
</script>

<style scoped>
/* Add custom styles for the header if needed */
</style>
