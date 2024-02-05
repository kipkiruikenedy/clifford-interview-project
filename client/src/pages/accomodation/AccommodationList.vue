<template>
  <div class="max-w-4xl mx-auto p-8">
    <h1 class="text-4xl font-bold mb-8">Explore Our Accommodations</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      <div v-for="accommodation in accommodations" :key="accommodation.id">
        <router-link
          :to="{ name: 'accommodationDetails', params: { id: accommodation.id }}"
          class="block relative overflow-hidden rounded-lg shadow-md hover:shadow-lg transition-transform transform hover:scale-105"
        >
         <img
  :src="accommodation.image_url"
  :alt="accommodation.name"
  class="w-full h-48 object-cover"
/>
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">{{ accommodation.name }}</h2>
            <!-- Add more details if needed -->
            <p class="text-gray-700">{{ accommodation.description }}</p>
            <p class="text-gray-600 mt-2">${{ accommodation.standard_rack_rate }}</p>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const accommodations = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('/api/accommodations'); // Update the endpoint based on your Laravel routes
    accommodations.value = response.data;
  } catch (error) {
    console.error('Error fetching accommodations:', error);
    // Handle errors as needed
  }
});
</script>

<style scoped>
/* Add your custom styles or overrides here */
</style>
