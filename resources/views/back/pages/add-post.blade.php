@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-lg font-semibold dark:text-white-light">Add New Post</h2>
        <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600" href="javascript:;" @click="toggleCode('code1')">
        </a>
    </div>

    <form action="" method="post" id="addPostForm">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <input type="text" placeholder="Some Text..." class="form-input" required="">
                        </div>
                        <div>
                            <label class="form-label" for="ctnTextarea">Post Content</label>
                            <textarea name="post_content" id="ctnTextarea" rows="3" class="form-textarea" placeholder="Content..." required=""></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ctnFile">Featured image</label>
                            <input id="ctnFile" type="file" class="rtl:file-ml-5 form-input p-0 file:border-0 file:bg-primary/90 file:py-2 file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5" required="" name="featured_image">
                        </div>
                        <div class="image_holder mb-5" style="max-width: 250px;">
                            <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-image=''>
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
        });
    </script>

@endpush
