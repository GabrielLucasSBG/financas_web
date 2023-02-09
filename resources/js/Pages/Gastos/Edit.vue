<template>
    <Head title="Editar gasto"/>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar gasto
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none"
                                :href="route('gastos.index')"
                            >
                                Back
                            </Link>
                        </div>
                        <form name="createForm" @submit.prevent="submit">
                            <div className="flex flex-col">
                                <div className="mb-4">
                                    <BreezeLabel for="nome" value="Nome"/>

                                    <BreezeInput
                                        id="nome"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.nome"
                                        autofocus/>
                                    <span className="text-red-600" v-if="form.errors.nome">
                                            {{ form.errors.nome }}
                                        </span>
                                </div>
                                <div className="mb-4">
                                    <BreezeLabel for="tipo" value="Tipo"/>
                                    <select id="tipo"
                                            v-model="form.tipo"
                                            autofocus
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="1">Valor fixo</option>
                                        <option value="2">Valor variavel</option>
                                    </select>

                                    <span className="text-red-600" v-if="form.errors.tipo">
                                        {{ form.errors.tipo }}
                                    </span>
                                </div>
                                <div className="mb-4">
                                    <BreezeLabel for="valor" value="Valor"/>

                                    <BreezeInput
                                        id="valor"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.valor"
                                        autofocus/>
                                    <span className="text-red-600" v-if="form.errors.valor">
                                        {{ form.errors.valor }}
                                    </span>
                                </div>
                            </div>

                            <div className="mt-4">
                                <button
                                    type="submit"
                                    className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                >
                                    Salvar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeInput from '@/Components/Input.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

const props = defineProps({
    gasto: Object,
});
const form = useForm({
    nome: props.gasto.nome,
    tipo: props.gasto.tipo,
    valor: props.gasto.valor
});
const submit = () => {
    form.put(route('gastos.update', props.gasto.id));
};
</script>

<style></style>
