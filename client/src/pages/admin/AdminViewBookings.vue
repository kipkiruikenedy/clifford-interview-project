<template>
  <div class="flex">
    <Sidebar />
    <div class="flex-1 p-4">
      <h1 class="text-3xl font-semibold mb-4">Bookings</h1>
      <div v-if="bookings.length === 0" class="text-gray-600">No bookings available.</div>
      <div v-else>
        <!-- Display bookings in a table -->
        <table class="min-w-full border border-gray-300">
          <thead>
            <tr>
              <th class="border border-gray-300 px-4 py-2">ID</th>
              <th class="border border-gray-300 px-4 py-2">Contract Rates</th>
              <th class="border border-gray-300 px-4 py-2">Start Date</th>
              <th class="border border-gray-300 px-4 py-2">End Date</th>
              <th class="border border-gray-300 px-4 py-2">Accommodation ID</th>
              <th class="border border-gray-300 px-4 py-2">User ID</th>
              <th class="border border-gray-300 px-4 py-2">Actions</th>
              <!-- Add more headers as needed -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="booking in filteredBookings" :key="booking.id">
              <td class="border border-gray-300 px-4 py-2">{{ booking.id }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.contract_rates }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.start_date }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.end_date }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.accommodation_id }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.user_id }}</td>
              <td class="border border-gray-300 px-4 py-2">
                <button @click="showMoreInfo(booking.id)" class="text-blue-500">More Info</button>
                <button @click="editBooking(booking.id)" class="text-yellow-500 ml-2">Edit</button>
                <button @click="deleteBooking(booking.id)" class="text-red-500 ml-2">Delete</button>
              </td>
              <!-- Add more cells as needed -->
            </tr>
          </tbody>
        </table>

        <!-- Modal for displaying more information -->
        <div v-if="selectedBooking" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
          <div class="bg-white p-8 rounded-md">
            <h2 class="text-2xl font-semibold mb-4">Booking Details</h2>
            <p><strong>ID:</strong> {{ selectedBooking.id }}</p>
            <p><strong>Contract Rates:</strong> {{ selectedBooking.contract_rates }}</p>
            <p><strong>Start Date:</strong> {{ selectedBooking.start_date }}</p>
            <p><strong>End Date:</strong> {{ selectedBooking.end_date }}</p>
            <p><strong>Accommodation ID:</strong> {{ selectedBooking.accommodation_id }}</p>
            <p><strong>User ID:</strong> {{ selectedBooking.user_id }}</p>
            <button @click="closeModal" class="mt-4">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from '../Sidebar.vue';
import axios from 'axios';

export default {
  components: {
    Sidebar,
  },
  data() {
    return {
      bookings: [],
      selectedBooking: null,
      loggedInUserId: '', // Store logged-in user's ID
    };
  },
  async mounted() {
    try {
      const response = await axios.get('http://localhost:8000/api/contracts');
      this.bookings = response.data;

      // Get logged-in user's ID from local storage
      this.loggedInUserId = localStorage.getItem('user_id');
    } catch (error) {
      console.error('Error fetching bookings:', error);
    }
  },
  computed: {
    filteredBookings() {
      // Get the user data from local storage
      const userData = JSON.parse(localStorage.getItem('user'));

      // If the user is an admin, show all bookings
      if (this.isAdmin()) {
        return this.bookings;
      }

      // If the user is not an admin, filter bookings by user ID
      return this.bookings.filter(booking => booking.user_id === userData.id);
    }
    
  },
  methods: {
    showMoreInfo(bookingId) {
      this.selectedBooking = this.bookings.find(booking => booking.id === bookingId);
    },
    editBooking(bookingId) {
      // Implement logic to edit the booking with the given ID
      console.log('Edit Booking ID:', bookingId);
    },
    deleteBooking(bookingId) {
      // Implement logic to delete the booking with the given ID
      console.log('Delete Booking ID:', bookingId);
    },
    closeModal() {
      this.selectedBooking = null;
    },
    isAdmin() {
      // Get the user data from local storage
      const userData = JSON.parse(localStorage.getItem('user'));
      // Check if the role is 'admin'
      return userData && userData.role === 'admin';
    }

  },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
</style>
