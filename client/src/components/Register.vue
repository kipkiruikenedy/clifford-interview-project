<script setup>
import { ref } from "vue";
import { useAuthStore } from '../stores/auth'

const authStore = useAuthStore();

const form = ref({
    first_name: "",
    last_name: "",
    phone_number: "",
    country: "",
    gender: "",
    email: "",
    password: "",
    password_confirmation: "",
});
</script>
<template>
    <Nav />
  <!-- ====== Forms Section Start -->
  <section class="bg-[#F4F7FF] py-20 lg:py-[120px]">
    <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div
            class="
              relative
              mx-auto
              max-w-[525px]
              overflow-hidden
              rounded-lg
              bg-white
              py-16
              px-10
              text-center
              sm:px-12
              md:px-[60px]
            "
          >
          <div class="bg-red-500 text-center rounded-lg py-1 text-white mb-3" v-if="authStore.errors.phone_number" >{{ authStore.errors.phone_number }}</div>
            <div class="mb-10 text-center md:mb-16">Create Agent Account </div>
            <form @submit.prevent="authStore.handleRegisterAgent(form)">
              <div class="mb-6">
                <input
                  type="text"
                  placeholder="First Name"
                  v-model="form.first_name"
                  required
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />
                <div v-if="authStore.errors.first_name" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.first_name
                  }}</span>
                </div>
              </div>
              <div class="mb-6">
                <input
                  type="text"
                  required
                  placeholder="Last Name"
                  v-model="form.last_name"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />
                <div v-if="authStore.errors.last_name" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.last_name
                  }}</span>
                </div>
              </div>
              <div class="mb-6">
                <input
                  type="number"
                  required
                  placeholder="phone number"
                  v-model="form.phone_number"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />
                <div v-if="authStore.errors.phone_number" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.phone_number
                  }}</span>
                </div>
              </div>
              <div class="mb-4 flex">
      <label for="gender" class="block text-gray-700 font-bold mb-2">Gender:</label>
      <select id="gender" v-model="form.gender" class="bg-gray-300 text-center ml-4 py-1 px-2 rounded-md">
        <option value="">Select your gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      <div v-if="authStore.errors.gender" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.gender
                  }}</span>
                </div>
    </div>
              <div class="mb-6">
                <input
                  type="text"
                  required
                  placeholder="Country"
                  v-model="form.country"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />
                <div v-if="authStore.errors.country" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.country
                  }}</span>
                </div>
              </div>
              <div class="mb-6">
                <input
                  type="email"
                  placeholder="Email"
                  v-model="form.email"
                  required
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />
                <div v-if="authStore.errors.email" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.email
                  }}</span>
                </div>
              </div>
              <div class="mb-6">
                <input
                  type="password"
                  placeholder="Password"
                  required
                  v-model="form.password"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />
                <div v-if="authStore.errors.password" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.password
                  }}</span>
                </div>

              </div>
              <div class="mb-6">
                <input
                  type="password"
                  required
                  placeholder="Password Confirmation"
                  v-model="form.password_confirmation"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />
                <div v-if="authStore.errors.password_confirmation" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.password_confirmation
                  }}</span>
                </div>
              </div>
              <div class="mb-10">
                <button
                  type="submit"
                  class="
                    w-full
                    px-4
                    py-3
                    bg-indigo-500
                    hover:bg-indigo-700
                    rounded-md
                    text-white
                  "
                >
                <div v-if="authStore.isLoading" >
                <v-progress-circular indeterminate color="amber"></v-progress-circular>
                </div>
                <div v-else>Register</div>
                </button>
              </div>
            </form>
            <p class="text-base text-[#adadad]">
              <router-link to="/login" class="text-primary hover:underline">
                Sign In
              </router-link>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>