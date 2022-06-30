<x-app-layout>
  <x-slot name="header">
    
</x-slot>

<form method="post" action="{{route('user.contacts.thanks')}}">
  @csrf
<section class="text-gray-600 body-font relative">
  <div class="absolute inset-0 bg-gray-300">
  </div>
  <div class="container px-5 py-24 mx-auto flex">
    <div class=" bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
      <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">お問い合わせ</h2>
      <p class="leading-relaxed mb-5 text-gray-600">メールでのお問い合わせ</p>
      <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
        <input type="name" id="name" name="name" value="{{old('name')}}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="message" class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
        <textarea id="message" name="message" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
      </div>
      <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">お問い合わせ内容の確認</button>
    </div>
  </div>
</section>
</form>

<footer class="bg-white max-w-screen-2xl px-4 md:px-8 mx-auto">
  <div class="text-gray-400 text-sm text-center border-t py-8">© boutique Azachi</div>
    </footer>
  
   
  </x-app-layout>
  