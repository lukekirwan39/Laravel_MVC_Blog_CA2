@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Register')
@section('content')

<div class="main-container min-h-screen text-black dark:text-white-dark">
    <div x-data="auth">
        <div class="absolute inset-0">
            <img src="/back/assets/images/auth/bg-gradient.png" alt="image" class="h-full w-full object-cover">
        </div>

        <div class="relative flex min-h-screen items-center justify-center bg-[url(../images/auth/map.png)] bg-cover bg-center bg-no-repeat px-6 py-10 dark:bg-[#060818] sm:px-16">
            <img src="/back/assets/images/auth/coming-soon-object1.png" alt="image" class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2">
            <img src="/back/assets/images/auth/coming-soon-object2.png" alt="image" class="absolute left-24 top-0 h-40 md:left-[30%]">
            <img src="/back/assets/images/auth/coming-soon-object3.png" alt="image" class="absolute right-0 top-0 h-[300px]">
            <img src="/back/assets/images/auth/polygon-object.svg" alt="image" class="absolute bottom-0 end-[28%]">
            <div class="relative w-full max-w-[870px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
                @livewire('author-register-form')
            </div>
        </div>
    </div>
</div>

<script src="assets/js/alpine-collaspe.min.js"></script>
<script src="assets/js/alpine-persist.min.js"></script>
<script defer="" src="assets/js/alpine-ui.min.js"></script>
<script defer="" src="assets/js/alpine-focus.min.js"></script>
<script defer="" src="assets/js/alpine.min.js"></script>

<script src="assets/js/custom.js"></script>

<script>
    // main section
    document.addEventListener('alpine:init', () => {
        Alpine.data('scrollToTop', () => ({
            showTopButton: false,
            init() {
                window.onscroll = () => {
                    this.scrollFunction();
                };
            },

            scrollFunction() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    this.showTopButton = true;
                } else {
                    this.showTopButton = false;
                }
            },

            goToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
        }));

        Alpine.data('auth', () => ({
            languages: [
                {
                    id: 1,
                    key: 'Khmer',
                    value: 'kh',
                },
                {
                    id: 2,
                    key: 'Danish',
                    value: 'da',
                },
                {
                    id: 3,
                    key: 'English',
                    value: 'en',
                },
                {
                    id: 4,
                    key: 'French',
                    value: 'fr',
                },
                {
                    id: 5,
                    key: 'German',
                    value: 'de',
                },
                {
                    id: 6,
                    key: 'Greek',
                    value: 'el',
                },
                {
                    id: 7,
                    key: 'Hungarian',
                    value: 'hu',
                },
                {
                    id: 8,
                    key: 'Italian',
                    value: 'it',
                },
                {
                    id: 9,
                    key: 'Japanese',
                    value: 'ja',
                },
                {
                    id: 10,
                    key: 'Polish',
                    value: 'pl',
                },
                {
                    id: 11,
                    key: 'Portuguese',
                    value: 'pt',
                },
                {
                    id: 12,
                    key: 'Russian',
                    value: 'ru',
                },
                {
                    id: 13,
                    key: 'Spanish',
                    value: 'es',
                },
                {
                    id: 14,
                    key: 'Swedish',
                    value: 'sv',
                },
                {
                    id: 15,
                    key: 'Turkish',
                    value: 'tr',
                },
                {
                    id: 16,
                    key: 'Arabic',
                    value: 'ae',
                },
            ],
        }));
    });
</script>

@endsection
