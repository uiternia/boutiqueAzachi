<x-app-layout>
  <x-slot name="header">
    
</x-slot>


<!-- product-grid - start -->
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">Selected</h2>

      <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>
    </div>
    <!-- text - end -->

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-8">
      <!-- product - start -->
      <div>
        <a href="#" class="group h-96 block bg-gray-100 rounded-lg overflow-hidden shadow-lg relative mb-2 lg:mb-3">
          <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700" loading="lazy" alt="Photo by Austin Wade" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" />

          <div class="flex gap-2 absolute left-0 bottom-2">
            <span class="bg-red-500 text-white text-sm font-semibold tracking-wider uppercase rounded-r-lg px-3 py-1.5">-50%</span>
            <span class="bg-white text-gray-800 text-sm font-bold tracking-wider uppercase rounded-lg px-3 py-1.5">New</span>
          </div>
        </a>

        <div class="flex justify-between items-start gap-2 px-2">
          <div class="flex flex-col">
            <a href="#" class="text-gray-800 hover:text-gray-500 text-lg lg:text-xl font-bold transition duration-100">Fancy Outfit</a>
            <span class="text-gray-500">by Fancy Brand</span>
          </div>

          <div class="flex flex-col items-end">
            <span class="text-gray-600 lg:text-lg font-bold">$19.99</span>
            <span class="text-red-500 text-sm line-through">$39.99</span>
          </div>
        </div>
      </div>
      <!-- product - end -->

      <!-- product - start -->
      <div>
        <a href="#" class="group h-96 block bg-gray-100 rounded-lg overflow-hidden shadow-lg relative mb-2 lg:mb-3">
          <img src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700" loading="lazy" alt="Photo by Nick Karvounis" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" />
        </a>

        <div class="flex justify-between items-start gap-2 px-2">
          <div class="flex flex-col">
            <a href="#" class="text-gray-800 hover:text-gray-500 text-lg lg:text-xl font-bold transition duration-100">Cool Outfit</a>
            <span class="text-gray-500">by Cool Brand</span>
          </div>

          <div class="flex flex-col items-end">
            <span class="text-gray-600 lg:text-lg font-bold">$29.99</span>
          </div>
        </div>
      </div>
      <!-- product - end -->

      <!-- product - start -->
      <div>
        <a href="#" class="group h-96 block bg-gray-100 rounded-lg overflow-hidden shadow-lg relative mb-2 lg:mb-3">
          <img src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700" loading="lazy" alt="Photo by Austin Wade" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" />
        </a>

        <div class="flex justify-between items-start gap-2 px-2">
          <div class="flex flex-col">
            <a href="#" class="text-gray-800 hover:text-gray-500 text-lg lg:text-xl font-bold transition duration-100">Nice Outfit</a>
            <span class="text-gray-500">by Nice Brand</span>
          </div>

          <div class="flex flex-col items-end">
            <span class="text-gray-600 lg:text-lg font-bold">$35.00</span>
          </div>
        </div>
      </div>
      <!-- product - end -->

      <!-- product - start -->
      <div>
        <a href="#" class="group h-96 block bg-gray-100 rounded-lg overflow-hidden shadow-lg relative mb-2 lg:mb-3">
          <img src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700" loading="lazy" alt="Photo by Vladimir Fedotov" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" />
        </a>

        <div class="flex justify-between items-start gap-2 px-2">
          <div class="flex flex-col">
            <a href="#" class="text-gray-800 hover:text-gray-500 text-lg lg:text-xl font-bold transition duration-100">Lavish Outfit</a>
            <span class="text-gray-500">by Lavish Brand</span>
          </div>

          <div class="flex flex-col items-end">
            <span class="text-gray-600 lg:text-lg font-bold">$49.99</span>
          </div>
        </div>
      </div>
      <!-- product - end -->
    </div>
  </div>
</div>
<!-- product-grid - end -->




<!-- collections - start -->
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-8 md:mb-12">Collections</h2>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
      <!-- product - start -->
      <div>
        <a href="#" class="group h-96 flex items-end bg-gray-100 rounded-lg overflow-hidden shadow-lg relative p-4">
          <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700" loading="lazy" alt="Photo by Austin Wade" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="w-full flex flex-col bg-white text-center rounded-lg relative p-4">
            <span class="text-gray-500">Men</span>
            <span class="text-gray-800 text-lg lg:text-xl font-bold">Business Causual</span>
          </div>
        </a>
      </div>
      <!-- product - end -->

      <!-- product - start -->
      <div>
        <a href="#" class="group h-96 flex items-end bg-gray-100 rounded-lg overflow-hidden shadow-lg relative p-4">
          <img src="https://images.unsplash.com/photo-1603344797033-f0f4f587ab60?auto=format&q=75&fit=crop&crop=top&w=600&h=700" loading="lazy" alt="Photo by engin akyurt" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="w-full flex flex-col bg-white text-center rounded-lg relative p-4">
            <span class="text-gray-500">Women</span>
            <span class="text-gray-800 text-lg lg:text-xl font-bold">Summer Season</span>
          </div>
        </a>
      </div>
      <!-- product - end -->

      <!-- product - start -->
      <div>
        <a href="#" class="group h-96 flex items-end bg-gray-100 rounded-lg overflow-hidden shadow-lg relative p-4">
          <img src="https://images.unsplash.com/photo-1552668693-d0738e00eca8?auto=format&q=75&fit=crop&crop=top&w=600&h=700" loading="lazy" alt="Photo by Austin Wade" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="w-full flex flex-col bg-white text-center rounded-lg relative p-4">
            <span class="text-gray-500">Men</span>
            <span class="text-gray-800 text-lg lg:text-xl font-bold">Streetwear</span>
          </div>
        </a>
      </div>
      <!-- product - end -->

      <!-- product - start -->
      <div>
        <a href="#" class="group h-96 flex items-end bg-gray-100 rounded-lg overflow-hidden shadow-lg relative p-4">
          <img src="https://images.unsplash.com/photo-1560269999-cef6ebd23ad3?auto=format&q=75&fit=crop&w=600&h=700" loading="lazy" alt="Photo by Austin Wade" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="w-full flex flex-col bg-white text-center rounded-lg relative p-4">
            <span class="text-gray-500">Women</span>
            <span class="text-gray-800 text-lg lg:text-xl font-bold">Sale</span>
          </div>
        </a>
      </div>
      <!-- product - end -->
    </div>
  </div>
</div>
<!-- collections - end -->



<!-- footer - start -->
<div class="bg-white pt-4 sm:pt-10 lg:pt-12">
  <footer class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <div class="flex justify-between mx-10 mb-10">
      <div class="col-span-full lg:col-span-2">
        <!-- logo - start -->
        <div class="flex lg:-mt-2 mb-4">
            <div><img src="{{ asset("images/logo.png") }}"width="30px" height="30px"></div>
            <div class="mx-2 font-bold ">boutique Azachi</div>
        </div>
        <!-- logo - end -->


        <!-- social - start -->
        <div class="flex justify-between gap-4">
          <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
            <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
            </svg>
          </a>

          <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
            <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
            </svg>
          </a>
          {{--お知らせページを今後追加したい--}}
          <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
            <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
            </svg>
          </a>

        </div>
        <!-- social - end -->
      </div>

      <!-- nav - start -->
      <div>
        <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Contact</div>

        <nav class="flex flex-col gap-4">
          <div>
            <a href="#" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">お問い合わせ</a>
          </div>

          
        </nav>
      </div>
      
    </div>

    <div class="text-gray-400 text-sm text-center border-t py-8">© boutique Azachi</div>
  </footer>
</div>
<!-- footer - end -->

 
</x-app-layout>
