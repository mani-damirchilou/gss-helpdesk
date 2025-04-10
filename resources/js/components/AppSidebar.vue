<script setup lang="ts">

import { Sidebar } from '@/components/ui/sidebar';
import AppSidebarHeader from '@/components/AppSidebarHeader.vue';
import AppSidebarContent from '@/components/AppSidebarContent.vue';
</script>

<template>
    <Sidebar collapsible="icon" variant="inset" side="right">
        <AppSidebarHeader/>
        <AppSidebarContent/>
    </Sidebar>
</template>

<style scoped>

</style>
