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
</div>
