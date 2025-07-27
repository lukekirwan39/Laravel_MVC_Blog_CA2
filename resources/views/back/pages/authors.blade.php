@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Authors')
@section('content')

@livewire('authors')

@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('authors', () => ({
                // Default author fields
                defaultParams: {
                    id: null,
                    name: '',
                    email: '',
                    role: '',
                    phone: '',
                    location: '',
                },

                // UI State
                displayType: 'list',
                addAuthorModal: false,

                // Form and Data State
                params: {
                    id: null,
                    name: '',
                    email: '',
                    role: '',
                    phone: '',
                    location: '',
                },
                searchUser: '',
                authorList: [],
                filteredAuthorsList: [],

                init() {
                    this.filteredAuthorsList = this.authorList;
                    this.$watch('searchUser', () => this.searchAuthors());
                },

                searchAuthors() {
                    const keyword = this.searchUser.toLowerCase();
                    this.filteredAuthorsList = this.authorList.filter(author =>
                        author.name?.toLowerCase().includes(keyword)
                    );
                },

                editUser(user) {
                    this.params = { ...this.defaultParams }; // reset to default
                    if (user) {
                        this.params = JSON.parse(JSON.stringify(user)); // clone user data
                    }
                    this.addAuthorModal = true;
                },

                deleteUser(user) {
                    this.authorList = this.authorList.filter((d) => d.id != user.id);
                    // this.ids = this.ids.filter((d) => d != user.id);
                    this.searchAuthors();
                    this.showMessage('User has been deleted successfully.');
                },

                setDisplayType(type) {
                    this.displayType = type;
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px',
                    });
                },
            }));
        });
    </script>
@endpush
