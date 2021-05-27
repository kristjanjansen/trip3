<script setup lang="ts">
import { defineProps, defineEmit } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";
import type { Comment } from "../types";

const props = defineProps<{ comment: Comment }>();
const emit = defineEmit<(e: "updated") => void>();

const form = useForm({
    body: props.comment.body || "",
});

const onSubmit = () => {
    form.put(
        route("comment.update", [props.comment.content_id, props.comment.id]),
        {
            preserveScroll: true,
            onSuccess: () => {
                Inertia.get(route("forum.show", props.comment.content_id), {
                    preserveScroll: true,
                    only: ["content"],
                });
                emit("updated");
            },
        }
    );
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
            Update
        </Button>
    </form>
</template>
