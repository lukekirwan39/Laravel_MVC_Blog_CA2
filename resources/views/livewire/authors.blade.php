<div>

    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->

        <div x-data="authors">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <h2 class="text-xl">Authors</h2>
                <div class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                    <div class="flex gap-3">
                        <div wire:ignore.self class="modal modal-blur fade" id="add_author_modal">
                            <button type="button" class="btn btn-primary" @click="editUser">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                    <circle cx="10" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path opacity="0.5"
                                          d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z"
                                          stroke="currentColor" stroke-width="1.5"></path>
                                    <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor"
                                          stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                Add Author
                            </button>
                            <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                 :class="addAuthorModal &amp;&amp; '!block'">
                                <div class="flex min-h-screen items-center justify-center px-4"
                                     @click.self="addAuthorModal = false">
                                    <div x-show="addAuthorModal" x-transition="" x-transition.duration.300=""
                                         class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full"
                                         style="display: none;">
                                        <button type="button"
                                                class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                                @click="addAuthorModal = false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                 class="h-6 w-6">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                        <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]">Add Author</h3>
                                        <div
                                            x-show="addAuthorModal"
                                            x-transition
                                            @keydown.escape.window="closeModal()"
                                            @click.self="closeModal()"
                                            class="p-5"
                                        >
                                            <form wire:submit.prevent="addAuthor()" method="post"
                                                  class="space-y-5">
                                                <div class="mb-5">
                                                    <label for="name">Name</label>
                                                    <input id="name" type="text" placeholder="Enter author name" class="form-input" wire:model="name">
                                                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="mb-5">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="text" placeholder="Enter author email" class="form-input" wire:model="email">
                                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="mb-5">
                                                    <label for="number">Username</label>
                                                    <input id="number" type="text" placeholder="Enter author username" class="form-input" wire:model="username">
                                                    <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="form-group mb-5">
                                                    <label class="form-label">Author Type</label>
                                                    <div>
                                                        <select class="form-select" wire:model="author_type">
                                                            <option value="">--- No Selected ---</option>
                                                            @foreach(\App\Models\Type::all() as $type)
                                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <span class="text-danger">@error('author_type'){{ $message }}@enderror</span>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label block mb-2">Is direct publisher?</label>
                                                    <div class="flex gap-6">
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" name="direct_publisher" value="0" class="form-check-input mr-2" wire:model="direct_publisher">
                                                            <span class="form-check-label">No</span>
                                                        </label>
                                                        <label class="inline-flex items-center">
                                                            <input type="radio" name="direct_publisher" value="1" class="form-check-input mr-2" wire:model="direct_publisher">
                                                            <span class="form-check-label">Yes</span>
                                                        </label>
                                                    </div>
                                                    <span class="text-danger">@error('direct_publisher'){{ $message }}@enderror</span>
                                                </div>


                                                <div class="mt-8 flex items-center justify-end">
                                                    <button type="button" class="btn btn-outline-danger" @click="addAuthorModal = false" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-primary p-2 bg-primary text-white"
                                    :class="{ 'bg-primary text-white': displayType === 'list' }"
                                    @click="setDisplayType('list')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                    <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path opacity="0.5" d="M2 12.5L3.21429 14L7.5 10" stroke="currentColor"
                                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round"></path>
                                    <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-primary p-2"
                                    :class="{ 'bg-primary text-white': displayType === 'grid' }"
                                    @click="setDisplayType('grid')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                    <path opacity="0.5"
                                          d="M2.5 6.5C2.5 4.61438 2.5 3.67157 3.08579 3.08579C3.67157 2.5 4.61438 2.5 6.5 2.5C8.38562 2.5 9.32843 2.5 9.91421 3.08579C10.5 3.67157 10.5 4.61438 10.5 6.5C10.5 8.38562 10.5 9.32843 9.91421 9.91421C9.32843 10.5 8.38562 10.5 6.5 10.5C4.61438 10.5 3.67157 10.5 3.08579 9.91421C2.5 9.32843 2.5 8.38562 2.5 6.5Z"
                                          stroke="currentColor" stroke-width="1.5"></path>
                                    <path opacity="0.5"
                                          d="M13.5 17.5C13.5 15.6144 13.5 14.6716 14.0858 14.0858C14.6716 13.5 15.6144 13.5 17.5 13.5C19.3856 13.5 20.3284 13.5 20.9142 14.0858C21.5 14.6716 21.5 15.6144 21.5 17.5C21.5 19.3856 21.5 20.3284 20.9142 20.9142C20.3284 21.5 19.3856 21.5 17.5 21.5C15.6144 21.5 14.6716 21.5 14.0858 20.9142C13.5 20.3284 13.5 19.3856 13.5 17.5Z"
                                          stroke="currentColor" stroke-width="1.5"></path>
                                    <path
                                        d="M2.5 17.5C2.5 15.6144 2.5 14.6716 3.08579 14.0858C3.67157 13.5 4.61438 13.5 6.5 13.5C8.38562 13.5 9.32843 13.5 9.91421 14.0858C10.5 14.6716 10.5 15.6144 10.5 17.5C10.5 19.3856 10.5 20.3284 9.91421 20.9142C9.32843 21.5 8.38562 21.5 6.5 21.5C4.61438 21.5 3.67157 21.5 3.08579 20.9142C2.5 20.3284 2.5 19.3856 2.5 17.5Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                    <path
                                        d="M13.5 6.5C13.5 4.61438 13.5 3.67157 14.0858 3.08579C14.6716 2.5 15.6144 2.5 17.5 2.5C19.3856 2.5 20.3284 2.5 20.9142 3.08579C21.5 3.67157 21.5 4.61438 21.5 6.5C21.5 8.38562 21.5 9.32843 20.9142 9.91421C20.3284 10.5 19.3856 10.5 17.5 10.5C15.6144 10.5 14.6716 10.5 14.0858 9.91421C13.5 9.32843 13.5 8.38562 13.5 6.5Z"
                                        stroke="currentColor" stroke-width="1.5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div x-init="init()" class="relative">
                        <input
                            type="text"
                            placeholder="Search Authors"
                            class="peer form-input py-2 ltr:pr-11 rtl:pl-11"
                            @input="searchAuthors"
                        >
                        <div
                            class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary ltr:right-[11px] rtl:left-[11px]">
                            <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                                        opacity="0.5"></circle>
                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                      stroke-linecap="round"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel mt-5 overflow-hidden border-0 p-0">
                <div x-show="displayType === 'list'" class="table-responsive">
                    <div class="table-responsive">
                            <table class="table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th class="!text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($authors as $author)
                                    <tr>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <span class="block h-8 w-8 rounded-full bg-cover bg-center"
                                                      style="background-image: url('{{ $author->picture ?? asset('images/default-user.png') }}');"></span>
                                                <div>{{ $author->name }}</div>
                                            </div>
                                        </td>
                                        <td>{{ $author->email }}</td>
                                        <td>
                                            <div class="mt-3">
                                                <span
                                                    class="text-primary whitespace-normal break-words">{{ $author->authorType->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center justify-center gap-4">
                                                <button type="button" class="btn btn-sm btn-outline-primary"
                                                        wire:click.prevent="editAuthor({{ $author }})">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                        @click="deleteUser({{ json_encode($author) }})">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-danger py-4">No Author Found!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div x-show="displayType === 'grid'">
                <div class="my-5 grid w-full grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
                    @forelse($authors as $author)
                        <div class="relative overflow-hidden rounded-md bg-white text-center shadow dark:bg-[#1c232f] transition hover:shadow-lg">
                        <div class="relative h-36 bg-[url('../images/notification-bg.png')] bg-cover bg-center">
                                <div class="flex justify-center">
                                    <span
                                        class="block h-20 w-20 rounded-full bg-cover bg-center border-4 border-white shadow-md"
                                        style="background-image: url('{{ $author->picture ?? asset('images/default-user.png') }}')">
                                    </span>
                                </div>
                            </div>

                            <div class="pt-16 px-6 pb-24">
                                <div class="rounded-md bg-white px-2 py-4 shadow-md dark:bg-gray-900">
                                    <div class="text-xl font-semibold">{{ $author->name }}</div>
                                    <div class="text-sm text-gray-500 dark:text-white-dark">{{ $author->role }}</div>

                                    <div class="mt-6 flex items-center justify-around text-sm text-gray-700 dark:text-white-dark">
                                        <div class="flex flex-col items-center">
                                            <div class="text-info font-semibold">{{ $author->posts }}</div>
                                            <div>Posts</div>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <div class="text-info font-semibold"></div>
                                            <div>Following</div>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <div class="text-info font-semibold"></div>
                                            <div>Followers</div>
                                        </div>
                                    </div>

                                    <!-- Social Media Links -->
                                    <div class="mt-4">
                                        <ul class="flex items-center justify-center space-x-4 rtl:space-x-reverse">
                                            <li>
                                                <a href="javascript:"
                                                   class="btn btn-outline-primary h-7 w-7 rounded-full p-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="1.5" stroke-linecap="round"
                                                         stroke-linejoin="round" class="h-4 w-4">
                                                        <path
                                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:"
                                                   class="btn btn-outline-primary h-7 w-7 rounded-full p-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="1.5" stroke-linecap="round"
                                                         stroke-linejoin="round" class="h-4 w-4">
                                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                        <path
                                                            d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:"
                                                   class="btn btn-outline-primary h-7 w-7 rounded-full p-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="1.5" stroke-linecap="round"
                                                         stroke-linejoin="round" class="h-4 w-4">
                                                        <path
                                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                        <rect x="2" y="9" width="4" height="12"></rect>
                                                        <circle cx="4" cy="4" r="2"></circle>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:"
                                                   class="btn btn-outline-primary h-7 w-7 rounded-full p-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="1.5" stroke-linecap="round"
                                                         stroke-linejoin="round" class="h-4 w-4">
                                                        <path
                                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-6 grid grid-cols-1 gap-3 text-left text-sm text-gray-600 dark:text-white-dark">
                                    <div class="flex items-center"><strong class="mr-2">Email:</strong> {{ $author->email }}</div>
                                    <div class="flex items-center"><strong class="mr-2">Username:</strong> {{ $author->username }}</div>
                                    <div class="flex items-center">
                                        <strong class="mr-2">Type:</strong>
                                        <span class="text-primary">{{ $author->authorType->name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>


                            <div class="absolute bottom-0 flex w-full gap-4 p-6">
                                <button type="button" class="btn btn-outline-primary w-1/2">Edit</button>

                                <!-- Edit Author Modal -->
                                <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                     :class="addAuthorModal &amp;&amp; '!block'" wire:ignore.self id="edit_author_modal">
                                    <div class="flex min-h-screen items-center justify-center px-4" @click.self="addAuthorModal = false">
                                        <div x-show="addAuthorModal" x-transition="" x-transition.duration.300=""
                                             class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full"
                                             style="display: none;">
                                            <button type="button" class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4" @click="addAuthorModal = false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                     class="h-6 w-6">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                            <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]">Edit Author</h3>
                                            <div x-show="addAuthorModal" x-transition @keydown.escape.window="closeModal()" @click.self="closeModal()" class="p-5">
                                                <form wire:submit.prevent="updateAuthor()" method="post" class="space-y-5">
                                                    <input type="text" wire:model="selected_author_id">
                                                    <div class="mb-5">
                                                        <label for="name">Name</label>
                                                        <input id="name" type="text" placeholder="Enter author name" class="form-input" wire:model="name">
                                                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="email">Email</label>
                                                        <input id="email" type="text" placeholder="Enter author email" class="form-input" wire:model="email">
                                                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="number">Username</label>
                                                        <input id="number" type="text" placeholder="Enter author username" class="form-input" wire:model="username">
                                                        <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                                                    </div>
                                                    <div class="form-group mb-5">
                                                        <label class="form-label">Author Type</label>
                                                        <div>
                                                            <select class="form-select" wire:model="author_type">
                                                                @foreach(\App\Models\Type::all() as $type)
                                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <span class="text-danger">@error('author_type'){{ $message }}@enderror</span>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label block mb-2">Is direct publisher?</label>
                                                        <div class="flex gap-6">
                                                            <label class="inline-flex items-center">
                                                                <input type="radio" name="direct_publisher" value="0" class="form-check-input mr-2" wire:model="direct_publisher">
                                                                <span class="form-check-label">No</span>
                                                            </label>
                                                            <label class="inline-flex items-center">
                                                                <input type="radio" name="direct_publisher" value="1" class="form-check-input mr-2" wire:model="direct_publisher">
                                                                <span class="form-check-label">Yes</span>
                                                            </label>
                                                        </div>
                                                        <span class="text-danger">@error('direct_publisher'){{ $message }}@enderror</span>
                                                    </div>

                                                    <div class="mb-3">
                                                        <div >Blocked</div>
                                                        <label class="w-12 h-6 relative">
                                                            <input type="checkbox" class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer" id="custom_switch_checkbox4" />
                                                            <span for="custom_switch_checkbox4" class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
                                                        </label>
                                                    </div>

                                                    <div class="mt-8 flex items-center justify-end">
                                                        <button type="button" class="btn btn-outline-danger" @click="addAuthorModal = false" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-outline-danger w-1/2" @click="deleteUser({{ $author->id }})">Delete</button>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center text-danger py-4">No Author Found!</div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- end main content section -->

    </div>

</div>
