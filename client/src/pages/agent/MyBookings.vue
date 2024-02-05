
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
              <th class="border border-gray-300 px-4 py-2">Customer Name</th>
              <th class="border border-gray-300 px-4 py-2">Accommodation</th>
              <th class="border border-gray-300 px-4 py-2">Check-in Date</th>
              <th class="border border-gray-300 px-4 py-2">Check-out Date</th>
              <th class="border border-gray-300 px-4 py-2">Actions</th>
              <!-- Add more headers as needed -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="booking in bookings" :key="booking.id">
              <td class="border border-gray-300 px-4 py-2">{{ booking.id }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.customerName }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.accommodation }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.checkinDate }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ booking.checkoutDate }}</td>
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
            <p><strong>Customer Name:</strong> {{ selectedBooking.customerName }}</p>
            <p><strong>Accommodation:</strong> {{ selectedBooking.accommodation }}</p>
            <p><strong>Check-in Date:</strong> {{ selectedBooking.checkinDate }}</p>
            <p><strong>Check-out Date:</strong> {{ selectedBooking.checkoutDate }}</p>
            <button @click="closeModal" class="mt-4">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from '../Sidebar.vue';

export default {
    components: {
        Sidebar,
    },
    data() {
        return {
            bookings: [
                // Replace with actual booking data or fetch from an API
                { id: 1, customerName: 'John Doe', accommodation: 'Hotel ABC', checkinDate: '2024-02-01', checkoutDate: '2024-02-05' },
                { id: 2, customerName: 'Jane Smith', accommodation: 'Resort XYZ', checkinDate: '2024-02-10', checkoutDate: '2024-02-15' },
                // Add more bookings as needed
                ],
            selectedBooking: null,
        };
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
    },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
</style>
