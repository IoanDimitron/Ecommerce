<div class="w-full max-w-[85rem] mx-auto py-10 px-4 sm:px-6 lg:px-8">
  <section class="overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
      <div class="flex flex-wrap -mx-4 md:flex-nowrap">
        
        <!-- Image Section -->
        <div class="w-full md:w-1/2 mb-8 md:mb-0" x-data="{ mainImage: '{{url('storage', $product->images[0])}}' }">
          <div class="sticky top-0 z-50 overflow-hidden">
            <div class="relative mb-6 lg:mb-10 lg:h-2/4">
              <img x-bind:src="mainImage" alt="" class="object-cover w-full h-auto max-w-full">
            </div>
            <div class="flex-wrap hidden md:flex">
              @foreach ($product->images as $image)
              <div class="w-1/2 p-2 sm:w-1/4" x-on:click="mainImage='{{url('storage', $image)}}'">
                <img src="{{url('storage', $image)}}" alt="{{ $product->name }}" class="object-cover w-full h-auto max-w-full cursor-pointer hover:border hover:border-blue-500">
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Product Details Section -->
        <div class="w-full md:w-1/2 px-4">
          <div class="lg:pl-20">
            <div class="mb-8 [&>ul]:list-disc [&>ul]:ml-4">
              <h2 class="max-w-xl mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                {{ $product->name }}</h2>
              <p class="inline-block mb-6 text-4xl font-bold text-gray-700 dark:text-gray-400">
                <span>{{Number::currency($product->price, 'BGN')}}</span>
                {{-- <span class="text-base font-normal text-gray-500 line-through dark:text-gray-400">$1800.99</span> --}}
              </p>
              <div class="max-w-md text-gray-700 dark:text-gray-400">
                {!! Str::markdown( $product->description ) !!} 
</div>
            </div>

            <!-- Quantity Selector -->
            <div class="w-32 mb-8">
              <label class="w-full pb-1 text-xl font-semibold text-gray-700 border-b border-blue-300 dark:border-gray-600 dark:text-gray-400">Quantity</label>
              <div class="relative flex flex-row w-full h-10 mt-6 bg-transparent rounded-lg">
                <button wire:click='decreaseQty' class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-400">
                  <span class="m-auto text-2xl font-thin">-</span>
                </button>
                <input type="number" wire:model='quantity' readonly class="flex items-center w-full font-semibold text-center text-gray-700 bg-gray-300 outline-none dark:text-gray-400 dark:bg-gray-900 focus:outline-none text-md" value="1">
                <button wire:click='increaseQty' class="w-20 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 dark:bg-gray-900 hover:text-gray-700 hover:bg-gray-400">
                  <span class="m-auto text-2xl font-thin">+</span>
                </button>
              </div>
            </div>

            <!-- Add to Cart Button -->
            <div class="flex flex-wrap items-center gap-4">
              <button wire:click='addToCart({{ $product->id }})' class="w-full p-4 bg-blue-500 rounded-md lg:w-2/5 dark:text-gray-200 text-gray-50 hover:bg-blue-600 dark:bg-blue-500 dark:hover:bg-blue-700">
                <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add to Cart</span><span wire:loading wire:target='addToCart({{ $product->id }})'>Adding...</span>
              </button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
</div>

