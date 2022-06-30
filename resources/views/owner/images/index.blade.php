<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          商品画像管理
      </h2>
  </x-slot>

  
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-200 border-b border-gray-200">
                <x-flash-message status="session('status')" /> 
                <div>
                  <button onclick="location.href='{{ route('owner.images.create')}}'" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                      画像追加
                  </button>
                </div>  
                <div class="flex flex-wrap">
                  @foreach ($images as $image)
                  <div class="rounded-md w-1/3 p-4">
                    <a href="{{ route('owner.images.edit',['image' => $image->id ])}}">
                      <div class="border-double border-4 border-gray-600 rounded-md p-2 md:p-4">
                        <x-thumbnail :filename="$image->filename" type="products" />
                      </div>
                    </a>
                  </div>
                  @endforeach
                </div>
            </div>
            {{$images->links()}}
        </div>
     </div>
</x-app-layout>
