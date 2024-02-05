
<template>
  <div>
    <div class="flex mb-4">
      <SummaryCard title="Total Agents" :value="totalAgents" />
      <SummaryCard title="Total Bookings" :value="totalBookings" />
      <SummaryCard title="Total Accommodations" :value="totalAccommodations" />
    </div>
    <!-- Your other content for the dashboard goes here -->
  </div>
</template>

<script>
import SummaryCard from './SummaryCard.vue';

export default {
    components: {
        SummaryCard,
    },
    data() {
        return {
            totalAgents: 100, // Replace with actual data or fetch from an API
            totalBookings: 500, // Replace with actual data or fetch from an API
            totalAccommodations: 200, // Replace with actual data or fetch from an API
        };
    },
};
</script>
