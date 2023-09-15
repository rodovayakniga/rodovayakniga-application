<script setup>
import {Head, router} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";


const props = defineProps({
    model: Object,
});

const edit = (id) => {
    router.visit(route('rodovayakniga.edit', id))
}

</script>

<template>
    <Head title="Родовая книга" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Родовая книга: {{ props.model.name }}
            </h2>
        </template>

        <div class="container md-auto px-6 py-6 md:container md:mx-auto">
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ props.model.name }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                   <b>Создан:</b> {{ props.model.created_at }}
                </p>

                <PrimaryButton
                    @click="edit(props.model.id)"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Изменить
                </PrimaryButton>

            </div>
        </div>


    </AuthenticatedLayout>
</template>

<style scoped>

</style>
