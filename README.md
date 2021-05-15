![](./screenshot.png)

## About

https://trip.ee stack exploration. See more at https://github.com/tripikad/trip2/issues/1970

## Getting started

### Installation

First, run

```sh
composer install
npm i
```

Then connect to a database in `.env` file

```sh
# .env

DATABASE_URL=mysql://...
```

If you use local database, run also the migrations

```
php artisan migrate --seed
```

### Development

First, run PHP server: either use [Valet](https://laravel.com/docs/8.x/valet) or Octane:

```
php artisan octane:start
```

Then run Vite server

```
npm run dev
```

### Production

Run

```
npm run build
```

Then set the environment:

```sh
# .env

APP_ENV=production
```

## Writing Vue components

### Generate model types (experimental)

To generate the Typescript types based on Eloquent models, run

```
php artisan generate:types
```

It will write the model types to `/resources/js/types` with some additional typing information.

To use the types, import them in the component and use them in the props declaration:

```vue
<script setup lang="ts">
import { defineProps } from "vue";
import type { Comment } from "../types";

defineProps<{ comment: Comment }>();
</script>
```

## Testing

### Running tests

#### Running tests in development

The test are Laravel Dusk tests, running via Puppeteer.

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

#### Running tests in CI

<mark>TODO</mark>

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

```

```
