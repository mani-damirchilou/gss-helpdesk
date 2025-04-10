<script setup lang="ts">

import { SidebarTrigger } from '@/components/ui/sidebar';
import Breadcrumbs from '@/components/Breadcrumbs.vue';

import { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[]
}

defineProps<Props>()
</script>

<template>
    <header
        class="flex h-16 shrink-0 items-center gap-2 border-b border-sidebar-border/70 px-6 transition-[width,height] ease-linear group-has-data-[collapsible=icon]/sidebar-wrapper:h-12 md:px-4"
    >
        <div class="flex items-center gap-2">
            <SidebarTrigger class="-mr-1" />
            <Breadcrumbs v-if="breadcrumbs" :breadcrumbs="breadcrumbs"/>
        </div>
    </header>
</template>

<style scoped>

</style>
