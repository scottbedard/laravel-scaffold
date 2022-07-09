# `laravel-scaffold`

[![Test](https://github.com/scottbedard/laravel-scaffold/actions/workflows/test.yml/badge.svg)](https://github.com/scottbedard/laravel-scaffold/actions/workflows/test.yml)

This repo is an opinionated and minimal starting point for Laravel applications. It contains a handful of tools I enjoy, as well as a workflow for continuous-integration via GitHub actions. Pages for user authentication are also included to demonstrate end-to-end testing with database interactions.

## Features

- Docker development environment using [Laravel Sail](https://laravel.com/docs/9.x/sail)
- Configuration for [Vite](https://vitejs.dev/), [Vue](https://vuejs.org/), and [Tailwind](https://tailwindcss.com/)
- Browser testing via [Laravel Dusk](https://laravel.com/docs/9.x/dusk)
- Github action to run unit, feature, and browser tests
- Blade components to reference assets in different environments
- Artisan command / blade component for [Lucide icons](https://lucide.dev/)

## Getting started

This starting point includes the development environment, thanks to [Laravel Sail](https://laravel.com/docs/9.x/sail). To get started, see the [installation guide here](https://laravel.com/docs/9.x/installation#laravel-and-docker). Once Sail is configured, execute the following to download backend and frontend dependencies.

```bash
composer install

npm install
```

To start our application, execute the following.

```bash
sail up
```

Once the development server is started, migrate the database.

```bash
sail artisan migrate
```

To serve development assets, ensure that `APP_ENV` is set to `local`, and execute the following.

```bash
npm run dev
```

And that's it! You should now be able to visit your application at [http://localhost](http://localhost). To stop the development server, execute the following.

```bash
sail down
```

To build production assets, execute the following.

```bash
npm run build
```

> **Notice:** Sail will need to be restarted following changes to the `.env` file.

## Scripts and styles

Out of the box, this application is design with the "islands architecture" in mind. Essentially, this means content will be server-rendered, with the ability to render portions of the page on the client. To create a script, add an entry to `vite.config.ts`.

Once your entry point is registered, it can referenced using the script component.

```html
<x-script src="example.ts" />
```

In development, page styles will be referenced dynamically to allow for hot-module-replacement. In production, they will be referenced from a static css asset. This logic is handled using the `global` script, along with the `styles` component.

```html
<html>
    <head>
        <x-styles />
    </head>
    <body>
        ...
        <x-script src="global.ts" />
    </body>
</html>
```

The starter layout is already configured this way, but if you're adding additional page layouts this is something to be aware of.

## Icons

This application comes with support for [Lucide icons](https://lucide.dev/). To update the current icon set, execute the following.

```bash
php artisan app:lucide
```

Icons can be rendered by their `name`, along with optional `size` and `stroke-width` values.

```html
<x-icon name="rocket" />
```
