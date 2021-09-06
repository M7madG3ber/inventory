<template>

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
        } else {
            User.logout();
            Toast.fire({
                icon: 'success',
                title: 'Logout successfuly'
            });
            this.$router.push({
                name: 'login'
            });
        }
    },
};
</script>

<style lang=""></style>
