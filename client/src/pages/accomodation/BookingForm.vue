<template>
  <div class="container mx-auto p-4 min-h-screen">
    <form @submit.prevent="submitBooking" class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
      <h2 class="text-2xl font-semibold mb-6">Book Accommodation</h2>

      <div class="mb-4">
        <label for="travelAgent" class="block text-sm font-medium text-gray-700">Travel Agent:</label>
        <select v-model="selectedTravelAgent" @change="fetchContractRates" class="mt-1 p-2 border rounded-md w-full">
          <option v-for="agent in travelAgents" :key="agent.id" :value="agent.id">{{ agent.name }}</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date:</label>
        <vue3-datepicker v-model="startDate" class="mt-1 p-2 border rounded-md w-full" :disabled-dates="disablePastDates"></vue3-datepicker>
      </div>

      <div class="mb-6">
        <label for="endDate" class="block text-sm font-medium text-gray-700">End Date:</label>
        <vue3-datepicker v-model="endDate" class="mt-1 p-2 border rounded-md w-full" :disabled-dates="disablePastDates"></vue3-datepicker>
      </div>

      <!-- Add other form fields as needed -->

      <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit Booking</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import Vue3Datepicker from 'vue3-datepicker';

const selectedTravelAgent = ref(null);
const startDate = ref(null);
const endDate = ref(null);
const travelAgents = ref([]); // Fetch this from your Laravel backend

// Function to disable past dates
const disablePastDates = (date) => {
  const today = new Date();
  today.setHours(0, 0, 0, 0);
  return date < today;
};

// Fetch contract rates when the selected travel agent changes
const fetchContractRates = async () => {
  if (selectedTravelAgent.value) {
    try {
      // Fetch and display contract rates based on the selected travel agent
      const response = await axios.get(`/api/contract-rates/${selectedTravelAgent.value}`);
      // Handle the response and update your component state accordingly
    } catch (error) {
      console.error('Error fetching contract rates:', error.response.data);
    }
  }
};

// Submit booking details to the backend
const submitBooking = async () => {
  try {
    // Validate form fields before submitting (add validation logic as needed)
    if (!selectedTravelAgent.value || !startDate.value || !endDate.value) {
      console.error('Please fill in all required fields.');
      return;
    }

    // Implement the logic to submit the booking details to your Laravel backend
    const response = await axios.post('/api/bookings', {
      travel_agent_id: selectedTravelAgent.value,
      start_date: startDate.value,
      end_date: endDate.value,
      // Add other form fields as needed
    });

    // Handle the response from the backend
    console.log('Booking submitted successfully:', response.data);

    // Reset form fields after submission
    selectedTravelAgent.value = null;
    startDate.value = null;
    endDate.value = null;
    // Reset other form fields as needed
  } catch (error) {
    console.error('Error submitting booking:', error.response.data);
  }
};
</script>

<style scoped>
/* Add your custom styles if needed */
</style>
