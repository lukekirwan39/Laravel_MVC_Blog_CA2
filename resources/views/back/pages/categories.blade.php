@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Categories')
@section('content')

    <div class="page-header d-print-none py-3 mb-4 border-bottom">
        <div class="container-fluid">
            <div class="mb-6">
                <h5 class="text-lg font-semibold dark:text-white-light">Categories & Subcategories</h5>
            </div>
        </div>
    </div>

    @livewire('categories')

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('categoryModal', {
                open: false,
                toggle() {
                    this.open = !this.open;
                },
                close() {
                    this.open = false;
                }
            });

            Alpine.store('subcategoryModal', {
                open: false,
                toggle() {
                    this.open = !this.open;
                },
                close() {
                    this.open = false;
                }
            });
        });
    </script>

@endsection
@push('scripts')
    <script>
        window.addEventListener('hideCategoriesModal', function (e) {
            Alpine.store('categoryModal').close();
        });
        window.addEventListener('showcategoriesModal', function () {
            Alpine.store('categoryModal').open = true;
        });

        window.addEventListener('hideSubCategoriesModal', function () {
            Alpine.store('subcategoryModal').close();
        });

        window.addEventListener('showSubCategoriesModal', function (){
            Alpine.store('subcategoryModal').open = true;
        })
    </script>
@endpush
