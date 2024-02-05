<template>
  <div class="max-w-2xl mx-auto my-8 p-4 bg-white rounded-md shadow-lg">
    <h1 class="text-3xl font-semibold mb-6">Accommodation Details</h1>

    <!-- Loading state -->
    <div v-if="isLoading" class="text-gray-600">
      Loading...
    </div>

    <!-- Error state -->
    <div v-else-if="error" class="text-red-500">
      Error loading accommodation details.
    </div>

    <!-- Display details of the selected accommodation -->
    <div v-else class="space-y-4">
      <h2 class="text-2xl font-semibold">{{ accommodation.name }}</h2>

      <!-- Display the image -->
      <img
        :src="accommodation.image_url"
        :alt="accommodation.name"
        class="w-full h-48 object-cover rounded-md"
      />

      <p class="text-gray-700">{{ accommodation.description }}</p>
      <p class="text-green-500 font-semibold">Standard Rack Rate: ${{ accommodation.standard_rack_rate }}</p>

      <!-- Add more details as needed -->

      <router-link to="/booking-form" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Book Now</router-link>
    </div>
  </div>
</template>



<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const accommodation = ref(null);
const isLoading = ref(true);
const error = ref(null);

const fetchAccommodationDetails = async () => {
  try {
    const route = useRoute();
    const accommodationId = route.params.id;

    // Fetch accommodation details from the backend
    const response = await axios.get(`/api/accommodations/${accommodationId}`); // Update the endpoint based on your Laravel routes
    accommodation.value = response.data;
  } catch (error) {
    console.error('Error fetching accommodation details:', error);
    // Set the error state
    error.value = error.message;
  } finally {
    // Set loading to false once the request is complete
    isLoading.value = false;
  }
};

onMounted(fetchAccommodationDetails);
</script>



