<template>
    <div>
        <h1>Daftar Pekerjaan</h1>
        <button @click="createPekerjaan">Tambah Pekerjaan</button>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="pekerjaan in pekerjaans" :key="pekerjaan.id">
                    <td>{{ pekerjaan.judul }}</td>
                    <td>
                        <button @click="editPekerjaan(pekerjaan.id)">Edit</button>
                        <button @click="deletePekerjaan(pekerjaan.id)">Hapus</button>
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
        const pekerjaans = ref(props.pekerjaans);

        const createPekerjaan = () => {
            Inertia.visit('/pekerjaans/create');
        };

        const editPekerjaan = (id) => {
            Inertia.visit(`/pekerjaans/${id}/edit`);
        };

        const deletePekerjaan = (id) => {
            if (confirm('Apakah Anda yakin ingin menghapus pekerjaan ini?')) {
                Inertia.delete(`/pekerjaans/${id}`);
            }
        };

        return {
            pekerjaans,
            createPekerjaan,
            editPekerjaan,
            deletePekerjaan,
        };
    },
};
</script>
