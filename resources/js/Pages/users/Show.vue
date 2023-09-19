
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm,router } from '@inertiajs/vue3';

defineProps({
    user:Object,
    posts:Object,
})






</script>

<template>
    <Head :title="user.data.user_name">
        <meta name="description" content="post Index">

    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Name: {{user.data.user_name}} </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <h1>Post lists</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900" v-for="item in posts.data" :key="item.id">

                        <p class="mt-2 bg-red-50">{{item.body}}</p>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
