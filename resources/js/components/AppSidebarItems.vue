<script setup lang="ts">

import { SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { Link } from '@inertiajs/vue3';
import { NavItem } from '@/types';

interface Props {
    items: NavItem[];
}

defineProps<Props>()
</script>

<template>
    <SidebarMenuItem v-for="item in items" :key="item.href">
        <SidebarMenuButton as-child :is-active="item.isActive" :tooltip="item.title">
            <Link :href="item.href">
                <component :is="item.icon" />
                <span>{{ item.title }}</span>
            </Link>
        </SidebarMenuButton>
    </SidebarMenuItem>
</template>

<style scoped>

</style>
