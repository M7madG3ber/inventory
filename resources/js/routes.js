import login from "./components/auth/login.vue";

/**
 * Auth Routes
 */
import home from "./components/home.vue";
import logout from "./components/auth/logout.vue";

// Employees
import employees from "./components/employees/index.vue";
import createemployee from "./components/employees/create.vue";
import editemployee from "./components/employees/edit.vue";

export const routes = [
  {
    path: "/",
    component: login,
    name: "login",
  },

  /**
   * Auth Routes
   */
  {
    path: "/home",
    component: home,
    name: "home",
  },
  {
    path: "/logout",
    component: logout,
    name: "logout",
  },

  // Employees
  {
    path: "/employees",
    component: employees,
    name: "employees",
  },
  {
    path: "/create-employee",
    component: createemployee,
    name: "createemployee",
  },
  {
    path: "/edit-employee/:id",
    component: editemployee,
    name: "editemployee",
  },

  {
    path: "*",
    redirect: '/',
  },
];
