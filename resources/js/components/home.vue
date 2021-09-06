<template>
<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row mb-3">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Employees</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ employees }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
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
            Toast.fire({
                icon: 'error',
                title: 'Access denied'
            })
            this.$router.push({
                name: 'login'
            });
        }
        this.getData();
    },
    data() {
        return {
            employees : 0
        }
    },
    methods: {
        getData() {
            axios
                .get("/api/home/info")
                .then((res) => {
                    this.employees = res.data.employees;
                })
                .catch(error=>{

                });
        },
    },
}
</script>

<style lang="">
    
</style>
