<script setup lang="ts">
import { useForm } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";

const form = useForm({
    body: "",
});
const onSubmit = () => {
    form.value.post(route("comment.create"));
};
</script>
<template>
    <form @submit.prevent="onSubmit">
        <FormTextarea name="body" v-model="form.body" />
        <button type="submit" :disabled="form.processing">Sign in</button>
    </form>
</template>
