
<template>
  <div class="flex">
    <Sidebar />
    <div class="flex-1 p-4">
      <h1 class="text-3xl font-semibold mb-4">Accommodations</h1>
      <router-link to="/admin/add/accommodations" class="bg-green-600 p-1 rounded m-2">Add new Accomodation</router-link>
      <div v-if="accommodations.length === 0" class="text-gray-600">No accommodations available.</div>
      <div v-else>
        <!-- Display accommodations in a table -->
        <table class="min-w-full border border-gray-300">
          <thead>
            <tr>
              <th class="border border-gray-300 px-4 py-2">ID</th>
              <th class="border border-gray-300 px-4 py-2">Name</th>
              <th class="border border-gray-300 px-4 py-2">Description</th>
              <th class="border border-gray-300 px-4 py-2">Actions</th>
              <!-- Add more headers as needed -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="accommodation in accommodations" :key="accommodation.id">
              <td class="border border-gray-300 px-4 py-2">{{ accommodation.id }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ accommodation.name }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ accommodation.description }}</td>
              <td class="border border-gray-300 px-4 py-2">
                <button @click="viewDetails(accommodation.id)" class="text-blue-500">View Details</button>
                <button @click="editAccommodation(accommodation.id)" class="text-yellow-500 ml-2">Edit</button>
                <button @click="deleteAccommodation(accommodation.id)" class="text-red-500 ml-2">Delete</button>
              </td>
              <!-- Add more cells as needed -->
            </tr>
          </tbody>
        </table>
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
      accommodations: [
        // Replace with actual accommodation data or fetch from an API
        { id: 1, name: 'Hotel ABC', description: 'Luxurious hotel with great amenities.' },
        { id: 2, name: 'Resort XYZ', description: 'Seaside resort with stunning views.' },
        // Add more accommodations as needed
        ],
    };
  },
  methods: {
    viewDetails(accommodationId) {
      // Implement logic to view details of the accommodation with the given ID
      console.log('View Details for Accommodation ID:', accommodationId);
    },
    editAccommodation(accommodationId) {
      // Implement logic to edit the accommodation with the given ID
      console.log('Edit Accommodation ID:', accommodationId);
    },
    deleteAccommodation(accommodationId) {
      // Implement logic to delete the accommodation with the given ID
      console.log('Delete Accommodation ID:', accommodationId);
    },
  },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
</style>
