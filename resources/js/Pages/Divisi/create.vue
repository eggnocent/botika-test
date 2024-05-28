<template>
    <div>
        <h1>Tambah Divisi</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="nama">Nama:</label>
                <input id="nama" v-model="form.nama" type="text">
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    setup() {
        const form = ref({
            nama: '',
        });

        const submit = () => {
            Inertia.post('/divisis', form.value);
        };

        return {
            form,
            submit,
        };
    },
};
</script>
