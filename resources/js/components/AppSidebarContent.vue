<script setup lang="ts">

import { SidebarContent } from '@/components/ui/sidebar';
import { NavGroup } from '@/types';
import { UserCog } from 'lucide-vue-next';
import AppSidebarGroups from '@/components/AppSidebarGroups.vue';

const groups: NavGroup[] = [
    {
        name: 'مدیریت',
        items: [
            {
                title: 'نقش ها',
                href: route('roles.index'),
                icon: UserCog,
                isActive: route().current() === 'roles.index'
            }
        ]
    }
]
</script>

<template>
    <SidebarContent>
        <AppSidebarGroups :items="groups"/>
    </SidebarContent>
</template>

<style scoped>

</style>
