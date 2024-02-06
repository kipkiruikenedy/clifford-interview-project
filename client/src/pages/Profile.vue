<template>
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-semibold mb-4">User Profile</h1>
    <div>
      <h2 class="text-xl font-semibold mb-2">User Details:</h2>
      <p><strong>First Name:</strong> {{ user.first_name }}</p>
      <p><strong>Last Name:</strong> {{ user.last_name }}</p>
      <p><strong>Email:</strong> {{ user.email }}</p>
      <p><strong>Phone:</strong> {{ user.phone }}</p>
      <!-- Add more user details as needed -->
    </div>
    <!-- You can add more sections for additional user information or actions -->
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const user = ref({
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    // Add more user details as needed
});

onMounted(() => {
    // Fetch user details from localStorage
    const storedUser = JSON.parse(localStorage.getItem('user'));
    if (storedUser) {
        user.value = storedUser;
    }
});
</script>
