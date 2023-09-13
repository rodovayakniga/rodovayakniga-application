<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const user = usePage().props.auth.user;

const form = useForm({
    name: name,
    user_id: user.id
});

</script>

<template>
    <Head title="Создать Родовое древо" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Создать Родовое древо</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-gray-900">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                            <form
                                @submit.prevent="form.post(route('rodovayakniga.store'))"
                                class="mt-6 space-y-6"
                            >
                                <div>
                                    <InputLabel for="name" value="name" />

                                    <TextInput
                                        id="name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.name"
                                        required
                                        autocomplete="name"
                                    />

                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div>
                                    <TextInput
                                        id="user_id"
                                        type="text"
                                        v-model="form.user_id"
                                        required
                                        hidden="hidden"
                                        autocomplete="user_id"
                                    />

                                    <InputError class="mt-2" :message="form.errors.user_id" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <PrimaryButton :disabled="form.processing">Создать</PrimaryButton>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
