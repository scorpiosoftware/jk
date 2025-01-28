@extends('layouts.home')
@section('content')
    <div class="mx-auto max-w-screen-xl p-4 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div>
                <!-- Main modal -->
                <div id="main" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div
                            class="relative bg-white rounded-lg shadow dark:bg-gray-700 transition-all delay-75 scale-[100%]">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="main">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <img data-modal-hide="main" src="{{ URL::to('storage/' . $record->main_image_url) }}"
                                class="cursor-pointer w-full" alt="">
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="md:row-span-3">
                        <img data-modal-target="main" data-modal-toggle="main"
                            src="{{ URL::to('storage/' . $record->main_image_url) }}" class="cursor-zoom-in" alt="">
                    </div>
                    {{-- other images div --}}
                    <div class="overflow-x-auto md: flex items-center space-x-4 mt-10 shadow-2xl border">
                        @foreach ($record->images as $image)
                            <div id="main-{{ $image->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div
                                        class="relative bg-white rounded-lg shadow dark:bg-gray-700 transition-all delay-75 scale-[100%]">
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="main-{{ $image->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <img data-modal-hide="main-{{ $image->id }}"
                                            src="{{ URL::to('storage/' . $image->image_url) }}"
                                            class="cursor-pointer w-full" alt="">
                                    </div>
                                </div>
                            </div>
                            <img data-modal-target="main-{{ $image->id }}" data-modal-toggle="main-{{ $image->id }}"
                                src="{{ URL::to('storage/' . $image->image_url) }}" class="w-32" alt="">
                        @endforeach
                    </div>
                    {{--  --}}
                </div>

            </div>


            <div class="block items-start ">
                <div class="p-2 w-full">
                    <p class="font-bold  text-2xl">{!! session('lang') == 'en' ? $record->name_en : $record->name_ar !!}</p>
                </div>
                <div class="p-2">
                    <span
                        class="fa fa-star checked text-sm @if ($product_rate >= 1) text-yellow-300 @else text-gray-300 @endif"></span>
                    <span
                        class="fa fa-star checked text-sm @if ($product_rate >= 2) text-yellow-300 @else text-gray-300 @endif"></span>
                    <span
                        class="fa fa-star checked text-sm @if ($product_rate >= 3) text-yellow-300 @else text-gray-300 @endif"></span>
                    <span
                        class="fa fa-star text-sm @if ($product_rate >= 4) text-yellow-300 @else text-gray-300 @endif"></span>
                    <span
                        class="fa fa-star text-sm @if ($product_rate >= 5) text-yellow-300 @else text-gray-300 @endif"></span>
                </div>
                <div class="p-4">
                    <p class="">{!! session('lang') == 'en' ? $record->description_en : $record->description_ar !!}</p>
                </div>
                <div class="flex justify-between items-center space-x-4 py-2 p-2 ">
                    <div class="text-bold text-black font-sans cursor-pointer text-2xl">$
                        {!! $record->price !!}</div>
                    <div class="text-bold text-black font-sans cursor-pointer text-lg">
                        @if ($record->status == 'in_stock')
                            <span
                                class=" text-lg px-2.5 text-white rounded-md bg-gray-500">{{ session('lang') == 'en' ? 'Available now' : 'متوفر في الوقت الحاضر' }}</span>
                        @elseif ($record->status == 'out_of_stock')
                            <span
                                class=" text-lg px-2.5 rounded-md bg-red-400">{{ session('lang') == 'en' ? 'Out of stock' : 'إنتهى من المخزن' }}</span>
                        @endif
                    </div>

                </div>


                <div class="flex justify-start items-center space-x-2 p-2">
                    @foreach ($record->categories as $category)
                        <div
                            class="p-2 rounded-lg shadow-md text-start font-bold text-white text-sm cursor-default bg-gray-300">
                            {!! session('lang') == 'en' ? $category->name_en : $category->name_ar !!}</div>
                    @endforeach

                </div>


                <div class="p-2 mt-10">
                    <form action="{{ route('cart.add', $record->id) }}" method="GET">
                        @csrf
                        @method('GET')
                        <div class="item-center space-y-4">
                            <div class="flex items-center border p-1 rounded-md">

                                <div class="text-sm px-2">{{ session('lang') == 'en' ? 'quantity' : 'كمية' }}</div>

                                <input type="number"
                                    class="w-16 h-8 py-4 shrink-0 border rounded-md border-gray-300 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
                                    placeholder="" name="qty"
                                    @if (session('cart') && !empty($cart[$record->id]['quantity'])) value="{{ $cart[$record->id]['quantity'] }}"  
                                         @else
                                         value='1' @endif
                                    min="{!! $record->minimum_quantity !!}" max="{!! $record->maximum_quantity !!}" />
                                <div class="text-sm px-2">{{ session('lang') == 'en' ? 'maximum' : 'الحد الأقصى للكمية' }}
                                    : {{ $record->maximum_quantity }}</div>
                            </div>
                            {{-- <button type="submit"
                                class="px-3 py-2 w-1/2 mx-auto flex justify-center text-white transition-all delay-75
                                 bg-green-300 rounded-xl">
                                {{ session('lang') == 'en' ? 'Buy now' : 'اشتري الآن' }}</button> --}}
                                <button type="submit" class="cartBtn flex justify-center mx-auto">
                                    <svg class="cart" fill="white" viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                                    {{ session('lang') == 'en' ? 'Buy now' : 'اشتري الآن' }}
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" class="product"><path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z"></path></svg>
                                  </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <style>

    </style>
    <div class="text-center">
        <div>{{ session('lang') == 'en' ? 'Customer Reviews' : 'آراء العملاء' }} </div>
        <div class="">
            <form action="{{ route('add-review') }}" method="POST">
                @csrf
                @method('POST')
                {{-- <div class="form-group">
                    <label for="rate">Rate:</label><br>
                    <input type="radio" name="rate" value="1"><i class="fas fa-star"></i>
                    <input type="radio" name="rate" value="2"><i class="fas fa-star"></i>
                    <input type="radio" name="rate" value="3"><i class="fas fa-star"></i>
                    <input type="radio" name="rate" value="4"><i class="fas fa-star"></i>
                    <input type="radio" name="rate" value="5"><i class="fas fa-star"></i>
                </div> --}}
                <input type="text" name="id" value="{{ $record->id }}" class="hidden">
                <div
                    class="max-w-xl mx-auto mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="4" name="comment"
                            class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            placeholder="Write a comment..." required></textarea>
                    </div>

                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Post comment
                        </button>
                    </div>

                </div>
            </form>
        </div>


    </div>
    <div class="overflow-y-scroll mx-auto container p-4">
        <div aria-controls="reviews" data-collapse-toggle="reviews"
            class="cursor-pointer text-2xl flex justify-start items-center space-x-4 font-bold w-full text-start border-bottom">
            <div>{{ session('lang') == 'en' ? 'View Comments' : 'عرض التعليقات' }} </div> <svg class="w-5"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                    d="M256 464a208 208 0 1 1 0-416 208 208 0 1 1 0 416zM256 0a256 256 0 1 0 0 512A256 256 0 1 0 256 0zM128 256l0 32L256 416 384 288l0-32-80 0 0-128-96 0 0 128-80 0z" />
            </svg>
        </div>
        <div id="reviews">
            @foreach ($comments as $com)
                <div class="text-start text-black border-b">
                    <div class="flex justify-start items-center p-1">
                        <svg class="w-4 h-4 @if ($com->rate >= 1) text-yellow-300 @else text-gray-300 @endif ms-1"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 @if ($com->rate >= 2) text-yellow-300 @else text-gray-300 @endif ms-1"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 @if ($com->rate >= 3) text-yellow-300 @else text-gray-300 @endif ms-1"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 @if ($com->rate >= 4) text-yellow-300 @else text-gray-300 @endif ms-1"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="w-4 h-4 ms-1 @if ($com->rate >= 5) text-yellow-300 @else text-gray-300 @endif"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    </div>
                    <div class="px-2">Comment : <b>{!! $com->comment !!}</b></div>
                    <dd class="px-2">{{ $com->created_at }}</dd>
                </div>
            @endforeach
        </div>

    </div>
@endsection
