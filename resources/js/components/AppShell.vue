<script setup lang="ts">
import { SidebarProvider } from '@/components/ui/sidebar';
import { usePage } from '@inertiajs/vue3';
import { SharedData } from '@/types';

const isOpen = usePage<SharedData>().props.sidebarOpen;

</script>

<template>
    <SidebarProvider :default-open="isOpen">
        <slot />
    </SidebarProvider>
</template>

<style scoped></style>
