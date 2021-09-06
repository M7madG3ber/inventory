<template>
  <div>
    <div class="row">
      <div class="col-sm-12">
        <router-link to="/create-employee" class="btn btn-primary"
          >Add Employees</router-link
        >
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card shadow-sm my-5">
          <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
          >
            <h6 class="m-0 font-weight-bold text-primary">Employees List</h6>
            <input
              type="text"
              v-model="searchterm"
              class="form-control"
              style="width: 300px"
              placeholder="Search name here..."
            />
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Email</th>
                  <th>Salary</th>
                  <th>Joining Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="employee in filterEmployees" :key="employee.id">
                  <td>{{ employee.name }}</td>
                  <td>
                    <img :src="employee.photo" id="em_photo" />
                  </td>
                  <td>{{ employee.email }}</td>
                  <td>{{ employee.salary }}</td>
                  <td>{{ employee.joining_date }}</td>
                  <td>
                    <router-link
                      :to="{name: 'editemployee' ,params:{id: employee.id} }"
                      class="btn btn-sm btn-primary"
                    >Edit</router-link>

                    <a
                      style="color: white"
                      @click="deleteEmployee(employee.id)"
                      class="btn btn-sm btn-danger"
                      >Delete</a
                    >
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({
        name: "login",
      });
    }
    this.allEmployees();
  },
  data() {
    return {
      employees: [],
      searchterm: "",
    };
  },
  computed: {
    filterEmployees() {
      return this.employees.filter((employee) => {
        return employee.name.match(this.searchterm);
      });
    },
  },
  methods: {
    allEmployees() {
      let x = this;
      axios
        .get("api/employees")
        .then((res) => {
          this.employees = res.data;
        })
        .catch((error) => {
          Notification.error("Something Wrong!");
        });
    },
    deleteEmployee(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete("api/employees/" + id)
            .then(() => {
              this.employees = this.employees.filter((employee) => {
                return employee.id != id;
              });
            })
            .catch(() => {
              this.$router.push({
                name: "employees",
              });
            });
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
  },
};
</script>

<style>
#em_photo {
  height: 40px;
  width: 40px;
}
</style>
