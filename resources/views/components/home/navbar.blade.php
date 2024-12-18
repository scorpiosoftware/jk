<nav class="bg-slate-100 dark:bg-gray-800 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <div class="shrink-0 md:w-32 w-[75px]">
                    <a href="/" title="" class="">
                        <img class="block" src="{{ URL::to('storage/'. $carousel->logo_url) }}" alt="">
                    </a>
                </div>
            </div>

            <form action="{{ route('filter.products') }}" method="POST"
                class="md:flex items-center max-w-sm mx-auto hidden">
                @csrf
                @method('POST')
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                        </svg>
                    </div>
                    <input type="text" name="search" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                        placeholder="Search product name..." />
                </div>
                <button type="submit"
                    class="p-2.5 ms-2 text-sm font-medium text-black bg-black-400 rounded-lg border border-gray-400 hover:bg-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>

            <div class="flex items-center space-x-2">
                <livewire:cart>
                <div class="bg-slate-50 rounded-full px-2 py-2">
                    <a href="{{ route('wishlist.index') }}"><i class="fa fa-heart"></i></a>
                </div>
                <button id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button"
                    class="inline-flex items-center bg-slate-50 rounded-full  justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    @guest
                        @if (session('lang') == 'en')
                            Account
                            @else
                            الحساب
                        @endif
                    @endguest
                    @auth
                        {{ Auth::user()->name }}
                    @endauth
                    <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>

                <div id="userDropdown1"
                    class="hidden z-10 w-56 divide-y divide-gray-100 overflow-hidden overflow-y-auto rounded-lg bg-white antialiased shadow dark:divide-gray-600 dark:bg-gray-700">

                    @guest
                        <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                            <li><a href="{{ route('login') }}" title=""
                                    class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                    @if (session('lang') == 'en')
                                    Login
                                    @else
                                    تسجيل
                                    @endif
                                 </a></li>
                            <li><a href="{{ route('register') }}" title=""
                                    class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                    @if (session('lang') == 'en')
                                    Sign Up 
                                    @else
                                    انشاء
                                    @endif
                                    
                                </a></li>
                        </ul>
                    @endguest


                    @auth
                    @if(Auth::user()->role_id == 1)
                        <div class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                            <a href="{{ route('dashboard.index') }}" class="px-2">
                                @if (session('lang') == 'en')
                                Dashboard 
                                @else
                                قائمة الاعدادات
                                @endif
                               
                            </a>
                        </div>
                        @endif
                        <div class="p-2 text-sm font-medium text-gray-900 dark:text-white">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <button title=""
                                    class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                    @if (session('lang') == 'en')
                                    Sign Out 
                                    @else
                                    خروج
                                    @endif

                                  
                                </button>

                            </form>
                        </div>
                    @endauth

                </div>

                <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1"
                    aria-controls="ecommerce-navbar-menu-1" aria-expanded="false"
                    class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md dark:hover:bg-gray-700 p-2 text-gray-900 dark:text-white">
                    <span class="sr-only">
                        Open Menu
                    </span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="ecommerce-navbar-menu-1"
            class="bg-gray-50 dark:bg-gray-700 dark:border-gray-600 border border-gray-200 rounded-lg py-3 hidden px-4 mt-4">
            <ul class="text-gray-900 text-sm font-medium dark:text-white space-y-3">
                @foreach ($categories as $item)
                    <li>
                        <form action="{{ route('filter.products') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="text" class="hidden" value="{{ $item->id }}" name="categories[]"
                                id="">
                            <button type="submit"
                                class="transition-all delay-75 text-sm hover:scale-105 hover:text-black  border-b-2 p-1 text-slate-600"
                                href="">
                                @if (session('lang') == 'en')
                                    {!! $item->name_en !!}
                                @else
                                    {!! $item->name_ar !!}
                                @endif

                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- <div class="flex items-center justify-end space-x-4 p-2">
            <a href="/lang/en"><img src="/media/images/en.png"
                    class="w-6 h-6 shadow-lg transition-all delay-75 hover:scale-110" alt=""></a>
            <a href="/lang/ar"><img src="/media/images/ar.png"
                    class="w-6 h-6 shadow-lg transition-all delay-75 hover:scale-110" alt=""></a>
        </div> --}}


        <div class="flex items-center justify-end space-x-4 p-2 ">
            <select class="rounded-lg bg-gray-50 text-base leading-10" name="lang" id="lang" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="" selected>Language</option>
                <option value="/lang/en">English</option>
                <option value="/lang/ar">Arabic</option>
            </select>
        </div>
    </div>
</nav>
