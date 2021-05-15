![](./screenshot.png)

## About

https://trip.ee stack exploration. See more at https://github.com/tripikad/trip2/issues/1970

## Code

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

### Tests

Run

```
php artisan dusk
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

## Recommended tooling

### VS Code

See [/.vscode/extensions.json](/.vscode/extensions.json)

### PHPStorm

**Tailwind Formatter** https://plugins.jetbrains.com/plugin/13376-tailwind-formatter/
