<template>
    <div class="public-main">
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "PublicMaster"
    }
</script>

<style>
    .headnav {
        float: right;
        margin: 6px 0 0 0;
        border-bottom: 1px dotted #e6e6e6;
    }
</style>
