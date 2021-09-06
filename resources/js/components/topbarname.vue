<template>
<div>
    <div class="sidebar-brand-text mx-3" style="color: white">{{ user_name }}</div>
</div>
</template>

<script>
export default {
    created() {
        this.user_name = User.name();
    },
    data() {
        return {
            user_name: ''
        }
    },
}
</script>
