<script setup lang="ts">
import AppSidebar from '@/components/AppSidebar.vue';
import AppContent from '@/components/AppContent.vue';
import AppShell from '@/components/AppShell.vue';
</script>

<template>
    <AppShell>
        <AppSidebar/>
        <AppContent>
            <slot/>
        </AppContent>
    </AppShell>
</template>

<style scoped></style>
