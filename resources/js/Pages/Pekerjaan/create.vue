<template>
    <div>
        <h1>Tambah Pekerjaan</h1>
        <form @submit.prevent="submit">
            <div>
                <label for="judul">Judul:</label>
                <input id="judul" v-model="form.judul" type="text">
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
            judul: '',
        });

        const submit = () => {
            Inertia.post('/pekerjaans', form.value);
        };

        return {
            form,
            submit,
        };
    },
};
</script>
