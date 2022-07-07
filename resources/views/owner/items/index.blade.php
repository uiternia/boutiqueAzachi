<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          アイテム管理
      </h2>
  </x-slot>

  
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
            <div class="p-6 bg-gray-200 border-b border-gray-200">
                <x-flash-message status="session('status')" />  
                <div><button type="button" onclick="location.href='{{ route('owner.items.create')}}'" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">アイテム入荷</button></div>
                <div class="flex flex-wrap">
                  @foreach ($ownerItem as $owner)
                  @foreach($owner->shop->item as $item)
                
                          <div class="rounded-md w-1/3 p-4">
                            <a href="{{ route('owner.items.edit',['item' => $item->id ])}}">
                              <div class="border-double border-4 border-gray-600 rounded-md p-2 md:p-4">
                                <x-thumbnail filename="{{$item->imageFirst->filename ?? ''}}" type="products" />
                              </div>
                              <div class="flex justify-between">
                              <div class="text-gray-700">{{ $item->name}}</div>
                             
                                @if($item->is_selling)
                                  <span>販売中</span>
                                @else
                                <span>停止中</span>
                                @endif  
                            </div>
                            </a>
                          </div>   
              
                  @endforeach
                  @endforeach
                </div>
          </div>
      </div>
  </div>
  
</x-app-layout>
