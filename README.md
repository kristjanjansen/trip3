![](./screenshot.png)

## About

Trip stack exploration. See more at https://github.com/tripikad/trip2/issues/1970

## Demo

https://elektron.studio/

## Development

### Installation

First, run

```sh
composer install
npm i

# If you want to run Octane Swoole server:
#
# RUN pecl install --configureoptions 'enable-sockets="no" enable-openssl="no" enable-http2="no" enable-mysqlnd="no" enable-swoole-json="no" enable-swoole-curl="no"' swoole
```

Then set up a`.env` file

```sh
# .env

APP_KEY=base64:QG/uepNJT1GmxA4h89jWxanNWDB3/Eg80petqWKk1QY=
APP_URL=http://trip3.test
DATABASE_URL=mysql://root@127.0.0.1:3306/trip3

# If you want to access external database
#
# DATABASE_URL=mysql://doadmin:pxrq0deppr...

# If you want to run Octane Swoole server:
#
# APP_URL=http://localhost:8000
# OCTANE_SERVER=swoole
```

If you use local database, create the database and run the migrations

```sh
mysqladmin -uroot create trip3
php artisan migrate --seed
```

### Valet development

It you use [Valet](https://laravel.com/docs/8.x/valet) for PHP server, you just need to run Vite server for frontend development:

```sh
npm run dev
```

The server should be available at http://trip3.test

### Octane development

If you run [Octane](https://laravel.com/docs/octane) for PHP server, make sure you have set up Swoole as documented above.

Then run Octane and Vite servers:

```sh
# First tab

php artisan octane:start

# Second tab

npm run dev
```

The server should be available at http://127.0.0.1:8000

### Production

Run

```sh
npm run build
```

Then set the environment:

```sh
# .env

APP_ENV=production
```

The local production server should now be available either at http://trip3.test or http://127.0.0.1:8000 dependent on your PHP server.

## Frontend development

### Eager-loaded Vue components

We support both eager-loaded and lazy-loaded (async) components:

```
/resources/js/components/*.vue
```

Eager loaded are bundled to the main app bundle and immediately loaded. Use eager-loaded components for simple components that do not have (huge) third-party dependencies.

### Lazy-loaded Vue components

```
/resources/js/components_async/*.vue
```

Lazy loaded components are loaded only when needed on a page. They are useful for bigger, complex components that use third-party libraries (text editors etc).

Note that async components are loaded later and cause layout shifts.

## Component syntax

For the component syntax we use Vue 3 [composition API](https://v3.vuejs.org/guide/composition-api-introduction.html), the new [script setup](https://github.com/vuejs/rfcs/blob/script-setup-2/active-rfcs/0000-script-setup.md) component syntax and Typescript (experimental).

> Typescript is there for IDE ergonomics only and this decision can easilty rolled back.

### Compare: Vue 2 component

```vue
<script>
export default {
    props: {
        title: { type: String },
    },
    data() {
        return { counter: 0 };
    },
    methods: {
        increase() {
            this.counter++;
        },
    },
    computed: {
        hugeCounter() {
            return this.counter * 1000;
        },
    },
};
</script>
```

### Compare: Vue 3 component

```vue
<script setup lang="ts">
import { defineProps, ref, computed } from "vue";

defineProps<{ title: string }>();

const counter = ref(0);
const increase = () => counter.value++;
const hugeCounter = computed(() => counter.value * 1000);
</script>
```

### JS utility functions

There are several utility functions available:

`route()`: for using Laravel named routes

`trans()` and `__()` for translations

`formatDate()` and `useFormatAgo()` for date formatting

`formatContent()` for content formatting

**TODO:** `loggedUser` / `loggedUserRole` for authenticated use and user authorization.

For component templates, the helpers are globally available:

```vue
<template>
    {{ __("Hola") }}
</template>
```

For component code you will need to import the functions first:

```vue
<script setup lang="ts">
import { __ } from "../utils";

const greeting = __("Hola");
</script>
```

### Generate model types (experimental)

To generate the Typescript types based on Eloquent models, run

```sh
php artisan generate:types
```

It will write the model types to `/resources/js/types` with some additional typing information.

Here is the auto-generated `Comment` type:

```ts
export type Comment = {
    id: number;
    user_id: number;
    content_id: number;
    body: string | null;
    created_at: string /* Date */ | null;
    updated_at: string /* Date */ | null;
    content?: Content | null;
    user?: User | null;
};
```

To use the types, import them in the component and use them in the props declaration:

```vue
<script setup lang="ts">
import { defineProps } from "vue";
import type { Comment } from "../types";

defineProps<{ comment: Comment }>();
</script>
```

## Tailwind CSS (experimental)

This demo use Tailwind for CSS handling with custom configration that brings in Trip.ee custom colors and typography.

> Tailwind decision has not yet been made, this exploration tests out the ergonomics of the utility classes workflow.

## Testing

### Running tests in development

The test are Laravel Dusk tests, running usin Puppeteer.

1. Make sure you have `APP_URL` set in `.env`

```sh
# .env

APP_URL=http://trip3.test
```

2. Run dev server

```sh
npm run dev
```

3. Run the tests in a separate tab

```sh
php artisan dusk
```

### Running tests in CI

https://laravel.com/docs/dusk#running-tests-on-github-actions

### Writing tests

#### Selecting items in Vue components

For selecting items on Vue componentents it is recommended to use [Dusk selectors](https://laravel.com/docs/dusk#dusk-selectors) and wait the selectors to be appear on the page.

```html
<h1 dusk="nav">Trip.ee</h1>
```

```php
$browser->visit("/")->waitForTextIn("@nav", "Trip.ee");
```

See also:

https://protone.media/en/blog/a-package-for-laravel-dusk-to-wait-for-inertiajs-events?ref=laravelnews

## Recommended tooling

### VS Code

See [/.vscode/extensions.json](/.vscode/extensions.json)

### PHPStorm

**Tailwind Formatter** https://plugins.jetbrains.com/plugin/13376-tailwind-formatter/

See also https://youtrack.jetbrains.com/issue/WEB-49000
