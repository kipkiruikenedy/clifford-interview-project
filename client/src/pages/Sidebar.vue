
<template>
  <div class="bg-gray-800 text-white  p-4 min-h-screen">
    <div class="text-xl font-semibold mb-4">Admin Dashboard</div>
    <ul>
      <li @click="navigateTo('admin-dashboard')" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Dashboard</li>
       <li @click="navigateTo('adminaccomodation')" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Accomodations</li>
      <li @click="navigateTo('adminbookings')" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Bookings</li>
      <li @click="navigateTo('adminagent')" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Agents</li>
      <li @click="logout" class="cursor-pointer bg-green-600 hover:bg-green-700 rounded py-1 px-1 my-1">Logout</li>
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
            // Implement logout logic
        },
    },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
</style>
