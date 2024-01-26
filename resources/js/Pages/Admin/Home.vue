<template>
    <h4>I Am Admin Page</h4>
    <Link :href="route('logout')" method="post" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" as="button">Logout</Link>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<style lang="">

</style>
