<x-app-layout>
  <x-slot name="header">
    
</x-slot>

<div class="container p-8 mx-auto mt-12">
  <div class="w-full overflow-x-auto">
    <div class="my-2">
      <h3 class="text-xl font-bold tracking-wider">お気に入り一覧</h3>
    </div>
    @foreach ($favorites as $item)
    <table class="w-full shadow-inner">
      <thead>
        <tr class="bg-gray-100">
          <th class="px-6 py-3 font-bold whitespace-nowrap">商品画像</th>
          <th class="px-6 py-3 font-bold whitespace-nowrap">アイテム</th>
          <th class="px-6 py-3 font-bold whitespace-nowrap">値段</th>
          <th class="px-6 py-3 font-bold whitespace-nowrap">消去する</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="flex justify-center">
                @if ($item->imageFirst->filename !== null)
                  <img src="{{ asset('storage/products/' . $item->imageFirst->filename)}}" class="object-cover h-28 w-28 rounded-2xl">
                  @else
                  <img src="">
                  @endif
            </div>
          </td>
          <td class="p-4 px-6 text-center whitespace-nowrap">
            <div class="flex flex-col text-blue-600 items-center justify-center">
              <a href="{{ route('user.products.show',['product' => $item->id])}}">
              <h3>{{$item->name}}</h3>
              </a>
            </div>
          </td>
          
          
          <td class="p-4 px-6 text-center whitespace-nowrap">{{ number_format($item->price)}}<span>円</span></td>
          
          <form method="post" action="{{route('user.favorite.delete',['product' => $item->id])}}">
            @csrf
          <td class="p-4 px-6 text-center whitespace-nowrap">
            <button>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-red-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                />
              </svg>
            </button>
          </td>
        </form>
        </tr>
      </tbody>
    </table>
    @endforeach
    
  </div>
</div>


<footer class="bg-white max-w-screen-2xl px-4 md:px-8 mx-auto">
  <div class="text-gray-400 text-sm text-center border-t py-8">© boutique Azachi</div>
    </footer>
</x-app-layaut>