<script setup lang="ts">
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";

const form = useForm({
    body: "",
});
const onSubmit = () => {
    form.post(route("comment.store"));
};
</script>
<template>
    <form @submit.prevent="onSubmit">
        <FormTextarea name="body" v-model="form.body" />
        <Button type="submit" :disabled="form.processing">Submit</Button>
        |{{ form.errors }}|
    </form>
</template>
