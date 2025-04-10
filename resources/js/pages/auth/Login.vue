<script setup lang="ts">
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Link, Head, useForm } from '@inertiajs/vue3';
import { Label } from '@/components/ui/label';
import { Input } from '@/components/ui/input';
import { Checkbox } from '@/components/ui/checkbox';
import { Button } from '@/components/ui/button';
import { LoaderCircle, ShieldAlert, X } from 'lucide-vue-next';
import ValidationError from '@/components/ValidationError.vue';
import { toast } from 'vue-sonner';
import { h } from 'vue';

const form = useForm({
    login: '',
    password: '',
    remember: false
})

const submit = () => {
    form.post(route('login'),{
        onError: (errors) => {
            if (errors.throttle)
            {
                toast(errors.throttle,{
                    icon: h(ShieldAlert,{class: 'size-5 text-red-600 dark:text-red-500'})
                })
            }
            if (errors.failed)
            {
                toast(errors.failed,{
                    icon: h(X,{class: 'size-5 text-red-600 dark:text-red-500'})
                })
            }
        }
    })
}
</script>

<template>
    <AuthLayout title="ورود به حساب" description="برای ادامه باید وارد حساب کاربری خود شوید">
        <Head title="ورود به حساب کاربری"/>
        <form @submit.prevent="submit" class="flex flex-col gap-6">
<!--            Username/Email-->
            <div class="grid gap-2">
                <Label for="login">نام کاربری/ایمیل</Label>
                <Input id="login" type="text" :tabindex="1" autofocus v-model="form.login" :disabled="form.processing"/>
                <ValidationError :message="form.errors.login"/>
            </div>
<!--            Password-->
            <div class="grid gap-2">
                <div class="w-full flex justify-between items-center">
                    <Label for="password">گذرواژه</Label>
<!--                    Forgot Password-->
                    <Link v-if="route().has('forgot-password')" :href="route('forgot-password')" class="text-xs text-blue-500 underline">فراموش کرده ام</Link>
                </div>
                <Input id="password" type="password" :tabindex="2" autofocus autocomplete="password" v-model="form.password" :disabled="form.processing"/>
                <ValidationError :message="form.errors.password"/>
            </div>
<!--            Remember-->
            <div class="flex items-center space-x-3">
                <Checkbox id="remember" v-model="form.remember" :tabindex="3" :disabled="form.processing"/>
                <Label for="remember">مرا به خاطر بسپار</Label>
            </div>
<!--            Submit-->
            <Button class="mt-4" :tabindex="4" :disabled="form.processing">
                <LoaderCircle v-if="form.processing" class="animate-spin size-5"/>
                <span v-else>ادامه</span>
            </Button>
        </form>
    </AuthLayout>
</template>

<style scoped></style>
