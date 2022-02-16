<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          ショップ情報更新
      </h2>
  </x-slot>

  <div class="py-12">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <form method="post" action="{{ route('owner.shops.update',['shop' => $shop->id])}}"enctype="multipart/form-data">
                  @csrf
                  <div class="p-2 w-2/3 mx-auto">
                  <div class="relative">
                    <label for="name" class="leading-7 text-sm text-gray-600">店名</label>
                    <input type="text" id="name" name="name" value="{{ $shop->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  </div>
                  <div class="relative">
                    <label for="information" class="leading-7 text-sm text-gray-600">ショップ情報</label>
                    <textarea id ="information" name="information" rows="8" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                  </div>
                  <div class="relative">
                <div>
                  <label for="image" class="leading-7 text-sm text-gray-600">ショップのメインイメージ</label>
                </div>
                  <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg">
                  </div>
                </div>
                <div class="flex justify-center items-center">
                <div class="mr-2"><input type="radio" name="is_selling" value="1" @if($shop->is_selling = true){ checked } @endif>営業する</div>
                <div><input type="radio" name="is_selling" value="0" @if($shop->is_selling = false){ checked } @endif>休業する</div>
                </div>
                <div class="flex justify-between p-2 w-full">
                  <div><button type="button" onclick="location.href='{{ route('owner.shops.index')}}'" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></div>
                  <div><button type="submit" class="flex mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">ショップ情報更新</button></div>
                </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
