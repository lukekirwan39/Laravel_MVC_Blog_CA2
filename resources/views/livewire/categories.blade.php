<div>
    <div class="flex flex-col gap-4 md:flex-row">
        <!-- Panel 1 -->
        <div class="panel w-full md:w-1/2 flex flex-col">
            <div class="mb-5 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Categories</h5>
                <button class="btn btn-sm btn-primary" @click.prevent="$store.categoryModal.toggle()" wire:click="resetCategoryForm">Add Category</button>
            </div>
            <div class="mb-5">
                <div class="flex-1">
                    <div class="panel">
                        <div class="mb-5">
                            <!-- ✅ Scrollable table wrapper -->
                            <div class="w-full overflow-x-auto block">
                                <table class="w-full min-w-[800px] table-auto divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                                    <tr>
                                        <th class="px-4 py-2">Category name</th>
                                        <th class="px-4 py-2">N. of Subcategories</th>
                                        <th class="px-4 py-2 text-center">Edit</th>
                                        <th class="px-4 py-2 text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $category)


                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2">{{ $category->category_name }}</td>
                                        <td class="px-4 py-2">{{ $category->subcategories->count() }}</td>
                                        <td class="text-center px-4 py-2">
                                            <button class="text-primary" x-tooltip="Edit"
                                                    wire:click.prevent='editCategory({{ $category->id }})'>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="text-center px-4 py-2">
                                            <button type="button" x-tooltip="Delete" class="text-danger">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto">
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>

                                    @empty
                                        <tr>
                                            <td colspan="3"><span class="text-danger">No category found.</span></td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- end scrollable -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel 2 -->
        <div class="panel w-full md:w-1/2 flex flex-col">
            <div class="mb-5 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Subcategories</h5>
                <button class="btn btn-sm btn-primary" @click.prevent="$store.subcategoryModal.toggle()"
                wire:click="resetSubCategoryForm">Add Subcategories</button>
            </div>
            <div class="mb-5">
                <div class="flex-1">
                    <div class="panel">
                        <div class="mb-5">
                            <!-- ✅ Scrollable table wrapper -->
                            <div class="w-full overflow-x-auto block">
                                <table class="w-full min-w-[800px] table-auto divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                                    <tr>
                                        <th class="px-4 py-2">Subcategory name</th>
                                        <th class="px-4 py-2">Parent Category</th>
                                        <th class="px-4 py-2">N. of posts</th>
                                        <th class="px-4 py-2 text-center">Edit</th>
                                        <th class="px-4 py-2 text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($subcategories as $subcategory)

                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2">{{ $subcategory->subcategory_name }}</td>
                                        <td class="whitespace-nowrap px-4 py-2">{{ $subcategory->parentcategory->category_name ?? 'N/A' }}</td>
                                        <td class="px-4 py-2">{{ $subcategory->posts->count() }}</td>
                                        <td class="text-center px-4 py-2">
                                            <button class="text-primary" x-tooltip="Edit"
                                                    wire:click.prevent='editSubCategory({{ $subcategory->id }})'>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"></path>
                                                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="text-center px-4 py-2">
                                            <button type="button" x-tooltip="Delete" class="text-danger">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto">
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>

                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <span class="text-danger">No subcategory found.</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- end scrollable -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div x-data
         x-show="$store.categoryModal.open"
         x-transition
         class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60"
         style="display: none;"
         @click.self="$store.categoryModal.close()"
    >
        <div wire:ignore.self class="panel w-full max-w-lg overflow-hidden rounded-lg border-0 p-0 bg-white dark:bg-[#121c2c]" id="categories_modal">
            <div class="flex items-center justify-between px-5 py-3 border-b">
                <h5 class="text-lg font-bold">
                    {{ $updateCategoryMode ? 'Update Category' : 'Add Category' }}
                </h5>
                <button @click="$store.categoryModal.close()" class="text-gray-600 hover:text-black">✕</button>
            </div>
            <form class="p-5" method="POST"
            @if($updateCategoryMode)
                wire:submit.prevent='updateCategory()'
            @else
                wire:submit.prevent='addCategory()'
            @endif>

                <div class="text-base font-medium text-[#1f2937] dark:text-white-dark/70">
                    @if($updateCategoryMode)
                        <input type="hidden" wire:model='selected_category_id'>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-input" placeholder="Category name" wire:model="category_name">
                        <span class="text-danger">@error('category_name'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-between">
                    <!-- Left-aligned Close button -->
                    <button
                        type="button"
                        class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-100 transition"
                        @click="$store.categoryModal.close()"
                    >
                        Close
                    </button>

                    <!-- Right-aligned Submit button -->
                    <div class="flex items-center gap-x-4">
                        <button type="submit" class="btn btn-primary">
                            {{ $updateCategoryMode ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div x-data
         x-show="$store.subcategoryModal.open"
         x-transition
         class="fixed inset-0 z-[999] flex items-center justify-center bg-black/60"
         style="display: none;"
         @click.self="$store.subcategoryModal.close()"
    >
        <div wire:ignore.self class="panel w-full max-w-lg overflow-hidden rounded-lg border-0 p-0 bg-white dark:bg-[#121c2c]" id="subcategoryModal">
            <div class="flex items-center justify-between px-5 py-3 border-b">
                <h5 class="text-lg font-bold">{{ $updateSubCategoryMode ? 'Update SubCategory' : 'Add SubCategory' }}</h5>
                <button @click="$store.subcategoryModal.close()" class="text-gray-600 hover:text-black">✕</button>
            </div>
            <form class="p-5" method="POST"
            @if($updateSubCategoryMode)
                wire:submit.prevent='updateSubCategory()'
            @else
                wire:submit.prevent='addSubCategory()'
            @endif>
                <div class="modal-body">
                    @if($updateSubCategoryMode)
                        <input type="hidden" wire:model='selected_subcategory_id'>
                    @endif
                <div class="mb-3 text-base font-medium text-[#1f2937] dark:text-white-dark/70">
                    <label for="" class="form-label">Parent Category</label>
                    <select
                        class="form-select bg-white text-gray-900 dark:bg-gray-800 dark:text-white border border-gray-300 focus:border-primary focus:ring focus:ring-primary/20"
                        wire:model="parent_category"
                    >
                        @if(!$updateSubCategoryMode)
                            <option value="">No Selected</option>
                        @endif
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('parent_category')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Subcategory name</label>
                    <input type="text" class="form-input" placeholder="Subcategory name" data-np-intersection-state="visible" wire:model='subcategory_name'>
                    <span class="text-danger">
                        @error('subcategory_name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-8 flex items-center justify-between">
                    <!-- Left-aligned button -->
                    <button
                        type="button"
                        class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-100 transition"
                        @click="$store.subcategoryModal.close()"
                    >
                        Close
                    </button>
                    <!-- Right-aligned buttons -->
                    <div class="flex items-center gap-x-4">
                        <button class="btn btn-primary">{{ $updateSubCategoryMode ? 'Update' : 'Save' }}</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>

</div>
