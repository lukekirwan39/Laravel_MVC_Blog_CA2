@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Contact')
@section('content')

    <div class="p-6 bg-white dark:bg-dark rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Contact Us</h1>

        <p class="text-gray-600 dark:text-gray-300 mb-6">
            Have a question, feedback, or just want to say hi? We’d love to hear from you!
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Contact Details -->
            <div>
                <h2 class="text-xl font-medium mb-3">Contact Information</h2>
                <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                    <li>
                        <strong>Address:</strong><br>
                        123 Laravel Street, Web City, Frameworkland 45678
                    </li>
                    <li>
                        <strong>Email:</strong><br>
                        <a href="mailto:support@laravelblog.com" class="text-primary hover:underline">support@laravelblog.com</a>
                    </li>
                    <li>
                        <strong>Phone:</strong><br>
                        <a href="tel:+1234567890" class="text-primary hover:underline">+1 (234) 567-890</a>
                    </li>
                    <li>
                        <strong>Business Hours:</strong><br>
                        Monday - Friday: 9am - 6pm
                    </li>
                </ul>
            </div>

            <!-- Optional Contact Form -->
            <div>
                <h2 class="text-xl font-medium mb-3">Send a Message</h2>
                <div class="space-y-4 bg-white-light/40 dark:bg-dark/40 p-4 rounded border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300">
                    <p>
                        We'd love to hear from you! While this contact form isn't active at the moment, feel free to reach out to us through one of the methods listed on the left.
                    </p>
                    <ul class="list-disc list-inside space-y-1">
                        <li>Email: <a href="mailto:support@laravelblog.com" class="text-primary hover:underline">support@laravelblog.com</a></li>
                        <li>Phone: <a href="tel:+1234567890" class="text-primary hover:underline">+1 (234) 567-890</a></li>
                        <li>Socials: <span class="text-gray-500">(Coming Soon)</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10">
        <h2 class="text-xl font-medium mb-3">Our Location</h2>
        <div class="aspect-w-16 aspect-h-9 rounded shadow-md overflow-hidden">
            <iframe
                class="w-full h-96 border-0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0191398657923!2d-122.40129968468018!3d37.79125667975679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064c5bdfb4d%3A0x64435b1344c06315!2sLaravel%20HQ!5e0!3m2!1sen!2sus!4v1610000000000"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
    </div>
    <div class="mt-10">
        <h2 class="text-xl font-medium mb-4">Meet the Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex items-center space-x-4 p-4 border rounded dark:border-gray-700">
                <img src="{{ asset('images/jane-doe.jpg') }}" class="w-16 h-16 rounded-full" alt="Support Team">
                <div>
                    <h3 class="font-semibold">Jane Doe</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Community Manager</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 border rounded dark:border-gray-700">
                <img src="{{ asset('images/john-smith.jpg') }}" class="w-16 h-16 rounded-full" alt="Support Team">
                <div>
                    <h3 class="font-semibold">John Smith</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Technical Support</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10">
        <h2 class="text-xl font-medium mb-4">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div class="p-4 border rounded dark:border-gray-700">
                <h3 class="font-semibold mb-1">How do I create a blog post?</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Simply log in, go to the Posts section, and click "Add New".</p>
            </div>
            <div class="p-4 border rounded dark:border-gray-700">
                <h3 class="font-semibold mb-1">Can I customize my blog layout?</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Yes, we support multiple themes and layout options in your settings.</p>
            </div>
        </div>
    </div>

@endsection
