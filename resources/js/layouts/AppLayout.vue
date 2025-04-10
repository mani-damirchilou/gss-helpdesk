<script setup lang="ts">
import AppSidebar from '@/components/AppSidebar.vue';
import AppContent from '@/components/AppContent.vue';
import AppShell from '@/components/AppShell.vue';
import { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[]
}

defineProps<Props>()
</script>

<template>
    <AppShell>
        <AppSidebar/>
        <AppContent :breadcrumbs="breadcrumbs">
            <slot/>
        </AppContent>
    </AppShell>
</template>

<style scoped></style>
