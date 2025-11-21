<div class="container mx-auto">

    <form
        class="mb-6 w-full px-4 sm:px-0"
        wire:submit.prevent
    >
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <!-- 🔍 Search Input -->
            <div class="relative">
                <input
                    type="text"
                    wire:model.debounce.300ms="search"
                    class="form-input w-full bg-gray-100 dark:bg-gray-800 placeholder:tracking-widest rounded-md pr-10 pl-10"
                    placeholder="Search..."
                >
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 pointer-events-none">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
            </div>

            <!-- 🧾 Category Select -->
            <div>
                <select
                    wire:model="category"
                    class="form-select w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-white rounded-md shadow-sm focus:ring focus:ring-blue-300"
                >
                    <option>---- No selected ----</option>
                    @foreach(\App\Models\SubCategory::whereHas('posts')->get() as $category)
                        <option value="{{ $category->id }}">{{ $category->subcategory_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- 👤 Author Select (Only for Admins) -->
            @if(auth()->user()->type == 1)
                <div>
                    <select
                        wire:model="author"
                        class="form-select w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-white rounded-md shadow-sm focus:ring focus:ring-blue-300"
                    >
                        <option>---- No selected ----</option>
                        @foreach(\App\Models\User::whereHas('posts')->get() as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <!-- 📅 Order Select -->
            <div>
                <select
                    wire:model="orderBy"
                    class="form-select w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-white rounded-md shadow-sm focus:ring focus:ring-blue-300"
                >
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </div>
        </div>
    </form>



    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($posts as $post)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden" x-data="{ imageModalOpen: false }">
                <div x-data="{ imageModalOpen: false }">
                    <!-- 📸 Thumbnail Image (stays full-size) -->
                    <img
                        src="/storage/images/post_images/thumbnails/resized_{{ $post->featured_image }}"
                        alt="{{ $post->title }}"
                        class="w-full h-48 object-cover cursor-pointer rounded-lg"
                        @click="imageModalOpen = true"
                    >

                    <div class="w-full max-w-5xl bg-white dark:bg-[#121c2c] rounded-2xl shadow-2xl overflow-hidden flex flex-col border dark:border-[#1a2c4a] max-h-[90vh]">

                    <!-- 🖼️ Modal -->
                        <div
                            x-show="imageModalOpen"
                            x-transition
                            class="fixed inset-0 z-[999] flex items-center justify-center p-4"
                            style="display: none;"
                            @click.self="imageModalOpen = false"
                        >
                            <!-- 🌫️ BACKDROP -->
                            <div class="absolute inset-0 bg-gradient-to-br from-black/40 to-blue-900/40 backdrop-blur-lg backdrop-brightness-75 backdrop-saturate-150"></div>

                            <!-- 💬 MODAL CONTENT -->
                            <div class="relative z-10 w-full max-w-5xl bg-white dark:bg-[#121c2c] rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh] border dark:border-[#1a2c4a]">

                                <!-- Header -->
                                <div class="flex items-center justify-between px-6 py-4 bg-gray-100 dark:bg-[#1a2c4a] border-b border-gray-200 dark:border-gray-700">
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white truncate">{{ $post->post_title }}</h2>
                                    <button
                                        @click="imageModalOpen = false"
                                        class="text-gray-500 hover:text-red-500 dark:text-gray-300 dark:hover:text-red-400 text-2xl leading-none transition"
                                        aria-label="Close modal"
                                    >
                                        &times;
                                    </button>
                                </div>

                                <!-- Body -->
                                <div class="flex flex-col lg:flex-row overflow-auto flex-1">
                                    <!-- Image Section -->
                                    <div class="lg:w-2/5 bg-gray-50 dark:bg-[#0f1b30] flex items-center justify-center p-6">
                                        <img
                                            src="/storage/images/post_images/thumbnails/resized_{{ $post->featured_image }}"
                                            alt="{{ $post->title }}"
                                            class="max-w-full max-h-[60vh] object-contain rounded-xl shadow-lg border border-gray-200 dark:border-gray-700"
                                        >
                                    </div>

                                    <!-- Text Content -->
                                    <div class="lg:w-3/5 p-6 overflow-y-auto">
                                        <article class="prose dark:prose-invert prose-lg max-w-none leading-relaxed">
                                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">
                                                {{ $post->post_content }}
                                            </p>
                                        </article>

                                        <!-- Optional Metadata or Footer Info -->
                                        <div class="mt-6 border-t pt-4 border-gray-200 dark:border-gray-700 text-sm text-gray-500 dark:text-white/70">
                                            Last updated: {{ $post->updated_at->format('F j, Y') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="flex justify-end px-6 py-4 bg-gray-100 dark:bg-[#1a2c4a] border-t border-gray-200 dark:border-gray-700">
                                    <button
                                        @click="imageModalOpen = false"
                                        class="btn btn-primary"
                                    >
                                        Close Preview
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="p-4">
                    <div class="mb-5 flex items-center justify-between">
                        <h5 class="text-lg font-semibold dark:text-white-light truncate">{{ $post->post_title }}</h5>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex space-x-2">
                            <a href="{{ route('author.posts.edit-post',['post_id'=>$post->id]) }}">
                                <button class="text-primary hover:text-primary-dark" x-tooltip="Edit">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                </button>
                            </a>
                            <button
                                type="button"
                                @click="$dispatch('confirm-delete-post', { id: {{ $post->id }}, title: @js($post->post_title) })"
                                class="text-danger hover:text-danger-dark"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-8">
                <span class="text-danger dark:text-danger-light">No post(s) found</span>
            </div>
        @endforelse
    </div>

    <div x-data="{ open: false, id: null, title: '' }"
         x-show="open"
         x-transition
         class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60"
         style="display: none;"
         wire:ignore
         @click.self="open = false"
         @confirm-delete-post.window="
        id = $event.detail.id;
        title = $event.detail.title;
        open = true;
     "
    >
        <div wire:ignore.self class="panel w-full max-w-lg overflow-hidden rounded-lg border-0 p-0 bg-white dark:bg-[#121c2c]">
            <div class="flex items-center justify-between px-5 py-3 border-b">
                <h5 class="text-lg font-bold">Delete Post</h5>
                <button @click="open = false" class="text-gray-600 hover:text-black">✕</button>
            </div>

            <div class="p-5">
                <p class="text-base text-gray-700 dark:text-white-dark/70 mb-6">
                    Are you sure you want to delete "<span x-text="title"></span>"?
                </p>

                <div class="mt-8 flex items-center justify-between">
                    <button
                        type="button"
                        class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-100 transition"
                        @click="open = false"
                    >
                        Cancel
                    </button>

                    <div class="flex items-center gap-x-4">
                        <button
                            type="button"
                            class="btn btn-danger"
                            @click="
                            window.livewire.emit('deletePostAction', id);
                            open = false;
                        "
                        >
                            Yes, Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($posts->hasPages())
        <div class="mt-6 flex w-full flex-col items-center justify-center space-y-2">

            {{-- Page info --}}
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}
                <span class="mx-2">•</span>
                Showing {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }} results
            </div>

            {{-- Pagination buttons --}}
            <ul class="m-auto mb-4 inline-flex items-center space-x-1 rtl:space-x-reverse">
                {{-- First page --}}
                <li>
                    <button
                        type="button"
                        class="flex justify-center rounded-full bg-white-light p-2 font-semibold text-dark transition hover:bg-primary hover:text-white dark:bg-[#191e3a] dark:text-white-light dark:hover:bg-primary {{ $posts->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }}"
                        @if (! $posts->onFirstPage()) wire:click="gotoPage(1)" @endif
                    >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rtl:rotate-180">
                            <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"></path>
                            <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5"
                                  stroke="currentColor" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </li>

                {{-- Previous page --}}
                <li>
                    <button
                        type="button"
                        class="flex justify-center rounded-full bg-white-light p-2 font-semibold text-dark transition hover:bg-primary hover:text-white dark:bg-[#191e3a] dark:text-white-light dark:hover:bg-primary {{ $posts->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }}"
                        @if (! $posts->onFirstPage()) wire:click="previousPage" @endif
                    >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rtl:rotate-180">
                            <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </li>

                {{-- Page numbers --}}
                @for ($page = 1; $page <= $posts->lastPage(); $page++)
                    <li>
                        <button
                            type="button"
                            class="flex justify-center rounded-full px-3.5 py-2 font-semibold transition
                            {{ $page == $posts->currentPage()
                                ? 'bg-primary text-white dark:bg-primary dark:text-white-light'
                                : 'bg-white-light text-dark hover:bg-primary hover:text-white dark:bg-[#191e3a] dark:text-white-light dark:hover:bg-primary'
                            }}"
                            wire:click="gotoPage({{ $page }})"
                        >
                            {{ $page }}
                        </button>
                    </li>
                @endfor

                {{-- Next page --}}
                <li>
                    <button
                        type="button"
                        class="flex justify-center rounded-full bg-white-light p-2 font-semibold text-dark transition hover:bg-primary hover:text-white dark:bg-[#191e3a] dark:text-white-light dark:hover:bg-primary {{ $posts->currentPage() == $posts->lastPage() ? 'opacity-50 cursor-not-allowed' : '' }}"
                        @if ($posts->currentPage() < $posts->lastPage()) wire:click="nextPage" @endif
                    >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rtl:rotate-180">
                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </li>

                {{-- Last page --}}
                <li>
                    <button
                        type="button"
                        class="flex justify-center rounded-full bg-white-light p-2 font-semibold text-dark transition hover:bg-primary hover:text-white dark:bg-[#191e3a] dark:text-white-light dark:hover:bg-primary {{ $posts->currentPage() == $posts->lastPage() ? 'opacity-50 cursor-not-allowed' : '' }}"
                        @if ($posts->currentPage() < $posts->lastPage()) wire:click="gotoPage({{ $posts->lastPage() }})" @endif
                    >
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rtl:rotate-180">
                            <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"></path>
                            <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5"
                                  stroke="currentColor" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>
    @endif

</div>
