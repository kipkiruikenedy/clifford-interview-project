<!-- src/views/AdminViewAgents.vue -->

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
              <!-- Add more headers as needed -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="agent in agents" :key="agent.id">
              <td class="border border-gray-300 px-4 py-2">{{ agent.id }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ agent.name }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ agent.email }}</td>
              <td class="border border-gray-300 px-4 py-2">
                <button @click="viewDetails(agent.id)" class="text-blue-500">View Details</button>
                <button @click="editAgent(agent.id)" class="text-yellow-500 ml-2">Edit</button>
                <button @click="deleteAgent(agent.id)" class="text-red-500 ml-2">Delete</button>
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
      agents: [
        // Replace with actual agent data or fetch from an API
        { id: 1, name: 'John Doe', email: 'john.doe@example.com' },
        { id: 2, name: 'Jane Smith', email: 'jane.smith@example.com' },
        // Add more agents as needed
        ],
    };
  },
  methods: {
    viewDetails(agentId) {
      // Implement logic to view details of the agent with the given ID
      console.log('View Details for Agent ID:', agentId);
    },
    editAgent(agentId) {
      // Implement logic to edit the agent with the given ID
      console.log('Edit Agent ID:', agentId);
    },
    deleteAgent(agentId) {
      // Implement logic to delete the agent with the given ID
      console.log('Delete Agent ID:', agentId);
    },
  },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
</style>
