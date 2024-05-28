<template>
    <div>
        <h1>Daftar Divisi</h1>
        <button @click="createDivisi">Tambah Divisi</button>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="divisi in divisis" :key="divisi.id">
                    <td>{{ divisi.nama }}</td>
                    <td>
                        <button @click="editDivisi(divisi.id)">Edit</button>
                        <button @click="deleteDivisi(divisi.id)">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const { props } = usePage();
        const divisis = ref(props.divisis);

        const createDivisi = () => {
            Inertia.visit('/divisis/create');
        };

        const editDivisi = (id) => {
            Inertia.visit(`/divisis/${id}/edit`);
        };

        const deleteDivisi = (id) => {
            if (confirm('Apakah Anda yakin ingin menghapus divisi ini?')) {
                Inertia.delete(`/divisis/${id}`);
            }
        };

        return {
            divisis,
            createDivisi,
            editDivisi,
            deleteDivisi,
        };
    },
};
</script>
