<x-app-layout>
    <!-- Breadcrumb -->
    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('product.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Show</span>
                </div>
            </li>
        </ol>
    </nav>
    {{-- End Breadcrumb  --}}
    <div class="container mx-auto py-4 px-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div>
                <!-- Main modal -->
                <div id="main" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 transition-all delay-75 scale-[125%]">
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="main">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <img data-modal-hide="main"
                            src="{{ URL::to('storage/' . $record->main_image_url) }}" class="cursor-pointer w-full" alt="">
                        </div>
                    </div>
                </div>
                <img data-modal-target="main" data-modal-toggle="main"
                    src="{{ URL::to('storage/' . $record->main_image_url) }}" class="cursor-zoom-in" alt="">
                <div class="overflow-x-auto flex space-x-3 pt-2 rounded-md shadow-lg">
                    @foreach ($record->images as $image)
                        <img src="{{ URL::to('storage/' . $image->image_url) }}" class="w-96" alt="">
                    @endforeach
                </div>
            </div>


            <div class="block items-start">
                <div class="p-2">
                    <p class="font-extrabold text-2xl">{!! $record->name_en !!}</p>
                </div>
                <div class="p-2">
                    <p class="font-extrabold text-base">{!! $record->code !!}</p>
                </div>
                <div class="shadow-lg p-2">
                    <p>{!! $record->description_en !!}</p>
                </div>
                <div class="flex justify-start space-x-4 py-2 p-2">
                    <span class="text-bold text-black font-sans hover:font-serif cursor-pointer text-lg">Price : $
                        {!! $record->price !!}</span>
                    <span class="text-bold text-black font-sans hover:font-serif cursor-pointer text-lg">quantity :
                        {!! $record->stock_quantity !!}</span>

                </div>

                <div class="p-2">Categories : </div>
                <div class="flex justify-start items-center space-x-2 p-2 overflow-x-scroll overflow-y-hidden">
                    @foreach ($record->categories as $category)
                    <div class="px-2 py-2 shadow-md text-start cursor-pointer bg-slate-200 transition-all delay-150 hover:scale-x-105">{!! $category->name_en !!}</div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
