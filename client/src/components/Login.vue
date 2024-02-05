
<script setup>
import { useAuthStore } from '../stores/auth'
import { useRouter } from 'vue-router'
import { ref } from 'vue'

import Swal from 'sweetalert2'

const authStore = useAuthStore()
const router = useRouter()

const form = ref({
    email: "",
    password: "",
});



const showLoginError = () => {
    Swal.fire({
        icon: 'error',
        title: 'Login Error',
        text: authStore.authError,
    })
}
</script>


<template>
 
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

    <!-- ERROR -->
    <div v-if="authStore.errors.error" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.error
                  }}</span>
                </div>

            <div class="mb-10 text-center md:mb-16"> Travel Agents and Accommodation</div>


            <form @submit.prevent="async () => {
                authStore.login(form)
                if (authStore.authError) {
                    showLoginError()
                }
            }" >
              <div class="mb-6">
                <input
                  type="email"
                  v-model="form.email"
                  placeholder="Email"
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
                <!-- <div v-if="authStore.errors.email" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.email[0]
                  }}</span>
                </div> -->
              </div>
              <div class="mb-6">
                <input
                  type="password"
                  v-model="form.password"
                  placeholder="Password"
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
                <div v-if="authStore.errors.password" class="flex">
                  <span class="text-red-400 text-sm m-2 p-2">{{
                    authStore.errors.password[0]
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
                <div v-else>Login</div>


                </button>
              </div>
            </form>
            <router-link
              to="/forgot-password"
              class="
                mb-2
                inline-block
                text-base text-[#adadad]
                hover:text-primary hover:underline
              "
            >
              Forgot Password?
            </router-link>
            <p class="text-base text-[#adadad]">
              Not a member yet?
              <router-link to="/register" class="text-primary hover:underline">
                Sign Up 
              </router-link>
            </p>

          </div>
        </div>
      </div>
    </div>
  </section>
</template>