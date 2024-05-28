<template>
    <div>
        <h1>Daftar Karyawan</h1>
        <button @click="createKaryawan">Tambah Karyawan</button>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Pekerjaan</th>
                    <th>Divisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="karyawan in karyawans" :key="karyawan.id">
                    <td>{{ karyawan.nama }}</td>
                    <td>{{ karyawan.email }}</td>
                    <td>{{ karyawan.status }}</td>
                    <td>{{ karyawan.pekerjaan.judul }}</td>
                    <td>{{ karyawan.divisi.nama }}</td>
                    <td>
                        <button @click="editKaryawan(karyawan.id)">Edit</button>
                        <button @click="deleteKaryawan(karyawan.id)">Hapus</button>
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
        const karyawans = ref(props.karyawans);

        const createKaryawan = () => {
            Inertia.visit('/karyawans/create');
        };

        const editKaryawan = (id) => {
            Inertia.visit(`/karyawans/${id}/edit`);
        };

        const deleteKaryawan = (id) => {
            if (confirm('Apakah Anda yakin ingin menghapus karyawan ini?')) {
                Inertia.delete(`/karyawans/${id}`);
            }
        };

        return {
            karyawans,
            createKaryawan,
            editKaryawan,
            deleteKaryawan,
        };
    },
};
</script>
