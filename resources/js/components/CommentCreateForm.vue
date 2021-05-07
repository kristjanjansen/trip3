<script setup lang="ts">
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";

const { errors } = usePage<{ errors: object }>().props.value;
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
        <Button type="submit" :disabled="form.processing">Sign in</Button>
        {{ errors }}
    </form>
</template>
