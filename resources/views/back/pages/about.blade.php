@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'About')
@section('content')
    <div class="p-6 bg-white rounded shadow dark:bg-dark">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">About This Blog</h1>

        <p class="text-gray-600 dark:text-gray-300 mb-4">
            Welcome to our Laravel-powered blog platform, a dynamic and customizable content management system built to help you share your thoughts, stories, and knowledge with the world. Whether you're writing about technology, lifestyle, or anything in between, our blog provides a clean, user-friendly interface for both authors and readers.
        </p>

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mt-6 mb-2">What This Blog Offers</h2>
        <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 space-y-1">
            <li>Clean and modern design with responsive layouts.</li>
            <li>Admin dashboard for managing posts, categories, and settings.</li>
            <li>Lightweight performance powered by Laravel 8+ and Blade templating.</li>
            <li>Interactive UI using Alpine.js and Livewire for dynamic components.</li>
            <li>Secure authentication and role-based access.</li>
        </ul>

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mt-6 mb-2">Tech Stack</h2>
        <p class="text-gray-600 dark:text-gray-300 mb-4">
            This blog is built using the Laravel PHP framework, utilizing modern web technologies including:
        </p>
        <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 space-y-1">
            <li><strong>Laravel</strong> - The PHP framework for web artisans</li>
            <li><strong>Blade</strong> - Laravel's lightweight templating engine</li>
            <li><strong>Livewire</strong> - Full-stack components for reactive UI without leaving Laravel</li>
            <li><strong>Alpine.js</strong> - Minimal JavaScript framework for interactivity</li>
            <li><strong>Tailwind CSS</strong> - Utility-first CSS for custom design</li>
        </ul>

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mt-6 mb-2">Our Mission</h2>
        <p class="text-gray-600 dark:text-gray-300">
            Our mission is to empower creators, writers, and developers with a simple yet powerful platform to publish and manage blog content with ease. We believe in open source, clean code, and intuitive user experiences.
        </p>
    </div>
@endsection
