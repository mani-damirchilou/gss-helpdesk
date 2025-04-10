<script setup lang="ts">

import { SidebarGroup, SidebarGroupContent, SidebarGroupLabel, SidebarMenu } from '@/components/ui/sidebar';
import AppSidebarItems from '@/components/AppSidebarItems.vue';
import { NavGroup } from '@/types';

interface Props {
    items: NavGroup[]
}

defineProps<Props>();
</script>

<template>
    <SidebarGroup v-for="group in items" :key="group.name">
        <SidebarGroupLabel>{{ group.name }}</SidebarGroupLabel>
        <SidebarGroupContent>
            <SidebarMenu>
                <AppSidebarItems :items="group.items"/>
            </SidebarMenu>
        </SidebarGroupContent>
    </SidebarGroup>
</template>

<style scoped>

</style>
