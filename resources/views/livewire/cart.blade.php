<div>
    <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
        class="inline-flex items-center rounded-full justify-center p-2 bg-slate-50 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
        <span class="sr-only">
            Cart
        </span>
        <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
        </svg>
        {{-- <span class="hidden sm:flex">My Cart</span> --}}
        <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 9-7 7-7-7" />
        </svg>
    </button>
        <div id="myCartDropdown1"
            class="hidden z-10 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">
            <livewire:cart-items>
                @if (!empty(session('cart')))
                <a href="{{ route('cart.show') }}" title=""
                class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg  border-2 text-black  px-5 py-2.5 text-sm font-medium  focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                role="button"> Proceed to Checkout </a>
                @else
                <div><span>no items !</span></div>
                <div><a href="{{route('filter.products')}}" class="text-sm border-2 rouded-md p-1 underline">continue shopping</a></div>
                @endif

        </div>

</div>
