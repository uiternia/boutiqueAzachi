<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          オーナー一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <button onclick="location.href='{{ route('admin.owners.create')}}'" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                  新規オーナー作成
                </button>                
                @foreach ($owners as $owner)
                  <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メール</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                              <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="px-4 py-3">{{ $owner->name }}</td>
                              <td class="px-4 py-3">{{ $owner->email }}</td>
                              <td class="px-4 py-3">{{ $owner->created_at->diffForHumans()}}</td>
                              <td class="w-10 text-center">
                                <input name="plan" type="radio">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      
                    </div>
                  </section>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</x-app-layout>