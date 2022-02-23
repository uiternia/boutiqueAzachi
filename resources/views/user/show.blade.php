<x-app-layout>
  <x-slot name="header">
    
</x-slot>
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
    <div class="grid md:grid-cols-2 gap-8">
      <!-- images - start -->
      <div class="space-y-4">
        <div class="bg-gray-100 rounded-lg overflow-hidden relative">
          <img src="https://images.unsplash.com/flagged/photo-1571366992942-be878c7b10c0?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Himanshu Dewangan" class="w-full h-full object-cover object-center" />

          <span class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">sale</span>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div class="bg-gray-100 rounded-lg overflow-hidden">
            <img src="https://images.unsplash.com/flagged/photo-1571366992791-2ad2078656cb?auto=format&q=75&fit=crop&w=250" loading="lazy" alt="Photo by Himanshu Dewangan" class="w-full h-full object-cover object-center" />
          </div>

          <div class="bg-gray-100 rounded-lg overflow-hidden">
            <img src="https://images.unsplash.com/flagged/photo-1571366992968-15b65708ee76?auto=format&q=75&fit=crop&w=250" loading="lazy" alt="Photo by Himanshu Dewangan" class="w-full h-full object-cover object-center" />
          </div>
        </div>
      </div>
      <!-- images - end -->

      <!-- content - start -->
      <div class="md:py-8">
        <!-- name - start -->
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
        <div class="flex items-center text-gray-500 gap-2 mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
          </svg>

          <span class="text-sm">1~2日で発送</span>
        </div>
        <!-- shipping notice - end -->

        <!-- buttons - start -->
        <div class="flex gap-2.5">
          <a href="#" class="inline-block flex-1 sm:flex-none bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Add to cart</a>

          <a href="#" class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
          </a>
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
  </div>
</div>


<footer class="bg-white max-w-screen-2xl px-4 md:px-8 mx-auto">
<div class="text-gray-400 text-sm text-center border-t py-8">© boutique Azachi</div>
  </footer>
 
</x-app-layout>
