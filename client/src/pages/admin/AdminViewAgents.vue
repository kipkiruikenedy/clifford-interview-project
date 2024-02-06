<template>
  <div class="flex">
    <Sidebar />
    <div class="flex-1 p-4">
      <h1 class="text-3xl font-semibold mb-4">Agents</h1>
      <div v-if="agents.length === 0" class="text-gray-600">No agents available.</div>
      <div v-else>
        <!-- Display agents in a table -->
        <table class="min-w-full border border-gray-300">
          <thead>
            <tr>
              <th class="border border-gray-300 px-4 py-2">ID</th>
              <th class="border border-gray-300 px-4 py-2">Name</th>
              <th class="border border-gray-300 px-4 py-2">Email</th>
              <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="agent in agents" :key="agent.id">
              <td class="border border-gray-300 px-4 py-2">{{ agent.id }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ agent.name }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ agent.email }}</td>
              <td class="border border-gray-300 px-4 py-2">
                <button @click="viewDetails(agent)" class="text-blue-500">View Details</button>
                <button @click="editAgent(agent)" class="text-yellow-500 ml-2">Edit</button>
                <button @click="deleteAgent(agent)" class="text-red-500 ml-2">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- View Details Modal -->
      <div v-if="selectedAgent" class="modal-overlay">
        <div class="modal details-modal-content">
          <h2>Agent Details</h2>
          <p>ID: {{ selectedAgent.id }}</p>
          <p>Name: {{ selectedAgent.first_name }} {{ selectedAgent.last_name }}</p>
          <p>Email: {{ selectedAgent.email }}</p>
          <p>Email: {{ selectedAgent.phone }}</p>
          <p>Active since: {{ selectedAgent.created_at }}</p>

          <!-- Display Bookings -->
          <div v-if="selectedAgent.bookings && selectedAgent.bookings.length > 0" class="details-modal-bookings">
            <h3>Bookings:</h3>
            <ul>
              <li v-for="booking in selectedAgent.bookings" :key="booking.id">
                <strong>{{ booking.date }}</strong> - {{ booking.description }}
              </li>
            </ul>
          </div>

          <!-- Enable Editing -->
          <button @click="editAgent(selectedAgent)" class="mt-4 bg-blue-500 text-white px-3 py-2 rounded">Edit Agent</button>

          <button @click="closeModal" class="mt-4 bg-gray-300 text-gray-700 px-3 py-2 rounded">Close</button>
        </div>
      </div>

      <!-- Edit Modal -->
      <div v-if="selectedAgentForEdit" class="modal-overlay">
        <div class="modal">
          <h2>Edit Agent</h2>
          <form @submit.prevent="updateAgent">
            <label for="editFirstName">First Name:</label>
            <input v-model="selectedAgentForEdit.first_name" type="text" id="editFirstName" required>

            <label for="editLastName">Last Name:</label>
            <input v-model="selectedAgentForEdit.last_name" type="text" id="editLastName" required>

            <label for="editEmail">Email:</label>
            <input v-model="selectedAgentForEdit.email" type="email" id="editEmail" required>

            <label for="editPhone">Phone:</label>
            <input v-model="selectedAgentForEdit.phone" type="text" id="editPhone" required>

            <!-- Add more fields as needed -->

            <button type="submit" class="mt-4 bg-blue-500 text-white px-3 py-2 rounded">Save Changes</button>
            <button @click="closeModal" class="mt-4 bg-gray-300 text-gray-700 px-3 py-2 rounded">Close</button>
          </form>
        </div>
      </div>

      <!-- Delete Modal -->
      <div v-if="selectedAgentForDelete" class="modal-overlay">
        <div class="modal">
          <h2>Delete Agent</h2>
          <!-- Delete confirmation or content here -->
          <!-- ... -->
          <button @click="closeModal" class="mt-4 bg-gray-300 text-gray-700 px-3 py-2 rounded">Close</button>
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
      agents: [],
      selectedAgent: null,
      selectedAgentForEdit: null,
      selectedAgentForDelete: null,
    };
  },
  created() {
    // Fetch agents from the backend when the component is created
    this.fetchAgents();
  },
  methods: {
    async fetchAgents() {
      try {
        const response = await axios.get('http://localhost:8000/api/agents');
        this.agents = response.data;
      } catch (error) {
        console.error('Error fetching agents:', error.response.data);
      }
    },
    viewDetails(agent) {
      this.selectedAgent = agent;
    },
    editAgent(agent) {
      // Set the selected agent for edit
      this.selectedAgentForEdit = agent;
      axios.put(`http://localhost:8000/api/agents/${this.selectedAgentForEdit.id}`, this.selectedAgentForEdit)
        .then(response => {
          console.log('Agent updated successfully:', response.data);
          // Close the modal after successful update
          this.closeModal();

          this.fetchAgents();
        })
        .catch(error => {
          console.error('Error updating agent:', error.response.data);
        });
    },
    deleteAgent(agent) {
      // Set the selected agent for delete
      this.selectedAgentForDelete = agent;

      // Log the selected agent for delete
      console.log('Delete Agent:', this.selectedAgentForDelete);

      // Optionally, you can show a confirmation modal here
      // and proceed with the deletion upon confirmation
      // ...

      // Perform the delete request to the server
      axios.delete(`http://localhost:8000/api/agents/${this.selectedAgentForDelete.id}`)
    .then(response => {
      console.log('Agent deleted successfully:', response.data);
      // Close the modal after successful deletion
      this.closeModal();
      // Optionally, you can fetch updated agents from the server
      this.fetchAgents();
    })
    .catch(error => {
      console.error('Error deleting agent:', error.response.data);
    });
    },
    
    closeModal() {
      this.selectedAgent = null;
      this.selectedAgentForEdit = null;
      this.selectedAgentForDelete = null;
    },
  },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal {
  background: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.details-modal-content {
  max-width: 400px;
}

.details-modal-bookings {
  margin-top: 16px;
}

.details-modal-bookings h3 {
  margin-bottom: 8px;
}

.details-modal-bookings ul {
  list-style: none;
  padding: 0;
}

.details-modal-bookings li {
  margin-bottom: 8px;
}

/* Add more styles as needed */
</style>
