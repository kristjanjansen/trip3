<script setup lang="ts">
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";

const p = usePage<{ errors: object }>().props;
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
        {{ form.errors.body }}
        <Button type="submit" :disabled="form.processing">Sign in</Button>
    </form>
</template>
