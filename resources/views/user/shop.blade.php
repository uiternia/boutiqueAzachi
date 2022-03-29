<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          ショップ情報
      </h2>
  </x-slot>

  
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-200 border-b border-gray-200">
                
                 
                  <div class="py-6">
                      
                 <section class="text-gray-600 body-font">
                    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                        <div class="mb-3 border-double border-4 border-gray-600">
                        <x-thumbnail :filename="$product->shop->filename" type="shops" />
                        </div>
                      <div class="text-center lg:w-2/3 w-full">
                        <h1 class="font-sans sm:text-4xl text-3xl mb-4 text-gray-900"> {{ $product->shop->name }}</h1>
                        <p class="mb-8 leading-relaxed">{{ $product->shop->information }}</p>
                      </div>
                    </div>

                    <a href="{{ route('user.products.show',['product' => $product->id])}}">
                      <div class="m-3">
                        <button class="shadow-lg px-2 py-1  bg-gray-400 text-lg text-white font-semibold rounded  hover:bg-gray-500">商品に戻る</button>
                    </div>
                    </a>
                    {{--お店ごとにお問い合わせできるようにしたい--}}
                  </section>
              </div>
          </div>
      </div>
  </div>
  <footer class="bg-gray-100 max-w-screen-2xl px-4 md:px-8 mx-auto">
    <div class="text-gray-400 text-sm text-center border-t py-8">© boutique Azachi</div>
  </footer>
</x-app-layout>
