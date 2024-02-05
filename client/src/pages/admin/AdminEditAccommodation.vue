<template>
  <div class="flex">
    <Sidebar />
    <div class="flex-1 p-4">
      <h1 class="text-3xl font-semibold mb-4">Edit Accommodation</h1>
      <form @submit.prevent="editAccommodation">
        <!-- Populate form fields with existing data -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
          <input v-model="editedAccommodation.name" type="text" id="name" name="name" class="mt-1 p-2 border rounded-md w-full" required>
        </div>
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
          <textarea v-model="editedAccommodation.description" id="description" name="description" rows="4" class="mt-1 p-2 border rounded-md w-full" required></textarea>
        </div>
        <!-- Add more form fields as needed -->
        <div>
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Sidebar from '../components/AdminSidebar.vue';

export default {
    components: {
        Sidebar,
    },
    data() {
        return {
            editedAccommodation: {
                id: 1, // Replace with the actual accommodation ID
                name: 'Hotel ABC', // Replace with the actual name
                description: 'Luxurious hotel with great amenities.', // Replace with the actual description
                // Add more fields as needed
            },
        };
    },
    methods: {
        editAccommodation() {
            // Implement logic to edit the existing accommodation with this.editedAccommodation data
            console.log('Editing Accommodation:', this.editedAccommodation);
        },
    },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
</style>
