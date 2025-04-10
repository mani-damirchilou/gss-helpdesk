<script setup lang="ts">

import { SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import ApplicationLogo from '@/components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <SidebarHeader>
        <SidebarMenu>
            <SidebarMenuItem>
                <SidebarMenuButton size="lg" as-child>
                    <Link :href="route().has('dashboard') ? route('dashboard') : '#'">
                        <div class="flex aspect-square size-8 items-center justify-center bg-sidebar-primary rounded-md">
                            <ApplicationLogo class="size-5" />
                        </div>
                        <div class="mr-1 grid flex-1 text-right text-sm">
                            <span class="truncate font-semibold">گرایش تازه پارس</span>
                        </div>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarHeader>
</template>

<style scoped>

</style>
