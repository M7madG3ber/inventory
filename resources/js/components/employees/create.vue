<template>
<div>

    <div class="row">
        <div class="col-sm-12">
            <router-link to="/employees" class="btn btn-primary">All Employees</router-link>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Empolyee</h1>
                                </div>

                                <form @submit.prevent="createEmployee" enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter Name" v-model="form.name" />
                                                <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter Email" v-model="form.email" />
                                                <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" class="form-control" placeholder="Enter Salary" v-model="form.salary" />
                                                <small class="text-danger" v-if="errors.salary">{{ errors.salary[0] }}</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" class="form-control" placeholder="Enter Joining Date" v-model="form.joining_date" />
                                                <small class="text-danger" v-if="errors.joining_date">{{ errors.joining_date[0] }}</small>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" @change="uploadImage" />

                                                    <small class="text-danger" v-if="errors.photo">{{ errors.photo[0] }}</small>

                                                    <label class="custom-file-label" for="customFile">Choose Photo</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <img v-show="form.photo" :src="form.photo" style="height: 40px; width: 40px">
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Save
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
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
                name: 'login'
            });
        }
    },
    data() {
        return {
            form: {
                name: null,
                email: null,
                salary: null,
                joining_date: null,
                photo: null,
            },
            errors: {}
        }
    },
    methods: {
        uploadImage: function (event) {
            var x = this;
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.error('Upload Images Less Than 1MB');
            } else {
                let reader = new FileReader();
                reader.onload = function (event) {
                    x.form.photo = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        createEmployee: function () {
            axios.post('/api/employees', this.form)
                .then(res => {
                    Notification.success('Added Successfuly');
                    this.$router.push({
                        name: 'employees'
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    Notification.error('Something Wrong!');
                });
        }
    },
}
</script>
