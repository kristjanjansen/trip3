<template>
    <div class="mb-4 text-sm text-gray-600">
        This is a secure area of the application. Please confirm your password
        before continuing.
    </div>

    <breeze-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <breeze-label for="password" value="Password" />
            <breeze-input
                id="password"
                type="password"
                class="block w-full mt-1"
                v-model="form.password"
                required
                autocomplete="current-password"
                autofocus
            />
        </div>

        <div class="flex justify-end mt-4">
            <breeze-button
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Confirm
            </breeze-button>
        </div>
    </form>
</template>

<script>
export default {
    layoutName: "Guest",

    props: {
        auth: Object,
        errors: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                password: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.confirm"), {
                onFinish: () => this.form.reset(),
            });
        },
    },
};
</script>
