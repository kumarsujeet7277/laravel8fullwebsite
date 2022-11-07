<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<style>
    .mail-order-message{
        font-size: 15px;
        font-weight: bold;
    }
</style>
<body>
    <p>HI {{$order->firstname}} {{$order->lastname}}</p>
    <p>Your order has been placed successfully placed</p>
    <br/>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItem as $item)
                <tr>
                    <td><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" width="100"/></td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="border-top: 1px solid #ccc"></td>
                <td class="mail-order-message">Subtotal : {{$order->subtotal}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="mail-order-message">Tax : {{$order->tax}}</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="mail-order-message">Shipping : Free Shipping</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="mail-order-message">Total : {{$order->total}}</td>
            </tr>
        </tbody>
        
    </table>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 style="color: blue">Thank You For Your Order!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>