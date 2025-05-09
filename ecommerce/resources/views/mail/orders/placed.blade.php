<x-mail::message>
# Order placed successfully!

Thank you for your order. Your order ID is: {{ $order->id }}
<x-mail::button :url="{{$url}}">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
