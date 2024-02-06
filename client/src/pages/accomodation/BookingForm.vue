<template>
  <div class="container mx-auto mt-8 p-4">
    <h2 class="text-3xl font-semibold mb-6">Booking Form</h2>
    <router-link to="/dashboard" class=" bg-blue-900 rounded p-1 text-white hover:text-blue-700">Go back to dashboard</router-link>

    <!-- Travel Agent Information -->
    <div class="mb-8">
      <label class="block text-sm font-medium text-gray-700">Travel Agent:</label>
      <div class="mt-2">
        <span class="block font-semibold">{{ loggedInAgent.first_name }} {{ loggedInAgent.last_name }}</span>
        <span class="block">{{ loggedInAgent.email }}</span>
      </div>
    </div>

    <!-- Booking Details -->
    <div class="mb-6">
      <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date:</label>
      <vue3-datepicker v-model="bookingForm.startDate" class="mt-1 p-2 border rounded-md w-full" :disabled-dates="disablePastDates"></vue3-datepicker>
    </div>

    <div class="mb-6">
      <label for="endDate" class="block text-sm font-medium text-gray-700">End Date:</label>
      <vue3-datepicker v-model="bookingForm.endDate" class="mt-1 p-2 border rounded-md w-full" :disabled-dates="disablePastDates"></vue3-datepicker>
    </div>

    <!-- Contract Selection -->
    <div class="mb-6">
      <label for="contract" class="block text-sm font-medium text-gray-700">Select Contract:</label>
      <select v-model="bookingForm.contract" id="contract" name="contract" class="mt-1 p-2 border rounded-md w-full" required>
        <!-- Populate the options dynamically based on available contracts -->
        <option v-for="contract in contracts" :key="contract.id" :value="contract.id">{{ contract.name }}</option>
      </select>
    </div>

    <!-- Submit Button -->
    <button @click="submitBooking" class="px-4 py-2 bg-blue-500 text-white rounded-md">Submit Booking</button>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Vue3Datepicker from 'vue3-datepicker';
import axios from 'axios';

const bookingForm = ref({
  startDate: '',
  endDate: '',
  contract: null,
});

const loggedInAgent = JSON.parse(localStorage.getItem('user'));

const contracts = ref([]);

const disablePastDates = (date) => {
  const today = new Date();
  return date < today;
};

const submitBooking = () => {
  // Implement the logic to submit the booking details to the backend
  console.log('Booking Form submitted:', bookingForm.value);
  // You can use axios or fetch API to make a POST request to your backend
};

// Fetch contracts from the backend on component mount
onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/accommodations');
    contracts.value = response.data;
  } catch (error) {
    console.error('Error fetching contracts:', error);
  }
});
</script>

<style scoped>
/* Add your custom styles here */
/* Example: */
.container {
  max-width: 600px;
  margin: auto;
}

/* Add more styles as needed */
</style>
