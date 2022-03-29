<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         アイテム入荷
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font relative">
                  <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-col text-center w-full mb-12">
                      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">アイテム入荷</h1>
                    </div>
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                      <x-auth-validation-errors class="mb-4" :errors="$errors" />
                      <x-flash-message status="session('status')" />
                      <form method="post" action="{{ route('owner.items.store')}}">
                        @csrf
                      <div class="flex flex-col items-center -m-2">
                        <div class="p-2 w-1/2 mx-auto">
                          <div class="relative">
                            <label for="shop_id" class="leading-7 text-sm text-gray-600">販売する店舗</label>
                            <select name="shop_id" id="shop_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach ($shops as $shop )
                            <option value="{{ $shop->id}}" >
                              {{ $shop->name }}
                             </option>
                            @endforeach
                            </select>
                          </div>
                        </div> 
                        <div class="p-2 w-1/2">
                          <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">アイテム名</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="relative">
                          <label for="information" class="leading-7 text-sm text-gray-600">アイテム説明</label>
                          <textarea id ="information" name="information" rows="8" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="p-2 w-1/2">
                          <div class="relative">
                            <label for="price" class="leading-7 text-sm text-gray-600">価格</label>
                            <input type="number" id="price" name="price" value="{{ old('price') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>

                        <div class="p-2 w-1/2">
                          <div class="relative">
                            <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>

                      
                         <div class="p-2 w-1/2">
                          <div class="border p-2">
                          <div class="relative">
                            <label for="quantity" class="leading-7 text-sm text-gray-600">初期在庫 </label>
                            <input type="number" id="quantity" name="quantity" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                        </div>
                       
                        <div class="p-2 w-1/2">
                          <div class="relative">
                            <label for="category" class="leading-7 text-sm text-gray-600">ブランド名・カテゴリー</label>
                            <select name="category" id="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              @foreach($categories as $category)
                              <optgroup label="{{ $category->name }}">
                                @foreach($category->item as $item)
                                <option value="{{ $item->id }}">
                                {{ $item->name }}
                                </option>
                                @endforeach
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <x-select-image :images="$images" name="image1"/>
                        <x-select-image :images="$images" name="image2"/>
                        <x-select-image :images="$images" name="image3"/>
                        <x-select-image :images="$images" name="image4"/>
                        
                        <div class="hidden">
                        <x-select-image :images="$images" name="image5"/>
                       </div>
                        <div class="flex justify-around my-4">
                          <div class="mr-2"><input type="radio" name="is_selling" value="1" @if($item->is_selling = true){ checked } @endif>販売する</div>
                          <div><input type="radio" name="is_selling" value="0" @if($item->is_selling = false){ checked } @endif>販売停止</div>
                        </div>
                        <div class="flex justify-between p-2 w-full">
                          <div><button type="button" onclick="location.href='{{ route('owner.items.index')}}'" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻る</button></div>
                          <div><button type="submit" class="flex mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">アイテム登録</button></div>
                        </div>
                      </div>
                        </form>
                    </div>
                  </div>
                </section>
              </div>
          </div>
      </div>
  </div>

<script>
'use strict'
 const images = document.querySelectorAll('.image') 
 images.forEach(image => { 
 image.addEventListener('click', function(e){ 
 const imageName = e.target.dataset.id.substr(0, 6) 
 const imageId = e.target.dataset.id.replace(imageName + '_', '') // 6文字カット
 const imageFile = e.target.dataset.file
 const imagePath = e.target.dataset.path
 const modal = e.target.dataset.modal
 document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile
 document.getElementById(imageName + '_hidden').value = imageId
 MicroModal.close(modal);
 })
 })
 </script>

</x-app-layout>
