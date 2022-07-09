# `laravel-scaffold`

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
