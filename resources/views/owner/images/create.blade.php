<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          画像登録
      </h2>
  </x-slot>

  <div class="py-12">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <form method="post" action="{{ route('owner.images.store')}}"enctype="multipart/form-data">
                  @csrf
              <div class="p-2 w-2/3 mx-auto">
                  <div class="relative">
                <div>
                  <label for="image" class="leading-7 text-sm text-gray-600">商品画像</label>
                </div>
                  <input type="file" id="image" name="files[][image]" multiple accept="image/png,image/jpeg,image/jpg">
                  </div>
              </div>
                <div class="flex justify-between p-2 w-full">
                  <div><button type="button" onclick="location.href='{{ route('owner.images.index')}}'" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></div>
                  <div><button type="submit" class="flex mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">画像登録</button></div>
                </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
