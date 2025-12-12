@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Settings')
@section('content')
    <div class="panel">
        <div class="mb-5 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Settings</h5>
        </div>
        <div class="mb-5" x-data="{ tab: 'home'}">
            <div>
                <ul class="mb-5 overflow-y-auto whitespace-nowrap border-b border-[#ebedf2] font-semibold dark:border-[#191e3a] sm:flex">
                    <li class="inline-block">
                        <a href="javascript:"
                           class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary !border-primary text-primary"
                           :class="{'!border-primary text-primary' : tab == 'home'}" @click="tab='home'">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M12 15.5C13.933 15.5 15.5 13.933 15.5 12C15.5 10.067 13.933 8.5 12 8.5C10.067 8.5 8.5 10.067 8.5 12C8.5 13.933 10.067 15.5 12 15.5Z"
                                    stroke="currentColor" stroke-width="1.5"/>
                                <path
                                    d="M19.4 15C19.55 14.37 19.63 13.7 19.63 13C19.63 12.3 19.55 11.63 19.4 11L21.54 9.36C21.76 9.18 21.81 8.86 21.65 8.6L19.65 5.4C19.49 5.14 19.18 5.07 18.92 5.2L16.46 6.36C15.87 5.93 15.21 5.56 14.5 5.27L14.13 2.5C14.09 2.22 13.86 2 13.57 2H10.43C10.14 2 9.91 2.22 9.87 2.5L9.5 5.27C8.79 5.56 8.13 5.93 7.54 6.36L5.08 5.2C4.82 5.07 4.51 5.14 4.35 5.4L2.35 8.6C2.19 8.86 2.24 9.18 2.46 9.36L4.6 11C4.45 11.63 4.37 12.3 4.37 13C4.37 13.7 4.45 14.37 4.6 15L2.46 16.64C2.24 16.82 2.19 17.14 2.35 17.4L4.35 20.6C4.51 20.86 4.82 20.93 5.08 20.8L7.54 19.64C8.13 20.07 8.79 20.44 9.5 20.73L9.87 23.5C9.91 23.78 10.14 24 10.43 24H13.57C13.86 24 14.09 23.78 14.13 23.5L14.5 20.73C15.21 20.44 15.87 20.07 16.46 19.64L18.92 20.8C19.18 20.93 19.49 20.86 19.65 20.6L21.65 17.4C21.81 17.14 21.76 16.82 21.54 16.64L19.4 15Z"
                                    stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                            General Settings</a>
                    </li>
                    <li class="inline-block">
                        <a href="javascript:"
                           class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary !border-primary text-primary"
                           :class="{'!border-primary text-primary' : tab == 'logo_favicon'}"
                           @click="tab='logo_favicon'">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                <rect x="3" y="3" width="18" height="18" rx="2"
                                      stroke="currentColor" stroke-width="1.5"/>
                                <path d="M8 14L11 11L14 14L17 10"
                                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                            Logo & Favicon</a>
                    </li>
                    <li class="inline-block">
                        <a href="javascript:"
                           class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary !border-primary text-primary"
                           :class="{'!border-primary text-primary' : tab == 'contact'}" @click="tab='contact'">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M21 12C21 16.4183 16.9706 20 12 20C10.4178 20 8.92641 19.6393 7.63604 19.0001L3 20L4.186 16.002C3.42958 14.8621 3 13.4767 3 12C3 7.58172 7.02944 4 12 4C16.9706 4 21 7.58172 21 12Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                            Social Media</a>
                    </li>
                </ul>
            </div>
            <div>
                @livewire('author-general-settings')
            </div>
            <div x-show="tab === 'logo_favicon'" x-cloak>
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="mb-5">
                        <h3 class="mb-3 text-base font-semibold dark:text-white-light">Set blog logo</h3>
                        <div class="mb-2" style="max-width: 200px">
                            <img src="" alt="" class="img-thumbnail" id="logo-image-preview"
                                 data-ijabo-default-img="{{ \App\Models\Setting::find(1)->blog_logo }}">
                        </div>
                        <form class="space-y-5" action="{{ route('author.change-blog-logo') }}" method="post" id="changeBlogLogoForm">
                            @csrf
                            <div>
                                <input id="ctnFile" name="blog_logo" type="file" class="rtl:file-ml-5 form-input p-0 file:border-0 file:bg-primary/90 file:py-2 file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5" required="">
                            </div>
                            <button type="submit" class="btn btn-primary !mt-6">Change logo</button>
                        </form>
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-3 text-base font-semibold dark:text-white-light">Set blog favicon</h3>
                        <div class="mb-2" style="max-width: 100px">
                            <img src="" class="img-thumbnail" id="favicon-image-preview"
                                 data-ijabo-default-img="{{ \App\Models\Setting::find(1)->blog_favicon }}">
                        </div>
                        <form class="space-y-5" action="{{ route('author.change-blog-favicon') }}" method="post" id="changeBlogFaviconForm">
                            @csrf
                            <div>
                                <input type="file" name="blog_favicon" class="rtl:file-ml-5 form-input p-0 file:border-0 file:bg-primary/90 file:py-2 file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5">
                            </div>
                            <button type="submit" class="btn btn-primary !mt-6">Change favicon</button>
                        </form>
                    </div>
                </div>
            </div>
            <div x-show="tab === 'contact'" x-cloak>
                <div>
                    @livewire('author-blog-social-media-form')
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('input[name="blog_logo"]').ijaboViewer({
            preview: '#logo-image-preview',
            imageShape: 'rectangular',
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            onErrorShape: function (message, element){
                alert(message);
            },
            onInvalidType: function (message, element){
                alert(message);
            },
            onSuccess: function (message, element){

            }
        });

        $('input[name="blog_favicon"]').ijaboViewer({
            preview: '#favicon-image-preview',
            imageShape: 'square',
            allowedExtensions: ['ico'],
            onErrorShape: function (message, element){
                alert(message);
            },
            onInvalidType:function (message, element){
                alert(message);
            },
            onSuccess: function (message, element){

            }
        })

        $('#changeBlogLogoForm').submit(function (e){
            e.preventDefault();
            let form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend:function (){},
                success: function(data){
                    if(data.status == 1){
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: data.msg || 'Logo updated successfully!',
                            position: 'top',
                            showConfirmButton: false,
                            timer: 1200,
                            padding: '10px 20px'
                        });
                        $(form)[0].reset();
                        Livewire.emit('updateTopHeader');
                    }else{
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: data.msg || 'Could not update logo.',
                            position: 'top',
                            showConfirmButton: false,
                            timer: 1500,
                            padding: '10px 20px'
                        });
                    }
                }
            })
        })

        $('#changeBlogFaviconForm').submit(function(e){
            e.preventDefault();
            let form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){},
                success:function(data){
                    if(data.status == 1){
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: data.msg || 'Favicon updated successfully!',
                            position: 'top',
                            showConfirmButton: false,
                            timer: 1200,
                            padding: '10px 20px'
                        });
                        $(form)[0].reset();
                    }else{
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: data.msg || 'Could not update favicon.',
                            position: 'top',
                            showConfirmButton: false,
                            timer: 1500,
                            padding: '10px 20px'
                        });
                    }
                }
            })

        })
    </script>
@endpush
