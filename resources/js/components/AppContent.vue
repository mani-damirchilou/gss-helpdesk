<script setup lang="ts">

import { SidebarInset } from '@/components/ui/sidebar';
import AppHeader from '@/components/AppHeader.vue';
</script>

<template>
    <SidebarInset>
        <AppHeader/>
        <slot/>
    </SidebarInset>
</template>

<style scoped>

</style>
