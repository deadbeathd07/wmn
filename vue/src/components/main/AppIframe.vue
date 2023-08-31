// *
----------------------------------------------------------------------------------------*
//
<template>
    <iframe
        :src="url"
        class="bg-white right-0 fixed w-full h-full border-none m-0 p-0"
    ></iframe>
</template>

<script setup>
const { url } = defineProps({
    url: String,
});
</script>

<style></style>
// *
----------------------------------------------------------------------------------------*
//
