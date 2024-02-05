<template>
  <div class="flex">
    <Sidebar />
    <div class="flex-1 p-4">
      <h1 class="text-3xl font-semibold mb-4">Add Accommodation</h1>
      <form @submit.prevent="addAccommodation">
        <!-- Add your form fields for adding accommodation -->
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
          <input v-model="newAccommodation.name" type="text" id="name" name="name" class="mt-1 p-2 border rounded-md w-full" required />
        </div>
        <div class="mb-4">
          <label for="standard_rack_rate" class="block text-sm font-medium text-gray-700">Rack Rate:</label>
          <input v-model="newAccommodation.standard_rack_rate" type="number" id="standard_rack_rate" name="standard_rack_rate" class="mt-1 p-2 border rounded-md w-full" required />
        </div>
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
          <textarea v-model="newAccommodation.description" id="description" name="description" rows="4" class="mt-1 p-2 border rounded-md w-full" required></textarea>
        </div>
        <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
          <input @change="handleImageChange" type="file" id="image" name="image" class="mt-1 p-2 border rounded-md w-full" accept="image/*" required />
        </div>
        <div>
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Add Accommodation</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import Sidebar from '../Sidebar.vue';

const newAccommodation = ref({
  name: '',
  description: '',
  standard_rack_rate: '',
  image: null,
});

const handleImageChange = (event) => {
  const file = event.target.files[0];
  newAccommodation.value.image = file;
};

async function addAccommodation() {
  try {
    let formData = new FormData();
    formData.append('name', newAccommodation.value.name);
    formData.append('description', newAccommodation.value.description);
    formData.append('standard_rack_rate', newAccommodation.value.standard_rack_rate);
    formData.append('image', newAccommodation.value.image);

    const response = await axios.post('http://localhost:8000/api/accommodations', formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });

    console.log('Response from backend:', response.data);

    newAccommodation.value = {
      name: '',
      description: '',
      standard_rack_rate: '',
      image: null,
    };
  } catch (error) {
    console.error('Error adding accommodation:', error.response.data);
  }
}
</script>

