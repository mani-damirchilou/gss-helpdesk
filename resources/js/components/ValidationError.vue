<script setup lang="ts">
interface Props {
    message?: string
}

defineProps<Props>();
</script>

<template>
<small v-if="message" class="text-xs text-red-600 dark:text-red-500">{{ message }}</small>
</template>

<style scoped>

</style>
