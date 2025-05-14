<div class="min-h-screen bg-slate-200 dark:bg-slate-700 px-4 py-8">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
    {{-- Left: Checkout Form --}}
    <div class="lg:col-span-8">
      <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Checkout</h1>
      <form wire:submit.prevent="placeOrder">
        {{-- Shipping Address --}}
        <div class="bg-white rounded-xl shadow p-6 dark:bg-slate-900 mb-8">
          <h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-4">
            Shipping Address
          </h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="first_name" class="block text-gray-700 dark:text-white mb-1">
                First Name
              </label>
              <input
                wire:model="first_name"
                id="first_name"
                type="text"
                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white focus:outline-none @error('first_name') border-red-500 @enderror"
              >
              @error('first_name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="last_name" class="block text-gray-700 dark:text-white mb-1">
                Last Name
              </label>
              <input
                wire:model="last_name"
                id="last_name"
                type="text"
                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white focus:outline-none @error('last_name') border-red-500 @enderror"
              >
              @error('last_name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
            </div>

            <div class="md:col-span-2">
              <label for="phone" class="block text-gray-700 dark:text-white mb-1">
                Phone
              </label>
              <input
                wire:model="phone"
                id="phone"
                type="text"
                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white focus:outline-none @error('phone') border-red-500 @enderror"
              >
              @error('phone')
                <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
            </div>

            <div class="md:col-span-2">
              <label for="street_address" class="block text-gray-700 dark:text-white mb-1">
                Address
              </label>
              <input
                wire:model="street_address"
                id="street_address"
                type="text"
                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white focus:outline-none @error('street_address') border-red-500 @enderror"
              >
              @error('street_address')
                <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="city" class="block text-gray-700 dark:text-white mb-1">
                City
              </label>
              <input
                wire:model="city"
                id="city"
                type="text"
                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white focus:outline-none @error('city') border-red-500 @enderror"
              >
              @error('city')
                <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="state" class="block text-gray-700 dark:text-white mb-1">
                State
              </label>
              <input
                wire:model="state"
                id="state"
                type="text"
                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white focus:outline-none @error('state') border-red-500 @enderror"
              >
              @error('state')
                <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="zip_code" class="block text-gray-700 dark:text-white mb-1">
                ZIP Code
              </label>
              <input
                wire:model="zip_code"
                id="zip_code"
                type="text"
                class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white focus:outline-none @error('zip_code') border-red-500 @enderror"
              >
              @error('zip_code')
                <p class="text-red-500 text-sm">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>

        {{-- Payment Method --}}
        <div class="bg-white rounded-xl shadow p-6 dark:bg-slate-900 mb-8">
          <h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-4">
            Select Payment Method
          </h2>
          <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <li>
              <input
                wire:model="payment_method"
                id="cod"
                type="radio"
                value="cod"
                class="hidden peer"
                name="payment_method"
                required
              >
              <label
                for="cod"
                class="flex justify-between items-center p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer
                       dark:bg-gray-800 dark:border-gray-700
                       peer-checked:border-blue-600 peer-checked:text-blue-600
                       hover:bg-gray-100 @error('payment_method') border-red-500 @enderror"
              >
                Cash on Delivery
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </label>
            </li>
            <li>
              <input
                wire:model="payment_method"
                id="stripe"
                type="radio"
                value="stripe"
                class="hidden peer"
                name="payment_method"
              >
              <label
                for="stripe"
                class="flex justify-between items-center p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer
                       dark:bg-gray-800 dark:border-gray-700
                       peer-checked:border-blue-600 peer-checked:text-blue-600
                       hover:bg-gray-100 @error('payment_method') border-red-500 @enderror"
              >
                Stripe
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </label>
            </li>
          </ul>
          @error('payment_method')
			  <div class="text-red-500 text-sm">{{ $message }}</div>
			@enderror
        </div>

        {{-- Place Order Button --}}
        <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-lg hover:bg-green-600">
          Place Order
        </button>
      </form>
    </div>

    {{-- Right: Order Summary --}}
<!-- Order Summary -->
<div class="lg:col-span-4">
  <div class="bg-white rounded-xl shadow p-6 dark:bg-slate-900 mb-12"> <!-- Increased bottom margin -->
    <h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-4">
      Order Summary
    </h2>
    <div class="space-y-2">
      <div class="flex justify-between text-gray-700 dark:text-white">
        <div>Subtotal</div>
        <div>{{ Number::currency($grand_total, 'BGN') }}</div>
      </div>
      <div class="flex justify-between text-gray-700 dark:text-white">
        <div>Taxes</div>
        <div>0.00</div>
      </div>
      <div class="flex justify-between text-gray-700 dark:text-white">
        <div>Shipping</div>
        <div>0.00</div>
      </div>
    </div>
    <hr class="my-4 border-gray-300 dark:border-gray-600">
    <div class="flex justify-between font-semibold text-gray-700 dark:text-white">
      <div>Total</div>
      <div>{{ Number::currency($grand_total, 'BGN') }}</div>
    </div>
  </div>
</div>

<!-- Basket Summary -->
<div class="bg-white rounded-xl shadow p-6 dark:bg-slate-900 mb-20 mt-12"> <!-- Added top & bottom margin -->
  <h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-4">
    Basket Summary
  </h2>
  <ul class="divide-y divide-gray-200 dark:divide-gray-700 space-y-2">
    @forelse($cart_items as $item)
      <li class="flex items-center justify-between py-2">
        <div class="flex items-center space-x-3">
          <img src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}"
               class="w-12 h-12 rounded-full">
          <div>
            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
              {{ $item['name'] }}
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-400">
              Qty: {{ $item['quantity'] }}
            </p>
          </div>
        </div>
        <div class="text-base font-semibold text-gray-900 dark:text-white">
          {{ Number::currency($item['total_amount'], 'BGN') }}
        </div>
      </li>
    @empty
      <li class="text-center py-4 text-gray-500">No items in cart</li>
    @endforelse
  </ul>
</div>

    </div>
  </div>
</div>

