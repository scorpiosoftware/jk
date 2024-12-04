<x-app-layout>
    <section class="py-24 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">
            <h2 class="font-manrope font-bold text-4xl leading-10 text-black text-center">

                @if ($record->status == 'pending')
                    Order Pending
                @elseif ($record->status == 'canceled')
                    Order Canceled
                @elseif ($record->status == 'delivered')
                    Payment Successful
                @endif

            </h2>
            <p class="mt-4 font-normal text-lg leading-8 text-gray-500 mb-11 text-center">Thanks for making a purchase
                you can
                check our order summary frm below</p>
            <div
                class="main-box border md:grid md:grid-cols-2 border-gray-200 rounded-xl pt-6 max-w-xl max-lg:mx-auto mx-auto lg:max-w-full">

                <div class="">
                    <p class="font-semibold text-base text-black flex text-nowrap px-4"> Order id :<span
                            class="text-indigo-500 font-medium text-nowrap"> #{{ $record->auto_nb }}</span></p>
                    <div
                        class="flex flex-col lg:flex-row lg:items-center justify-between px-6 pb-6 border-b border-gray-200">
                        <div class="data text-start flex items-center justify-start overflow-x-scroll gap-6 p-4">

                            <p class="font-semibold text-base leading-7 text-black mt-4 text-nowrap"> name : <span
                                    class="text-green-400 font-medium text-nowrap"> {{ $record->customer_name }}</span>
                            </p>
                            <p class="font-semibold text-base leading-7 text-black mt-4 text-nowrap"> email : <span
                                    class="text-green-400 font-medium text-nowrap"> {{ $record->customer_email }}</span>
                            </p>
                            <p class="font-semibold text-base leading-7 text-black mt-4 text-nowrap"> Phone : <span
                                    class="text-green-400 font-medium text-nowrap"> {{ $record->phone }}</span></p>
                            <p class="font-semibold text-base leading-7 text-black mt-4 text-nowrap"> Country : <span
                                    class="text-green-400 font-medium text-nowrap"> {{ $record->country }}</span></p>
                            <p class="font-semibold text-base leading-7 text-black mt-4 text-nowrap"> City : <span
                                    class="text-green-400 font-medium text-nowrap"> {{ $record->city }}</span></p>
                            <p class="font-semibold text-base leading-7 text-black mt-4 text-nowrap"> Address : <span
                                    class="text-green-400 font-medium text-nowrap"> {{ $record->street }}</span></p>
                            <p class="font-semibold text-base leading-7 text-black mt-4 text-nowrap"> Apartment : <span
                                    class="text-green-400 font-medium text-nowrap"> {{ $record->apartment }}</span></p>
                        </div>

                    </div>

                    {{-- Product --}}
                    @foreach ($items as $item)
                        <div class="w-full px-3 min-[400px]:px-6">
                            <div
                                class="flex flex-col lg:flex-row items-center py-6 border-b border-gray-200 gap-6 w-full">
                                <div class="img-box max-lg:w-full">
                                    <img src="{{ URL::to('storage/' . $item->product->main_image_url) }}"
                                        alt="Premium Watch image" class="aspect-square w-full lg:max-w-[140px]">
                                </div>
                                <div class="flex flex-row items-center w-full ">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 w-full">
                                        <div class="flex items-center">
                                            <div class="">
                                                <h2 class="font-semibold text-xl leading-8 text-black mb-3">
                                                    {{ $item->product->name_en }}</h2>
                                                <p class="font-normal text-lg leading-8 text-gray-500 mb-3 ">
                                                    {{-- By:{{ $item->product->brand->name_en }}</p> --}}
                                                <div class="flex items-center ">
                                                    <p
                                                        class="font-medium text-base leading-7 text-black pr-4 mr-4 border-r border-gray-200">
                                                        Size: <span class="text-gray-500">null</span></p>
                                                    <p class="font-medium text-base leading-7 text-black ">Qyantity:
                                                        <span class="text-gray-500">{{ $item->quantity }}</span>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="grid grid-cols-5">
                                            <div class="col-span-5 lg:col-span-1 flex items-center max-lg:mt-3">
                                                <div class="flex gap-3 lg:block">
                                                    <p class="font-medium text-sm leading-7 text-black">price</p>
                                                    <p class="lg:mt-4 font-medium text-sm leading-7 text-indigo-600">
                                                        ${{ $item->product->price }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-span-5 lg:col-span-1 flex items-center max-lg:mt-3">
                                                <div class="flex gap-3 lg:block">
                                                    <p class="font-medium text-sm leading-7 text-black">Total</p>
                                                    <p class="lg:mt-4 font-medium text-sm leading-7 text-indigo-600">
                                                        ${{ $item->subtotal }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-span-5 lg:col-span-2 flex items-center max-lg:mt-3">
                                                <div class="flex gap-3 lg:block">
                                                    <p
                                                        class="font-medium text-sm whitespace-nowrap leading-6 text-black">
                                                        item created at</p>
                                                    <p
                                                        class="font-medium text-base whitespace-nowrap leading-7 lg:mt-3 text-emerald-500">
                                                        {{ $item->created_at }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    @endforeach
                </div>

                <div
                    class="w-full border-t border-gray-200 px-6 flex flex-col lg:flex-row items-center justify-between ">
                    <div class="flex flex-col sm:flex-row items-center max-lg:border-b border-gray-200">

                        <p class="font-medium text-lg text-gray-900 pl-6 py-3 max-lg:text-center">Paid using Cash on
                            delivery</p>
                    </div>
                    <p class="font-semibold text-lg text-black py-6">Total Price: <span class="text-indigo-600">
                            ${{ $record->total_amount }}</span></p>
                </div>
                <div class="flex justify-between items-center px-8 py-4">

                    <form action="{{ route('invoice.destroy', $record->id) }}" method="POST" class="">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-2.5 bg-red-400 text-white rounded-md @if ($record->status == 'canceled') hidden @endif">Cancel
                            Order</button>
                    </form>
                    <a href="{{ route('invoice.edit', $record->id) }}"
                        class="px-2.5 bg-green-400 text-white rounded-md @if ($record->status == 'delivered') hidden @endif">Confirm
                        Order</a>
                </div>
            </div>


        </div>
    </section>
</x-app-layout>
