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

                {{-- <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                    class="inline-flex items-center rounded-full justify-center p-2 bg-slate-50 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    <span class="sr-only">
                        Cart
                    </span>
                    <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>
                <script>
                    $(document).ready(function() {
                        $("#myCartDropdownButton1").click(function() {
                            $.ajax({
                                url: "{{ route('home') }}",
                                type: "GET",
                                success: function(response) {
                                    setTimeout(function() {
    
                                    }, 1000);
                                }
                            });
                        });
                    });
                </script>
                @if (!empty(session('cart')))
                    <div id="myCartDropdown1"
                        class="hidden z-10 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">
                        @foreach (session('cart') as $id => $details)
                            <div class="grid grid-cols-2">
                                <div class="">
                                    <a href="#"
                                        class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline">{{ $details['name'] }}</a>
                                    <p class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400">
                                        ${{ $details['price'] }}</p>
                                </div>

                                <div class="flex items-end justify-end gap-6">
                                    <p class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Qty:
                                        {{ $details['quantity'] }}</p>
                                    <div class="">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="">
                                            @csrf
                                            @method('DELETE')
                                            <button data-tooltip-target="tooltipRemoveItem1a" type="submit"
                                                class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                                                <span class="sr-only"> Remove </span>
                                                <svg class="h-4 w-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <div id="tooltipRemoveItem1a" role="tooltip"
                                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                                Remove item
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('cart.show') }}" title=""
                            class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            role="button"> Proceed to Checkout </a>
                    </div>
                @endif --}}
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
