<x-app-layout>
  <x-slot name="header">
    
</x-slot>

@if(count($products) > 0)
<div class="container p-8 mx-auto mt-12">
  <div class="w-full overflow-x-auto">
    <div class="my-2">
      <h3 class="text-xl font-bold tracking-wider">カート一覧</h3>
    </div>
    @foreach ($products as $product)
    <table class="w-full shadow-inner">
      <thead>
        <tr class="bg-gray-100">
          <th class="px-6 py-3 font-bold whitespace-nowrap">商品画像</th>
          <th class="px-6 py-3 font-bold whitespace-nowrap">アイテム</th>
          <th class="px-6 py-3 font-bold whitespace-nowrap">値段</th>
          <th class="px-6 py-3 font-bold whitespace-nowrap">カートに入れる</th>
          <th class="px-6 py-3 font-bold whitespace-nowrap">消去する</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="flex justify-center">
                @if ($product->imageFirst->filename !== null)
                  <img src="{{ asset('storage/products/' . $product->imageFirst->filename)}}" class="object-cover h-28 w-28 rounded-2xl">
                  @else
                  <img src="">
                  @endif
            </div>
          </td>
          <td class="p-4 px-6 text-center whitespace-nowrap">
            <div class="flex flex-col items-center justify-center">
              <h3>{{$product->name}}</h3>
            </div>
          </td>
          
          
          <td class="p-4 px-6 text-center whitespace-nowrap">{{ number_format($product->pivot->quantity*$product->price)}}<span>円</span></td>
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
                  d="M18.936 5.564c-.144-.175-.35-.207-.55-.207h-.003L6.774 4.286c-.272 0-.417.089-.491.18-.079.096-.16.263-.094.585l2.016 5.705c.163.407.642.673 1.068.673h8.401c.433 0 .854-.285.941-.725l.484-4.571c.045-.221-.015-.388-.163-.567z"/><path d="M17.107 12.5H7.659L4.98 4.117l-.362-1.059c-.138-.401-.292-.559-.695-.559H.924c-.411 0-.748.303-.748.714s.337.714.748.714h2.413l3.002 9.48c.126.38.295.52.942.52h9.825c.411 0 .748-.303.748-.714s-.336-.714-.748-.714zm-6.683 3.73a1.498 1.498 0 1 1-2.997 0 1.498 1.498 0 0 1 2.997 0zm6.429 0a1.498 1.498 0 1 1-2.997 0 1.498 1.498 0 0 1 2.997 0z"
                />
              </svg>
            </button>
          </td>
          <form method="post" action="{{route('user.favorite.delete',['item' => $product->id])}}">
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
@else
<div class="text-xl bg-white flex justify-around">お気に入りの商品はありません。</div>
@endif


<footer class="bg-white max-w-screen-2xl px-4 md:px-8 mx-auto">
  <div class="text-gray-400 text-sm text-center border-t py-8">© boutique Azachi</div>
    </footer>
</x-app-layaut>