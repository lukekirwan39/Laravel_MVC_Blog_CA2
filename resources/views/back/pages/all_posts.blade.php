@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'All Posts')
@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">All Posts</h2>
    </div>

    @livewire('all-posts')
@endsection

@push('scripts')
    <script>
        window.addEventListener('deletePost', function (event){
            swal.fire({
                title: event.detail.title,
                imageWidth: 48,
                imageHeight: 48,
                html: event.detail.html,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, delete it',
                cancelButtonColor:'#d33',
                confirmButtonColor: '#3085d6',
                width: '300',
                allowOutsideClick: false,
            }).then(function (result){
                if(result.value){
                    window.livewire.emit('deletePostAction', event.detail.id);
                }
            })
        })
    </script>
@endpush
