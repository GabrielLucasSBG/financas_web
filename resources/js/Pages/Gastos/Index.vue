<template>
    <Head title="Gastos"/>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gastos
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div className="flex items-center justify-between mb-6">
                            <Link
                                className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                                :href="route('gastos.create')"
                            >
                                Criar gasto
                            </Link>
                        </div>
                        <table className="table-fixed w-full">
                            <thead>
                            <tr className="bg-gray-100">
                                <th className="px-4 py-2 w-20">id</th>
                                <th className="px-4 py-2">Nome</th>
                                <th className="px-4 py-2">Tipo</th>
                                <th className="px-4 py-2">Valor</th>
                                <th className="px-4 py-2">Data de criação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="gasto in gastos">
                                <td className="border px-4 py-2">{{ gasto.id }}</td>
                                <td className="border px-4 py-2">{{ gasto.nome }}</td>
                                <td className="border px-4 py-2">{{ gasto.tipo }}</td>
                                <td className="border px-4 py-2">{{ gasto.valor }}</td>
                                <td className="border px-4 py-2">{{ gasto.created_at }}</td>
                                <td className="border px-4 py-2">
                                    <Link
                                        tabIndex="1"
                                        className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                        :href="route('gastos.edit', gasto.id)"
                                    >
                                        Editar
                                    </Link>
                                    <button
                                        @click="destroy(gasto.id)"
                                        tabIndex="-1"
                                        type="button"
                                        className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

defineProps({
    gastos: Array
});

const form = useForm;

function destroy(id) {
    if (confirm("Deseja deletar esse gasto?")) {
        form.delete(route('gastos.destroy', id));
    }
}
</script>

<style></style>
