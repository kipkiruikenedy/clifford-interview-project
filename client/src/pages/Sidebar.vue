<template>
  <div class="bg-gray-800 text-white p-4 min-h-screen">
    <div class="text-xl font-semibold mb-4">Admin Dashboard</div>
    <ul>
      <li @click="navigateTo('dashboard')" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Dashboard</li>
      <li v-if="userRole === 'admin'" @click="navigateTo('accommodationList')" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Accommodations</li>
      <li @click="navigateTo('bookings')" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Bookings</li>
      <li v-if="userRole === 'admin'" @click="navigateTo('agents')" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Agents</li>
    </ul>
  </div>
</template>

<script>
export default {
    methods: {
        navigateTo(route) {
            this.$router.push({ name: route });
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
    computed: {
        userRole() {
            // Retrieve user role from local storage or Vuex state
            const user = JSON.parse(localStorage.getItem('user')) || {};
            return user.role || '';
        },
    },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
</style>
