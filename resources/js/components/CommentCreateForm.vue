<script setup lang="ts">
import { defineProps } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";
import type { Content } from "../types";

const props = defineProps<{ content: Content }>();

const form = useForm({
    body: "",
});
const onSubmit = () => {
    form.post(route("comment.store", [props.content.id]), {
        preserveScroll: true,
        onSuccess: () => {
            Inertia.visit(route("forum.show", props.content.id), {
                preserveScroll: true,
                only: ["content"],
            });
        },
    });
};
</script>
<template>
    <form @submit.prevent="onSubmit" class="grid gap-6">
        <FormTextarea
            :label="__('Comment')"
            name="body"
            v-model="form.body"
            :errors="form.errors"
        />
        <Button
            type="submit"
            :disabled="form.processing"
            class="justify-self-start"
        >
            Submit
        </Button>
    </form>
</template>
