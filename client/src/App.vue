<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
</script>

<template>
<div>
<Header />
</div>
<div>
 <RouterView />
</div>
<div>
  <Footer />
</div>



</template>


