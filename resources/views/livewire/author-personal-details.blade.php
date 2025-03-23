<div>

    <form class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]" wire:submit.prevent='UpdateDetails()'>
        <h6 class="mb-5 text-lg font-bold">General Information</h6>
        <div class="flex flex-col sm:flex-row">
            <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                <img src="{{ $author->picture }}" alt="image" class="mx-auto h-20 w-20 rounded-full object-cover md:h-32 md:w-32">
            </div>
            <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="name">Full Name</label>
                    <input id="name" type="text" placeholder="Full Name" class="form-input" wire:model='name'>
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="name">Username</label>
                    <input id="name" type="text" placeholder="Username" class="form-input" wire:model='username'>
                    <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        placeholder="Email"
                        class="form-input bg-gray-200 text-gray-700 dark:bg-[#1f2937] dark:text-gray-400"
                        disabled
                        wire:model="email"
                    >
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <div class="mb-4">
                    <label for="biography" class="form-label">Biography</label>
                    <textarea
                        id="biography"
                        name="biography"
                        rows="6"
                        class="form-input text-white-dark border border-gray-300 dark:border-gray-600 rounded w-full px-3 py-2 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        placeholder="Tell us a bit about yourself..."
                        wire:model='biography'
                    ></textarea>
                </div>
                <div class="mt-3 sm:col-span-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
    <form class="rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
        <h6 class="mb-5 text-lg font-bold">Social</h6>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div class="flex">
                <div class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                        <rect x="2" y="9" width="4" height="12"></rect>
                        <circle cx="4" cy="4" r="2"></circle>
                    </svg>
                </div>
                <input type="text" placeholder="starcodekh_turner" class="form-input">
            </div>
            <div class="flex">
                <div class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                    </svg>
                </div>
                <input type="text" placeholder="starcodekh_turner" class="form-input">
            </div>
            <div class="flex">
                <div class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                </div>
                <input type="text" placeholder="starcodekh_turner" class="form-input">
            </div>
            <div class="flex">
                <div class="flex items-center justify-center rounded bg-[#eee] px-3 font-semibold ltr:mr-2 rtl:ml-2 dark:bg-[#1b2e4b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                    </svg>
                </div>
                <input type="text" placeholder="starcodekh_turner" class="form-input">
            </div>
        </div>
    </form>
</div>
