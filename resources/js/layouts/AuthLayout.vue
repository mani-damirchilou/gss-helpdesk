<script setup lang="ts">
import ApplicationLogo from '@/components/ApplicationLogo.vue';
import { Toaster } from 'vue-sonner';
import { useAppearance } from '@/composables/useAppearance';
import { Button } from '@/components/ui/button';
import { Sun, Moon, LaptopMinimal } from 'lucide-vue-next';
import { computed } from 'vue';
interface Props {
    title: string;
    description: string;
}

defineProps<Props>();

const { appearance, updateAppearance } = useAppearance();

const handleAppearanceChange = () => {
    if (appearance.value === 'system')
    {
        updateAppearance('light');
    }else
    if (appearance.value === 'light')
    {
        updateAppearance('dark');
    }else
    if (appearance.value === 'dark')
    {
        updateAppearance('system');
    }
}

const computedAppearance = computed(() => {
    if (appearance.value === 'system')
    {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    return appearance.value;
})
</script>

<template>
    <Toaster close-button position="top-center" style="font-family: iran-sans" :theme="computedAppearance"/>
    <div class="bg-background flex min-h-svh flex-col items-center justify-center relative">
        <Button  class="size-10 absolute bottom-10 right-10" @click="handleAppearanceChange">
            <LaptopMinimal v-if="appearance === 'system'" class="size-5"/>
            <Sun v-if="appearance === 'light'" class="size-5"/>
            <Moon v-if="appearance === 'dark'" class="size-5"/>
        </Button>
        <div class="w-full max-w-xs">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col items-center gap-4">
                    <ApplicationLogo class="size-12" />
                    <div class="space-y-2 text-center">
                        <h1 class="text-xl font-medium">{{ title }}</h1>
                        <p class="text-muted-foreground text-center text-sm">{{ description }}</p>
                    </div>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
