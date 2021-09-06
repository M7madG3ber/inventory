require("./bootstrap");

/**
 * Import Vue
 */
import Vue from "vue";

/**
 * Import Vue Router
 */
import VueRouter from "vue-router";
Vue.use(VueRouter);
import { routes } from './routes'
const router = new VueRouter({
  mode: "history",
  routes,
});

/**
 * Sweet Alert
 */
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
window.Toast = Toast;

/**
 * Import User
 */
import User from './helpers/User';
window.User = User;

/**
 * Import Notification
 */
import Notification from './helpers/Notification';
window.Notification = Notification;

/**
 * Components
 */
import topbarname from "./components/topbarname.vue";

/**
 * Vue Object
 */
const app = new Vue({
  el: "#wrapper",
  components: {
    topbarname
  },
  router,
});
