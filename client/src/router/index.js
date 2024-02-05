import { createRouter, createWebHistory } from 'vue-router';
import LandingPage from '../components/LandingPage.vue';
import About from '../components/About.vue';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';
import ForgotPassword from '../components/Forgot-Password.vue';
import AccommodationList from '../pages/accomodation/AccommodationList.vue';
import AccommodationDetails from '../pages/accomodation/AccommodationDetails.vue';
import BookingForm from '../pages/accomodation/BookingForm.vue';
import AdminDashboard from '../pages/admin/AdminDashboard.vue';
import AdminViewBookings from '../pages/admin/AdminViewBookings.vue';
import AdminViewAgents from '../pages/admin/AdminViewAgents.vue';
import AdminViewAccommodations from '../pages/admin/AdminViewAccomodations.vue';
import AdminAddAccommodation from '../pages/admin/AdminAddAccommodation.vue';
import ViewBookings from '../pages/agent/ViewBookings.vue';
import ViewBookingById from '../pages/agent/ViewBookingById.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: LandingPage
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: { requiresAuth: false }
    },
    {
      path: '/register',
      name: 'register',
      component: Register,
      meta: { requiresAuth: false }
    },
    {
      path: '/forgot-password',
      name: 'forgot-password',
      component: ForgotPassword,
      meta: { requiresAuth: false }
    },
    {
      path: '/accommodations',
      name: 'accommodationList',
      component: AccommodationList,
      meta: { requiresAuth: true } // Example of a route that requires authentication
    },
    {
      path: '/accommodation/:id',
      name: 'accommodationDetails',
      component: AccommodationDetails,
      props: true,
      meta: { requiresAuth: true }
    },
    {
      path: '/booking-form',
      name: 'bookingForm',
      component: BookingForm,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/dashboard',
      name: 'admin-dashboard',
      component: AdminDashboard,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/bookings',
      name: 'adminbookings',
      component: AdminViewBookings,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/agents',
      name: 'adminagent',
      component: AdminViewAgents,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/accommodations',
      name: 'adminaccomodation',
      component: AdminViewAccommodations,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/add/accommodations',
      name: 'addadminaccomodation',
      component: AdminAddAccommodation,
      meta: { requiresAuth: true }
    },
    {
      path: '/agent/bookings',
      name: 'agentaccomodation',
      component: ViewBookings,
   
    },
    {
      path: '/admin/accommodations', // This seems to be a duplicate route, please double-check
      name: 'agentaccomodation',
      component: ViewBookingById,
      meta: {
        requiresAuth: true,
      },
    },
    ]
});



// Global before guard for authentication
router.beforeEach((to, from, next) => {
  // Hardcoded for testing purposes
  const isAuthenticated = true;

  console.log('Navigation to', to.path, 'requiresAuth:', to.meta.requiresAuth, 'isAuthenticated:', isAuthenticated);

  if (to.meta.requiresAuth && !isAuthenticated) {
    // Redirect to the login page if authentication is required and the user is not authenticated
    console.log('Redirecting to /login');
    next('/login');
  } else {
    // Continue with the navigation
    console.log('Continuing with navigation');
    next();
  }
});
export default router;
