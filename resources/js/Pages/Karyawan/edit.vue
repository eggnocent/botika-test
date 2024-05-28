<template>
    <div>
        <h1>Edit Karyawan</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="nama">Nama:</label>
                <input id="nama" v-model="form.nama" type="text">
            </div>
            <div>
                <label for="email">Email:</label>
                <input id="email" v-model="form.email" type="email">
            </div>
            <div>
                <label for="status">Status:</label>
                <select id="status" v-model="form.status">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
            <div>
                <label for="pekerjaan_id">Pekerjaan:</label>
                <select id="pekerjaan_id" v-model="form.pekerjaan_id">
                    <option v-for="pekerjaan in pekerjaans" :key="pekerjaan.id" :value="pekerjaan.id">
                        {{ pekerjaan.judul }}
                    </option>
                </select>
            </div>
            <div>
                <label for="divisi_id">Divisi:</label>
                <select id="divisi_id" v-model="form.divisi_id">
                    <option v-for="divisi in divisis" :key="divisi.id" :value="divisi.id">
                        {{ divisi.nama }}
                    </option>
                </select>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const { props } = usePage();
        const form = ref({
            nama: props.karyawan.nama,
            email: props.karyawan.email,
            status: props.karyawan.status,
            pekerjaan_id: props.karyawan.pekerjaan_id,
            divisi_id: props.karyawan.divisi_id,
        });
        const pekerjaans = ref(props.pekerjaans);
        const divisis = ref(props.divisis);

        const submit = () => {
            Inertia.put(`/karyawans/${props.karyawan.id}`, form.value);
        };

        return {
            form,
            pekerjaans,
            divisis,
            submit,
        };
    },
};
</script>
