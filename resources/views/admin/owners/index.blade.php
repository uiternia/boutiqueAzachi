<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          オーナー一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="md:p-6 bg-white border-b border-gray-200">
                <button onclick="location.href='{{ route('admin.owners.create')}}'" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                  新規オーナー作成
                </button> 
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
                            <th class="md:px-4 w-20 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>                           
                            <th class="md:px-4 w-20 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($owners as $owner)
                          <tr>
                            <td class="md:px-4 py-3">{{ $owner->name }}</td>
                            <td class="md:px-4 py-3">{{ $owner->email }}</td>
                            <td class="md:px-4 py-3">{{ $owner->created_at->diffForHumans()}}</td>
                            <td class="border-t-2 border-b-2 border-gray-200 w-10 text-center">
                              <button onclick="location.href='{{ route('admin.owners.edit',['owner' => $owner->id])}}'" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                                編集
                              </button> 
                            </td>
                            <td>
                            <form id="delete_{{$owner->id}}" method="post" action="{{ route('admin.owners.destroy',['owner' => $owner->id])}}">
                              @csrf
                              @method('delete')
                              <a href="#" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-green-500 rounded" data-id="{{ $owner->id }}" onclick="deletePost(this)">消去</a>
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
  {{$owners->links()}}
  <script>
    function deletePost(e) {
    'use strict';
    if (confirm('本当に削除してもいいですか?')) {
    document.getElementById('delete_' + e.dataset.id).submit();
    }
    }
    </script>
</x-app-layout>
