<header
  class="flex z-50 sticky top-0 flex-wrap md:justify-start md:flex-nowrap w-full bg-white text-sm py-2 md:py-0 dark:bg-gray-800 shadow-md">
  <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8" aria-label="Global">
    <div class="relative md:flex md:items-center md:justify-between">
      <div class="flex items-center justify-between">
        <a class="flex-none text-xl font-semibold dark:text-white" href="/" aria-label="Brand">DCodeMania</a>
        <div class="md:hidden">
          <button type="button"
            class="hs-collapse-toggle w-9 h-9 flex justify-center items-center rounded-lg border border-gray-200 text-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700"
            data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation">
            <svg class="hs-collapse-open:hidden w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
              stroke="currentColor" stroke-width="2">
              <line x1="3" x2="21" y1="6" y2="6" />
              <line x1="3" x2="21" y1="12" y2="12" />
              <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
            <svg class="hs-collapse-open:block hidden w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
              stroke="currentColor" stroke-width="2">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
      </div>

      <div id="navbar-collapse-with-animation"
        class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
        <div class="flex flex-col md:flex-row md:items-center md:justify-end md:gap-x-7 md:ps-7">

          <a wire:navigate class="font-medium {{ request()->is('/') ? 'text-blue-600' : 'text-gray-500 hover:text-gray-400' }} py-2 md:py-4  dark:hover:text-gray-300"
            href="/" aria-current="page">Home</a>

          <a wire:navigate class="font-medium {{ request()->is('categories') ? 'text-blue-600' : 'text-gray-500 hover:text-gray-400' }} py-2 md:py-4  dark:hover:text-gray-300"
            href="/categories">Categories</a>

          <a wire:navigate class="font-medium {{ request()->is('products') ? 'text-blue-600' : 'text-gray-500 hover:text-gray-400' }} py-2 md:py-4  dark:hover:text-gray-300"
            href="/products">Products</a>

          <a wire:navigate class="font-medium flex items-center {{ request()->is('cart') ? 'text-blue-600' : 'text-gray-500 hover:text-gray-400' }} py-2 md:py-4  dark:hover:text-gray-300"
            href="/cart">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            <span class="mr-1">Cart</span>
            <span
              class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-blue-50 border border-blue-200 text-blue-600">{{$total_count}}</span>
          </a>


          <div class="pt-2 md:pt-0">
            <a wire:navigate class="py-2 px-4 inline-flex items-center text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700"
              href="/login">
              Log in
            </a>
          </div>

        </div>
      </div>
    </div>
  </nav>
</header>