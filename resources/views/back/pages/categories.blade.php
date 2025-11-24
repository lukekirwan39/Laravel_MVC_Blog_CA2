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

        // window.addEventListener('deleteCategory', function (event) {
        //     Swal.fire({
        //         title: event.detail.title,
        //         html: event.detail.message,
        //         showCloseButton: true,
        //         showCancelButton: true,
        //         cancelButtonText: 'Cancel',
        //         confirmButtonText: 'Yes, Delete',
        //         cancelButtonColor: '#d33',
        //         confirmButtonColor: '#3085d6',
        //         width: '300px',
        //         allowOutsideClick: false,
        //     }).then(function(result){
        //         if(result.isConfirmed){
        //             window.livewire.emit('deleteCategoryAction', event.detail.id);
        //         }
        //     });
        // });

        // window.addEventListener('deleteSubCategory', function (event) {
        //     swal.fire({
        //         title:event.detail.title,
        //         html:event.detail.message,
        //         showCloseButton:true,
        //         showCancelButton:true,
        //         cancelButtonText:'Cancel',
        //         confirmButtonText:'Yes, Delete',
        //         cancelButtonColor:'#d33',
        //         confirmButtonColor:'#3085d6',
        //         width:'300',
        //         allowOutsideClick:false,
        //     }).then(function(result){
        //         if(result.value){
        //             window.livewire.emit('deleteSubCategoryAction',event.detail.id);
        //         }
        //     })
        // });



        $('table tbody#sortable_category').sortable({
            update:function (event, ui){
                $(this).children().each(function (index){
                    if($(this).attr("data-ordering") != (index+1)){
                        $(this).attr("data-ordering", (index+1)).addClass("updated");
                    }
                });

                let positions = [];
                $(".updated").each(function (){
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                })

                window.livewire.emit("updateCategoryOrdering", positions);
            }
        })

        $('table tbody#sortable_subcategory').sortable({
            update:function (event, ui){
                $(this).children().each(function (index){
                    if($(this).attr("data-ordering") != (index+1)){
                        $(this).attr("data-ordering", (index+1)).addClass("updated");
                    }
                });

                let positions = [];
                $(".updated").each(function (){
                    positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
                    $(this).removeClass("updated");
                })

                window.livewire.emit("updatedSubCategoryOrdering", positions);
            }
        })

        window.addEventListener('ordering-updated', function(e) {
            Swal.fire({
                icon: 'success',
                title: e.detail.message,
                timer: 1200,
                showConfirmButton: false,
            });
        });
    </script>
@endpush
