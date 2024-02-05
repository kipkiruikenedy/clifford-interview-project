<template>
  <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="text-center">
      <h1 class="text-4xl font-bold mb-4 text-gray-800">Welcome to B2B Travel Platform</h1>
      <p class="text-lg text-gray-600 mb-8">Your premier platform for seamless accommodation bookings tailored for travel agents.</p>
      <router-link to="/accommodations" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full transition duration-300">
        Explore Accommodations
      </router-link>
    </div>

    <!-- Features Section -->
    <section class="mt-16 bg-white p-8 rounded-lg shadow-lg max-w-2xl">
      <h2 class="text-2xl font-bold mb-4 text-gray-800">Key Features</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Feature 1 -->
        <div class="flex items-center">
          <svg class="w-8 h-8 text-blue-500 mr-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7"></path>
          </svg>
          <p class="text-gray-800">Easy accommodation search and booking process.</p>
        </div>

        <!-- Feature 2 -->
        <div class="flex items-center">
          <svg class="w-8 h-8 text-blue-500 mr-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7"></path>
          </svg>
          <p class="text-gray-800">Multiple contract rates for flexible booking options.</p>
        </div>

        <!-- Feature 3 -->
        <div class="flex items-center">
          <svg class="w-8 h-8 text-blue-500 mr-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 19 5 5l-1.414 1.414L19 21.828z"></path>
          </svg>
          <p class="text-gray-800">User-friendly interface for travel agents.</p>
        </div>

        <!-- Feature 4 -->
        <div class="flex items-center">
          <svg class="w-8 h-8 text-blue-500 mr-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7"></path>
          </svg>
          <p class="text-gray-800">Secure authentication for travel agents.</p>
        </div>
      </div>
    </section>

    <!-- Call-to-Action Section -->
    <section class="mt-16 bg-blue-500 text-white p-8 rounded-lg shadow-lg max-w-2xl text-center">
      <h2 class="text-2xl font-bold mb-4">Join B2B Travel Platform Today!</h2>
      <p class="text-lg mb-8">Start exploring a world of convenient and reliable accommodation bookings for travel agents.</p>
      <router-link to="/register" class="bg-white text-blue-500 font-bold py-2 px-6 rounded-full transition duration-300 hover:bg-gray-100">
        Register Now
      </router-link>
    </section>
  </div>
</template>

<script>
export default {
  name: 'LandingPage',
};
</script>

<style scoped>
/* Add custom styles for the landing page if needed */
</style>
