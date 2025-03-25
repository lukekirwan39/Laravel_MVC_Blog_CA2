<div>
    <div class="mb-5">
        <div class="flex flex-col items-center justify-center">
            <img
                src="{{ $author->picture }}"
                alt="Author Avatar"
                class="mb-5 h-24 w-24 rounded-full object-cover"
            />
            <p class="text-xl font-semibold text-primary">{{ $author->name }}</p>
        </div>
        <ul class="mx-auto mt-5 flex w-full max-w-md flex-col space-y-4 font-semibold text-white-dark">            <li>
                <a href="javascript:;" class="flex items-center gap-2">
                    <!-- User Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0">
                        <!-- Head -->
                        <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.5" />
                        <!-- Shoulders -->
                        <path d="M4 20C4 16.6863 7.13401 14 11 14H13C16.866 14 20 16.6863 20 20"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    <!-- Username Display -->
                    <span class="text-primary whitespace-normal break-words">@ {{ $author->username }} | {{ $author->authorType->name }}</span>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="flex items-center gap-2">
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0">
                        <path opacity="0.5" d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                    <span class="truncate text-primary">{{ $author->email }}</span></a>
            </li>
            <li class="col-auto d-md-flex">
                <input type="file" name="file" id="changeAuthorPictureFile" style="display: none" onchange="this.dispatchEvent(new InputEvent('input'))">
                <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('changeAuthorPictureFile').click();">
                    Change Picture
                </a>
            </li>
        </ul>
    </div>
</div>
