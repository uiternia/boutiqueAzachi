<x-app-layout>
  <x-slot name="header">
    
</x-slot>
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
  
      <!-- images - start -->
      <!-- Slider main container -->
      
  <div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide">
      @if ($product->imageFirst->filename !== null)
      <img src="{{ asset('storage/products/' . $product->imageFirst->filename)}}">
      @else
      <img src="">
      @endif
    </div>
    <div class="swiper-slide">
      @if ($product->imageSecond->filename !== null)
      <img src="{{ asset('storage/products/' . $product->imageSecond->filename)}}">
      @else
      <img src="">
      @endif
    </div>
    <div class="swiper-slide">
      @if ($product->imageThird->filename !== null)
      <img src="{{ asset('storage/products/' . $product->imageThird->filename)}}">
      @else
      <img src="">
      @endif
    </div>
    <div class="swiper-slide">
      @if ($product->imageFourth->filename !== null)
      <img src="{{ asset('storage/products/' . $product->imageFourth->filename)}}">
      @else
      <img src="">
      @endif
    </div>

   

    
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>

</div>
      <!-- images - end -->

      <!-- content - start -->
      <div class="md:py-8">
        <!-- name - start -->
        <div class="md:flex justify-around items-center">
          <div class="flex-1 sm:flex-none">
        <div class="mb-2 md:mb-3">
          <span class="inline-block text-gray-500 mb-0.5">{{$product->category->name}}</span>
          <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">{{$product->name}}</h2>
        </div>
        <!-- name - end -->


        <!-- price - start -->
        <div class="mb-4">
          <div class="flex items-end gap-2">
            <span class="text-gray-800 text-xl md:text-2xl font-bold">{{$product->price}}</span>
            <span class="text-gray-600  mb-0.5">円(税込)</span>
          </div>

          <span class="text-gray-500 text-sm">(送料込み)</span>
        </div>
        <!-- price - end -->

        <!-- shipping notice - start -->
        <div class="md:flex justify-between">
        <div class="flex items-center text-gray-500 gap-2 mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
          </svg>

          <span class="text-sm">1~2日で発送</span>
        </div>
      </div>
    </div>
        <!-- shipping notice - end -->

        <!-- buttons - start -->
        <div class="flex gap-2.5">
          
          <form method="post" action="{{ route('user.cart.add')}}">
            @csrf
            <div class="flex">
          <div class="items-center">
            <span>数量</span>
          <select name="quantity" class="rounded mr-2 border appearance-none border-gray-300  focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base">
            @for($i = 1; $i <= $quantity; $i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
           </select>
          </div>
            <div>
          <button class="inline-block flex-1 md:flex-none bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Add to cart</button>
          <input type="hidden" name="product_id" value="{{$product->id}}">
            </div>
          </div>
          </form>
        
        
          <form method="post" action="{{ route('user.favorite.add')}}">
            @csrf
          <div>
          <button  class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </button>
          <input type="hidden" name="item_id" value="{{$product->id}}">
        </div>
      </form>
    
        </div>
      </div>
        <!-- buttons - end -->

        <!-- description - start -->
        <div class="mt-10 md:mt-16 lg:mt-20">
          <div class="text-gray-800 text-lg font-semibold mb-3">アイテム詳細</div>

          <p class="text-gray-500">
            {{$product->information}}
          </p>
        </div>
        <!-- description - end -->
      </div>
      <!-- content - end -->
    </div>
    <div class="border-t border-green-300 my-10"></div>
  <div class="mb-4 text-center"><h1 class="text-gray-800 text-lg font-semibold mb-3">このアイテムを販売しているショップ</h1></div>
  <div class="mb-4 text-center">{{ $product->shop->name }}</div>
  <div class="mb-4 text-center">
    @if($product->shop->filename !== null)
    <img class="mx-auto w-40 h-40 object-cover rounded-full" src="{{ asset('storage/shops/' . $product->shop->filename)}}">
    @else
    <img src="">
    @endif
  </div>
  {{--のちにショップの詳細画面を作成し、つなげたい--}}
    <div class="mb-4 text-center">
      <a href="{{ route('user.products.shop',['shop' => $product->id])}}">
      <button type="button" class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">このショップの詳細を見る</button>
    </div>
  </div>

  

<footer class="bg-white max-w-screen-2xl px-4 md:px-8 mx-auto">
<div class="text-gray-400 text-sm text-center border-t py-8">© boutique Azachi</div>
  </footer>

 
</x-app-layout>
