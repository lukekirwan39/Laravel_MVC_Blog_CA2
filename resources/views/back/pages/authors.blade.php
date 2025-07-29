@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Authors')
@section('content')

@livewire('authors')

@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('authors', () => ({
                // UI State
                displayType: 'list',
                addAuthorModal: false,

                // Form Params
                defaultParams: {},
                params: {},

                init() {
                    this.$watch('addAuthorModal', (val) => {
                        if (!val) {
                            Livewire.emit('resetForm');
                        }
                    });

                    window.addEventListener('hide_add_author_modal', () => {
                        this.addAuthorModal = false;
                    });
                },
                closeModal() {
                    this.addAuthorModal = false;
                },

                editUser(user) {
                    this.params = { ...this.defaultParams };
                    if (user) this.params = JSON.parse(JSON.stringify(user));
                    this.addAuthorModal = true;
                },

                setDisplayType(type) {
                    this.displayType = type;
                },

                showMessage(msg = '', type = 'success') {
                    Swal.fire({
                        toast: true,
                        position: 'top',
                        icon: type,
                        title: msg,
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '10px 20px',
                    });
                }
            }));
        });

        // 🔁 Unified global Swal alert (toast style to match above)
        const showSwalAlert = (type, title, text) => {
            Swal.fire({
                toast: true,
                icon: type,
                title: title,
                text: text,
                position: 'top',
                showConfirmButton: false,
                timer: 1500,
                padding: '10px 20px',
            });
        };

        // Global listeners for `swal:success` and `swal:error`
        ['success', 'error'].forEach(type => {
            window.addEventListener(`swal:${type}`, event => {
                showSwalAlert(type, event.detail.title, event.detail.text);
            });
        });
    </script>
@endpush
