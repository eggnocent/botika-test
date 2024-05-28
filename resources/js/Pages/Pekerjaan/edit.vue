<template>
    <div>
        <h1>Edit Pekerjaan</h1>
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
import { usePage } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const { props } = usePage();
        const form = ref({
            judul: props.pekerjaan.judul,
        });

        const submit = () => {
            Inertia.put(`/pekerjaans/${props.pekerjaan.id}`, form.value);
        };

        return {
            form,
            submit,
        };
    },
};
</script>
