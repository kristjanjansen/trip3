<script setup lang="ts">
import { useForm, usePage } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: null,
    remember: false,
});

const { props, url } = usePage();
</script>

<template>
    <div class="p-8 space-y-4">
        <form @submit.prevent="form.post('/store')">
            <input type="text" v-model="form.email" />
            <div v-if="props.errors?.email">{{ props.errors.email }}</div>
            <input type="checkbox" v-model="form.remember" />
            Remember Me
            <button type="submit" :disabled="form.processing">Login</button>
        </form>
        <pre>form = {{ form }}</pre>
        <pre>props = {{ props }}</pre>
        <pre>url = {{ url }}</pre>
    </div>
</template>
