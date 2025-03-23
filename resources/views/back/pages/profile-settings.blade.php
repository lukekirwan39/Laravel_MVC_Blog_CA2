@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Profile Settings')
@section('content')

<div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">

    <div class="main-content flex flex-col min-h-screen">

        <div class="animate__animated p-6" :class="[$store.app.animation]">
            <!-- start main content section -->
            <div>
                <ul class="flex space-x-2 rtl:space-x-reverse">
                    <li>
                        <a href="{{ route('author.profile') }}" class="text-primary hover:underline">Users</a>
                    </li>
                    <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                        <span>Account Settings</span>
                    </li>
                </ul>
                <div class="pt-5">
                    <div class="mb-5 flex items-center justify-between">
                        <h5 class="text-lg font-semibold dark:text-white-light">Settings</h5>
                    </div>
                    <div x-data="{tab: 'personal-details'}">
                        <ul class="mb-5 overflow-y-auto whitespace-nowrap border-b border-[#ebedf2] font-semibold dark:border-[#191e3a] sm:flex">
                            <li class="inline-block">
                                <a href="javascript:;" class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary" :class="{'!border-primary text-primary' : tab == 'personal-details'}" @click="tab='personal-details'">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                        <!-- Head -->
                                        <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.5" />
                                        <!-- Shoulders -->
                                        <path d="M4 20C4 16.6863 7.13401 14 11 14H13C16.866 14 20 16.6863 20 20"
                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                    Personal Details
                                </a>
                            </li>
                            <li class="inline-block">
                                <a href="javascript:;" class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary" :class="{'!border-primary text-primary' : tab == 'change-password'}" @click="tab='change-password'">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                        <path d="M17 9H7V7C7 4.79086 8.79086 3 11 3H13C15.2091 3 17 4.79086 17 7V9Z"
                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <rect x="5" y="9" width="14" height="12" rx="2"
                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 15V17"
                                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Change Password
                                </a>
                            </li>
                        </ul>
                        @livewire('author-personal-details')
                        <template x-if="tab === 'change-password'">
                            <div>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </template>
                        <template x-if="tab === 'preferences'">
                            <div class="switch">
                                <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-2">
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Choose Theme</h5>
                                        <div class="flex justify-around">
                                            <label class="inline-flex cursor-pointer">
                                                <input class="form-radio cursor-pointer ltr:mr-4 rtl:ml-4" type="radio" name="flexRadioDefault" checked="">
                                                <span>
                                                            <img class="ms-3" width="100" height="68" alt="settings-dark" src="assets/images/settings-light.svg">
                                                        </span>
                                            </label>

                                            <label class="inline-flex cursor-pointer">
                                                <input class="form-radio cursor-pointer ltr:mr-4 rtl:ml-4" type="radio" name="flexRadioDefault">
                                                <span>
                                                            <img class="ms-3" width="100" height="68" alt="settings-light" src="assets/images/settings-dark.svg">
                                                        </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Activity data</h5>
                                        <p>Download your Summary, Task and Payment History Data</p>
                                        <button type="button" class="btn btn-primary">Download Data</button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Public Profile</h5>
                                        <p>Your <span class="text-primary">Profile</span> will be visible to anyone on the network.</p>
                                        <label class="relative h-6 w-12">
                                            <input type="checkbox" class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0" id="custom_switch_checkbox1">
                                            <span for="custom_switch_checkbox1" class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"></span>
                                        </label>
                                    </div>
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Show my email</h5>
                                        <p>Your <span class="text-primary">Email</span> will be visible to anyone on the network.</p>
                                        <label class="relative h-6 w-12">
                                            <input type="checkbox" class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0" id="custom_switch_checkbox2">
                                            <span for="custom_switch_checkbox2" class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"></span>
                                        </label>
                                    </div>
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Enable keyboard shortcuts</h5>
                                        <p>When enabled, press <span class="text-primary">ctrl</span> for help</p>
                                        <label class="relative h-6 w-12">
                                            <input type="checkbox" class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0" id="custom_switch_checkbox3">
                                            <span for="custom_switch_checkbox3" class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"></span>
                                        </label>
                                    </div>
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Hide left navigation</h5>
                                        <p>Sidebar will be <span class="text-primary">hidden</span> by default</p>
                                        <label class="relative h-6 w-12">
                                            <input type="checkbox" class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0" id="custom_switch_checkbox4">
                                            <span for="custom_switch_checkbox4" class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"></span>
                                        </label>
                                    </div>
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Advertisements</h5>
                                        <p>Display <span class="text-primary">Ads</span> on your dashboard</p>
                                        <label class="relative h-6 w-12">
                                            <input type="checkbox" class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0" id="custom_switch_checkbox5">
                                            <span for="custom_switch_checkbox5" class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"></span>
                                        </label>
                                    </div>
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Social Profile</h5>
                                        <p>Enable your <span class="text-primary">social</span> profiles on this network</p>
                                        <label class="relative h-6 w-12">
                                            <input type="checkbox" class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0" id="custom_switch_checkbox6">
                                            <span for="custom_switch_checkbox6" class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template x-if="tab === 'danger-zone'">
                            <div class="switch">
                                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Purge Cache</h5>
                                        <p>Remove the active resource from the cache without waiting for the predetermined cache expiry time.</p>
                                        <button class="btn btn-secondary">Clear</button>
                                    </div>
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Deactivate Account</h5>
                                        <p>You will not be able to receive messages, notifications for up to 24 hours.</p>
                                        <label class="relative h-6 w-12">
                                            <input type="checkbox" class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0" id="custom_switch_checkbox7">
                                            <span for="custom_switch_checkbox7" class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"></span>
                                        </label>
                                    </div>
                                    <div class="panel space-y-5">
                                        <h5 class="mb-4 text-lg font-semibold">Delete Account</h5>
                                        <p>Once you delete the account, there is no going back. Please be certain.</p>
                                        <button class="btn btn-danger btn-delete-account">Delete my account</button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <!-- end main content section -->

        </div>
    </div>
</div>

<script src="./back/assets/js/alpine-collaspe.min.js"></script>
<script src="./back/assets/js/alpine-persist.min.js"></script>
<script defer="" src="./back/assets/js/alpine-ui.min.js"></script>
<script defer="" src="./back/assets/js/alpine-focus.min.js"></script>
<script defer="" src="./back/assets/js/alpine.min.js"></script>
<script src="./back/assets/js/custom.js"></script>

<script>
    document.addEventListener('alpine:init', () => {
        // main section
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

        // theme customization
        Alpine.data('customizer', () => ({
            showCustomizer: false,
        }));

        // sidebar section
        Alpine.data('sidebar', () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));

        // header section
        Alpine.data('header', () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [
                {
                    id: 1,
                    profile: 'user-profile.jpeg',
                    message: '<strong class="text-sm mr-1">StarCode Kh</strong>invite you to <strong>Prototyping</strong>',
                    time: '45 min ago',
                },
                {
                    id: 2,
                    profile: 'profile-34.jpeg',
                    message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                    time: '9h Ago',
                },
                {
                    id: 3,
                    profile: 'profile-16.jpeg',
                    message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                    time: '9h Ago',
                },
            ],

            messages: [
                {
                    id: 1,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                    title: 'Congratulations!',
                    message: 'Your OS has been updated.',
                    time: '1hr',
                },
                {
                    id: 2,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                    title: 'Did you know?',
                    message: 'You can switch between artboards.',
                    time: '2hr',
                },
                {
                    id: 3,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                    title: 'Something went wrong!',
                    message: 'Send Reposrt',
                    time: '2days',
                },
                {
                    id: 4,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                    title: 'Warning',
                    message: 'Your password strength is low.',
                    time: '5days',
                },
            ],

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

            removeNotification(value) {
                this.notifications = this.notifications.filter((d) => d.id !== value);
            },

            removeMessage(value) {
                this.messages = this.messages.filter((d) => d.id !== value);
            },
        }));
    });
</script>
</body>
</html>


@endsection
