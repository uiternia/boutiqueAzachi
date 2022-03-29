<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          退会済みオーナー
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="md:p-6 bg-white border-b border-gray-200">
                
                <x-flash-message status="session('status')" />           
                <section class="text-gray-600 body-font">
                  <div class="container md:px-5 py-3 mx-auto">
                    
                    <div class="w-full mx-auto overflow-auto">
                      <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                          <tr>
                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メール</th>
                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                            <th class="w-20 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($expiredOwners as $owner)
                          <tr>
                            <td class="md:px-4 py-3">{{ $owner->name }}</td>
                            <td class="md:px-4 py-3">{{ $owner->email }}</td>
                            <td>
                              <form method="post" action="{{ route('admin.expired-owners.restore',['owner' => $owner->id])}}">
                                @csrf
                                @method('patch')
                                <button type=”submit” class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">戻す</button>
                              </form>
                            </td>
                            <form id="delete_{{$owner->id}}" method="post" action="{{ route('admin.expired-owners.destroy', ['owner' => $owner->id])}}">
                               @csrf
                               <td>
                               <a href="#" data-id="{{ $owner->id }}" onclick="deletePost(this)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-0.5 focus:outline-none hover:bg-red-600 rounded text-lg">完全削除</a>
                               </td>
                              </form>
                           
                            </tr>
                          </tr>
                          @endforeach   
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </section>
                
              </div>
          </div>
      </div>
  </div>
  <script>
    function deletePost(e) {
    'use strict';
    if (confirm('本当に削除してもいいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
    }
    </script>
</x-app-layout>
