<div class=" pt-4 max-w-screen-xl mx-auto">
    <div class="flex items-center justify-center">
        <div class="block justify-center items-center">
            <span class="font-bold">{{ $title }}</span>
            <div class="flex justify-center items-center mt-2">
                <a href="{{ route('shop.index') }}"
                    class="font-bold text-gray-600 transition-all delay-75 hover:scale-150 hover:underline">
                   {{ session('lang') == 'en' ? 'view all' : 'عرض الكل' }}
                </a>
            </div>

        </div>

    </div>

    <div
        class="grid grid-cols-2 md:grid-cols-4 px-12 md:px-24 gap-4 md:gap-10 py-6shadow-xl md:max-w-screen-xl md:mx-auto mt-2">
        @foreach ($bestSeller as $item)
            <livewire:product :item="$item">    
        @endforeach
    </div>






</div>
