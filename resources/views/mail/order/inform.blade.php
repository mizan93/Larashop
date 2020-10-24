@component('mail::message')
Thank you for parchage our product.

Your have to pay:

<table class="table">
    <thead>
        <tr>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td scope="row">{{ $item->name }}</td>

            <td>{{ $item->pivot->quantity2 }}</td>
            <td>{{ $item->pivot->price2 }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

Total: {{ $order->grand_total }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
