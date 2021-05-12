<script setup lang="ts">
import { defineProps } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";
import type { Comment } from "../models/comment";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps<{ comment: Comment }>();

const form = useForm({
    body: props.comment.body || "",
});

const onSubmit = () => {
    form.put(
        route("comment.update", [props.comment.content_id, props.comment.id]),
        {
            preserveScroll: true,
            onSuccess: () => {
                Inertia.visit(route("forum.show", props.comment.content_id), {
                    preserveScroll: true,
                    only: ["content"],
                });
            },
        }
    );
};
</script>
<template>
    <ForumLayout>
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
    </ForumLayout>
</template>
