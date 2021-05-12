<script setup lang="ts">
import { useForm } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";

const form = useForm({
    body: "",
});
const onSubmit = () => {
    form.post(route("comment.store"));
};
</script>
<template>
    <ForumLayout>
        <form @submit.prevent="onSubmit" class="grid gap-6">
            <FormRichtext
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
    </ForumLayout>
</template>
