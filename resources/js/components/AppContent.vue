<script setup lang="ts">

import { SidebarInset } from '@/components/ui/sidebar';
import AppHeader from '@/components/AppHeader.vue';

import { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[]
}

defineProps<Props>()
</script>

<template>
    <SidebarInset>
        <AppHeader :breadcrumbs="breadcrumbs"/>
        <slot/>
    </SidebarInset>
</template>

<style scoped>

</style>
