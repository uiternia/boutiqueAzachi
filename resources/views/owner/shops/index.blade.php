<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          ショップ情報
      </h2>
  </x-slot>

  
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-200 border-b border-gray-200">
                <x-flash-message status="session('status')" />  
                  @foreach ($shops as $shop)
                  <div class="py-6">
                      <div class="flex justify-between items-center">
                        <div class="mb-4">
                            @if($shop->is_selling)
                              <span class="border p-2 rounded-md bg-green-400 text-white">営業中</span>
                            @else
                            <span class="border p-2 rounded-md bg-red-400 text-white">休業中</span>
                            @endif  
                        </div>
                      <div>
                        <button onclick="location.href='{{ route('owner.shops.edit',['shop' => $shop->id])}}'" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                            オーナー情報更新
                        </button>
                      </div> 
                    </div>
                 <section class="text-gray-600 body-font">
                    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                        <div class="mb-3 border-double border-4 border-gray-600">
                        <x-thumbnail :filename="$shop->filename" type="shops" />
                        </div>
                      <div class="text-center lg:w-2/3 w-full">
                        <h1 class="font-sans sm:text-4xl text-3xl mb-4 text-gray-900"> {{ $shop -> name }}</h1>
                        <p class="mb-8 leading-relaxed">{{ $shop->information }}</p>
                      </div>
                    </div>
                  </section>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
