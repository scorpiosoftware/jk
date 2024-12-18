<div class="container px-12 md:px-24 mx-auto max-w-screen-xl shadow-lg p-2 rounded-md">
   <div class="flex justify-center items-center pb-4 gap-4">
      <h1 class="font-bold text-gray-600 underline text-3xl">
         @if (session('lang') == 'en')
         Our Brands
         @else
         علاماتنا التجارية
         @endif
      </h1>
   </div>

   {{-- <div class="flex overflow-x-auto overflow-y-hidden scroll-smooth focus:scroll-auto justify-center content-center gap-5">
      @foreach ($brands as $brand)
      <a class="wow fadeInUp shadow-sm" data-wow-delay="0.1s" href=""><img class="transition-all box-border size-32 delay-75 hover:scale-[1.2]" src="{{ URL::to('storage/'.$brand->image_url) }}"  alt=""></a>
      @endforeach
   </div> --}}
   <div class="md:grid md:grid-cols-4 flex items-center justify-center gap-5 mx-auto max-w-4xl mt-3">
      @foreach ($brands as $brand)
      <div class="flex items-center justify-center md:w-32 w-96">
         <img class="transition-all box-border size-60 md:size-20 delay-75 hover:scale-[1.2]" src="{{ URL::to('storage/'.$brand->image_url) }}"  alt="">
      </div>
      @endforeach
   </div>
</div>


{{-- <div id="default-carousel" class="relative container mx-auto w-full px-20 items-center justify-center md:hidden" data-carousel="slide">
   <div class="inline-block justify-center items-center p-4">
      <h1 class="font-bold text-3xl">Our Brands</h1>
      <a href="" class="font-bold text-green-300">view all</a>
   </div>
   <div class="relative h-56 w-full overflow-hidden rounded-lg md:h-[550px] md:hidden">
        <div class="duration-700 ease-in-out w-full " data-carousel-item>
            <img src="/media/images/brands/brand-1.webp" width="350px" height="206px" alt="">
        </div>

        <div class="duration-700 ease-in-out w-full " data-carousel-item>
            <img src="/media/images/brands/brand-2.webp" width="350px" height="206px" alt="">
        </div>

        <div class="duration-700 ease-in-out w-full " data-carousel-item>
            <img src="/media/images/brands/brand-3.webp" width="350px" height="206px" alt="">
        </div>
    </div>
</div> --}}
