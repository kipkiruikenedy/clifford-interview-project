import { createRouter, createWebHistory } from 'vue-router';
import LandingPage from './components/LandingPage.vue';
import About from './components/About.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import ForgotPassword from './components/Forgot-Password.vue';
import AccommodationList from './pages/accomodation/AccommodationList.vue';
import AccommodationDetails from './pages/accomodation/AccommodationDetails.vue';
import BookingForm from './pages/accomodation/BookingForm.vue';
import AdminDashboard from './pages/admin/AdminDashboard.vue';
import AdminViewBookings from './pages/admin/AdminViewBookings.vue';
import AdminViewAgents from './pages/admin/AdminViewAgents.vue';
import AdminViewAccomodations from './pages/admin/AdminViewAccomodations.vue';
import AdminAddAccommodation from './pages/admin/AdminAddAccommodation.vue';
import Profile from './pages/Profile.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: LandingPage,
      meta: { requiresAuth: false }
    },
    {
      path: '/about',
      name: 'about',
      component: About,
      meta: { requiresAuth: false }
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

    // Private routes
    {
      path: '/admin/accommodations',
      name: 'AdminViewAccomodations',
      component: AdminViewAccomodations,
      meta: { requiresAuth: true }
    },
    {
      path: '/add/accommodations',
      name: 'AdminAddAccomodations',
      component: AdminAddAccommodation,
      meta: { requiresAuth: true }
    },
    {
      path: '/accommodations',
      name: 'accommodationList',
      component: AccommodationList,
      meta: { requiresAuth: true }
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
      path: '/dashboard',
      name: 'dashboard',
      component: AdminDashboard,
      meta: { requiresAuth: true }
    },
    {
      path: '/bookings',
      name: 'bookings',
      component: AdminViewBookings,
      meta: { requiresAuth: true }
    },
    {
      path: '/agents',
      name: 'agents',
      component: AdminViewAgents,
      meta: { requiresAuth: true }
    },
    {
      path: '/profile',
      name: 'profile',
      component: Profile,
      meta: { requiresAuth: true }
    },
  ]
});

// Global before guard for authentication
router.beforeEach((to, from, next) => {
  // Check if user and tokens are in local storage
  const user = JSON.parse(localStorage.getItem('user'));
  const token = localStorage.getItem('token');
  const isAuthenticated = user && token;

  // Check if there are matched routes and if the meta field exists
  const requiresAuth = to.matched.length > 0 ? to.matched[0].meta.requiresAuth : false;

  console.log('Navigation to', to.path, 'requiresAuth:', requiresAuth, 'isAuthenticated:', isAuthenticated);

  if (requiresAuth && !isAuthenticated) {
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




