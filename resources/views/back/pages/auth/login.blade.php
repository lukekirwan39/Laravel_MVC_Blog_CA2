@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')

    <div class="main-container min-h-screen text-black dark:text-white-dark">
        <div x-data="auth">
            <div class="absolute inset-0">
                <img src="./back/assets/images/auth/bg-gradient.png" alt="image" class="h-full w-full object-cover">
            </div>

            <div class="relative flex min-h-screen items-center justify-center bg-[url(../images/auth/map.png)] bg-cover bg-center bg-no-repeat px-6 py-10 dark:bg-[#060818] sm:px-16">
                <img src="./back/assets/images/auth/coming-soon-object1.png" alt="image" class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2">
                <img src="./back/assets/images/auth/coming-soon-object2.png" alt="image" class="absolute left-24 top-0 h-40 md:left-[30%]">
                <img src="./back/assets/images/auth/coming-soon-object3.png" alt="image" class="absolute right-0 top-0 h-[300px]">
                <img src="./back/assets/images/auth/polygon-object.svg" alt="image" class="absolute bottom-0 end-[28%]">
                <div class="relative w-full max-w-[870px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
                    <div class="relative flex flex-col justify-center rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 px-6 lg:min-h-[758px] py-20">
                        <div class="absolute top-6 end-6">
                            <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                                <a href="javascript:;" class="flex items-center gap-2.5 rounded-lg border border-white-dark/30 bg-white px-2 py-1.5 text-white-dark hover:border-primary hover:text-primary dark:bg-black" :class="{'!border-primary !text-primary' : open}" @click="toggle">
                                    <div>
                                        <img :src="`./back/assets/images/flags/${$store.app.locale.toUpperCase()}.svg`" alt="image" class="h-5 w-5 rounded-full object-cover" src="./back/assets/images/flags/EN.svg">
                                    </div>
                                    <div x-text="$store.app.locale" class="text-base font-bold uppercase">en</div>
                                    <span class="shrink-0" :class="{'rotate-180' : open}">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.99989 9.79988C6.59156 9.79988 6.18322 9.64238 5.87406 9.33321L2.07072 5.52988C1.90156 5.36071 1.90156 5.08071 2.07072 4.91154C2.23989 4.74238 2.51989 4.74238 2.68906 4.91154L6.49239 8.71488C6.77239 8.99488 7.22739 8.99488 7.50739 8.71488L11.3107 4.91154C11.4799 4.74238 11.7599 4.74238 11.9291 4.91154C12.0982 5.08071 12.0982 5.36071 11.9291 5.52988L8.12572 9.33321C7.81656 9.64238 7.40822 9.79988 6.99989 9.79988Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                </a>
                                <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="top-11 grid w-[280px] grid-cols-2 gap-y-2 !px-2 font-semibold text-dark ltr:-right-14 rtl:-left-14 dark:text-white-dark dark:text-white-light/90 sm:ltr:-right-2 sm:rtl:-left-2" style="display: none;">
                                    <template x-for="item in languages">
                                        <li>
                                            <a href="javascript:;" class="hover:text-primary" @click="$store.app.toggleLocale(item.value),toggle()" :class="{'bg-primary/10 text-primary' : $store.app.locale == item.value}">
                                                <img class="h-5 w-5 rounded-full object-cover" :src="`./back/assets/images/flags/${item.value.toUpperCase()}.svg`" alt="image">
                                                <span class="ltr:ml-3 rtl:mr-3" x-text="item.key"></span>
                                            </a>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        @livewire('author-login-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
