# VILT Stack Single Page Application

Single page application using Vue.js, Inertia.js, Laravel, Tailwind. 
We will learn step by step how we can use vilt stack to create SAPs.

## Install Composer

In the context of programming, "Composer" refers to a dependency manager for PHP programming language. [Here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) are the instructions for installation on Linux, Unix, or MacOS. Go through the instructions and install PHP and Composer.

## 1. Create Laravel Project

Go to the specific directory where you want to create your Laravel project. [Here](https://laravel.com/docs/11.x#creating-a-laravel-project) Run the following command to install the Laravel base project:

```bash
composer create-project laravel/laravel 
```

## 2. What is Inertia?

Inertia [Here](https://inertiajs.com/) is essentially a client-side routing library. It allows you to make page visits without forcing a full page reload. This is done using the `<Link>` component, a light-weight wrapper around a normal anchor link. When you click an Inertia link, Inertia intercepts the click and makes the visit via XHR instead.

## 3. Install Vue.js

Vue.js [Here](https://vuejs.org/) is an open-source JavaScript framework used for building user interfaces and single-page applications.

```bash
npm install vue
```

### Install Inertia Laravel server-side dependency

```bash
composer require inertiajs/inertia-laravel
```

### Install Laravel middleware for Inertia

```bash
php artisan inertia:middleware
```

Once the middleware has been published, append the HandleInertiaRequests middleware to the web middleware group in your application's `bootstrap/app.php` file.

### Install Inertia client-side

```bash
npm install @inertiajs/vue3
```

## 4. Install ViteJS-Vue plugin

Vite  [Here](https://vitejs.dev/)  is a build tool and development server for modern web development projects, particularly those using JavaScript frameworks like Vue.js, React, or Svelte.

```bash
npm install @vitejs/plugin-vue
```

## 5. Install Tailwind CSS

Tailwind CSS [Here](https://tailwindui.com/documentation) is like a toolbox filled with small, ready-to-use tools (classes) that you can apply directly to your HTML elements to style them.

```bash
npm install tailwindcss@latest
```

**Note:** After installing all dependencies, you may run `npm run dev` command in your terminal.
