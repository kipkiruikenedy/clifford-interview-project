
<template>
  <div class="bg-white p-4 rounded-md shadow-md">
    <div class="text-lg font-semibold mb-2">{{ title }}</div>
    <div class="text-3xl font-bold">{{ value }}</div>
  </div>
</template>

<script>
export default {
    props: {
        title: String,
        value: Number,
    },
};
</script>

<style scoped>
/* Add your Tailwind CSS styles here */
</style>
