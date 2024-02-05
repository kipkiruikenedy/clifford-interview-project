<template>
  <header class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      <router-link to="/" class="text-xl font-bold">B2B Travel</router-link>
      <nav class="space-x-4">
        <router-link v-if="!isLoggedIn" to="/" class="hover:text-gray-300">Home</router-link>
        <router-link to="/accommodations" class="hover:text-gray-300">Accommodations</router-link>
        <router-link v-if="!isLoggedIn" to="/about" class="hover:text-gray-300">About Me</router-link>
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
    created() {
        // Check if the user is logged in when the component is created
        this.isLoggedIn = this.checkAuthenticationStatus();
    },
    methods: {
        checkAuthenticationStatus() {
            // Implement logic to check if both user and tokens are present in local storage
            const token = localStorage.getItem('token');
            const user = localStorage.getItem('user');
            return !!token && !!user; // Returns true if both token and user are present, false otherwise
        },
        logout() {
            // Implement logout logic here
            // For example, clear the token and user from local storage
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            // Update isLoggedIn to false
            this.isLoggedIn = false;
            // Redirect to the login page or another appropriate page
            this.$router.push('/login');
        },
    },
};
</script>

<style scoped>
/* Add custom styles for the header if needed */
</style>
