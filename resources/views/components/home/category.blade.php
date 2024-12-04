<div class="w-full h-full bg-slate-50 text-nowrap mx-auto px-4 md:pt-3 py-3 wow fadeInUp  hidden md:block"
    data-wow-delay = "0.1">
    <div class="flex justify-center items-center space-x-6 ">
        @foreach ($categories as $item)
        <form action="{{ route('filter.products') }}" method="POST">
            @csrf
            @method('POST')
            <input type="text" class="hidden" value="{{ $item->id }}" name="categories[]" id="">
            <button type="submit" class="transition-all delay-75  text-sm hover:scale-105 hover:text-black  border-b-2 p-1 text-slate-600"
                href="">
                @if (session('lang') == 'en')
                {!! $item->name_en !!}
                @else
                {!! $item->name_ar !!}
                @endif
               
            </button>
        </form>
        @endforeach
    </div>
</div>
