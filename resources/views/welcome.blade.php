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
                        <div>
                            <form class="card card-md">
                                <div class="mx-auto w-full max-w-[440px]">
                                    <div class="mb-10">
                                        <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">Laravel 8 Blog</h1>
                                        <p class="text-base font-bold leading-normal text-white-dark">A simple and elegant blog powered by Laravel</p>
                                    </div>
                                    <button type="submit" class="btn btn-gradient !mt-6 w-full border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                                        <a href="{{ route('author.login') }}">
                                            Go to Login Page
                                        </a>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
