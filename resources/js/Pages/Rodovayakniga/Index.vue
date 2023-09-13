<script setup>
import { router, Link, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    rodovayakniga: Object,
});

const show = (id) => {
    router.visit(route('rodovayakniga.show', id))
}

const destroy = (id) => {
    router.visit(route('rodovayakniga.destroy', id), { method: 'delete' })
}


</script>

<template>
    <Head title="Родовая книга" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Родовая книга</h2>

            <Link
                :href="route('rodovayakniga.add')"
                class="float-right text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            >
                Добавить
            </Link>

        </template>

        <div v-if="message" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Message</span> {{ message }}
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-gray-900">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                <tbody>

                                <tr
                                    v-for="kniga in rodovayakniga" :key="kniga.id"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                >
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ kniga.name }}
                                    </th>
                                    <td class="px-3 py-3 text-end">
                                        <PrimaryButton  @click="show(kniga.id)">
                                            Посмотреть
                                        </PrimaryButton>
                                        <DangerButton class="ml-2" @click="destroy(kniga.id)">
                                            Удалить
                                        </DangerButton>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
