@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-semibold dark:text-white-light">Add New Post</h2>
        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600" href="javascript:;" @click="toggleCode('code1')">
        </a>
    </div>

    <form action="{{ route('author.posts.create') }}" method="post"
          id="addPostForm" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]"
    enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-label" for="ctnTextarea">Post Name</label>
                            <input type="text" placeholder="Some Text..." class="form-input" name="post_title">
                            <span class="text-danger error-text post_title_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ctnTextarea">Post Content</label>
                            <textarea name="post_content" id="ctnTextarea" rows="3" class="form-textarea" placeholder="Content..." ></textarea>
                            <span class="text-danger error-text post_content_error"></span>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="form-label">Post Category</label>
                                <select class="form-select" name="post_category" name="post_category">
                                    <option value="">No selected</option>
                                    @foreach(\App\Models\SubCategory::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->subcategory_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text post_category_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="ctnFile">Featured image</label>
                                <input id="ctnFile" type="file" class="rtl:file-ml-5 form-input p-0 file:border-0 file:bg-primary/90 file:py-2 file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5" name="featured_image">
                                <span class="text-danger error-text featured_image_error"></span>
                            </div>
                            <div class="image_holder mb-5" style="max-width: 250px;">
                                <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-image=''>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save post</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.querySelector('input[type="file"][name="featured_image"]');
            const previewImg = document.getElementById('image-previewer');
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

            fileInput.addEventListener('change', function () {
                const file = this.files[0];

                if (file) {
                    if (!allowedTypes.includes(file.type)) {
                        alert('Only JPG, JPEG, and PNG files are allowed.');
                        this.value = ''; // Clear input
                        previewImg.src = '';
                        previewImg.style.display = 'none';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewImg.src = '';
                    previewImg.style.display = 'none';
                }
            });

            $('form#addPostForm').on('submit',function (e) {
                e.preventDefault();
                let form = this;
                let formData = new FormData(form);
                $.ajax({
                    url: $(form).attr('action'),
                    method:$(form).attr('method'),
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $(form).find('span.error-text').text('');
                    },
                    success: function (response) {
                        if (response.code == 1) {
                            $(form)[0].reset();
                            $('div.image_holder').html('');
                        } else {
                            if (response.errors) {
                                Object.keys(response.errors).forEach(function (key) {
                                    $(`.${key}_error`).text(response.errors[key][0]);
                                });
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function (prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });
            });
        });
    </script>

@endpush
