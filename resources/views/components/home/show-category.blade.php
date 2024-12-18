
<div class=" mx-auto md:px-24 pb-10 max-w-screen-xl ">
    <div class="flex justify-center items-center pt-4 pb-10">
        <h1 class="font-extrabold text-gray-600 underline text-2xl">
            {{ session('lang') == 'en' ? 'Our Categories' : 'اصنافنا' }}
        </h1>
     </div>
    <div class="grid grid-cols-3 md:grid-cols-5  md:gap-4" >
        @foreach ($categories as $item)
        @if (!empty($item->image_url))
        <div class="items-center">
            <div>
                <form action="{{ route('filter.products') }}" method="POST">
                    @csrf
                    @method('POST')
                <button type="submit" class="wow fadeInUp" data-wow-delay="0.2s" href=""><img class="transition-all delay-75 rounded-full border hover:scale-[1.2]" src="{{ URL::to('storage/'.$item->image_url) }}" alt=""></button>
                </form>
                </div>
            
            <div><p class="text-center font-medium">{!! session('lang') == 'en' ? $item->name_en : $item->name_ar !!}</p></div>
        </div>  
        @endif

        @endforeach

    </div>

</div>