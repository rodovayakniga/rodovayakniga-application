<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


defineProps({
    rodovayakniga: Object,
});

</script>

<template>
    <Head title="Родовая книга" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Родовая книга: {{ rodovayakniga.name }}
            </h2>
        </template>


    </AuthenticatedLayout>
</template>

<style scoped>

</style>
