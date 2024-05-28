<template>
    <div>
        <h1>Edit Divisi</h1>
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
import { usePage } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const { props } = usePage();
        const form = ref({
            nama: props.divisi.nama,
        });

        const submit = () => {
            Inertia.put(`/divisis/${props.divisi.id}`, form.value);
        };

        return {
            form,
            submit,
        };
    },
};
</script>
