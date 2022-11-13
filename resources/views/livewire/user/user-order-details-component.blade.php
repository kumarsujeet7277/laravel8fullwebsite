<div>
    <style>
        .review:hover{
            color: red;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        @if (Session::has('order_message'))
            <div class="alert alert-danger" role="alert">{{Session::get('order_message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Ordered Detail
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('user.orders')}}" class="btn btn-success pull-right">All Orders</a>
                            @if ($order->status == 'ordered')
                                <a href="#" wire:click.prevent="cancelOrder" class="btn btn-warning pull-right" style="margin-right: 20px;">Cancel Order</a>
                            @endif    
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Order Id</th>
                                <td>{{$order->id}}</td>
                                <th>Order Date</th>
                                <td>{{$order->created_at}}</td>
                                <th>Order Status</th>
                                <td>{{$order->status}}</td>
                                @if ($order->status == 'delivered')
                                    <th>Delivered date</th>
                                    <td>{{$order->delivered_date}}</td>
                                @elseif($order->status == 'canceled')
                                    <th>Canceled Date</th>
                                    <td>{{$order->canceled_date}}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ordered Items
                    </div>
                    <div class="panel-body"> 
                        
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach ($order->orderItem as $item)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('assets/images/products') }}/{{$item->product->image}}" alt="{{$item->product->name}}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                        </div>

                                        @if ($item->options)
                                            <div class="product-name">
                                                @foreach (unserialize($item->options) as $key => $value)
                                                    <p><b>{{$key}}:{{$value}}</b></p>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="price-field produtc-price"><p class="price">${{$item->price}}</p></div>
                                        <div class="quantity"> 
                                            <h5>{{$item->quantity}}</h5>
                                        </div> 
                                        <div class="price-field sub-total"><p class="price">${{$item->price * $item->quantity}}</p></div>
                                        @if ($order->status == 'delivered' && $item->rstatus == false)
                                            <div class="price-field sub-total"><p class="price"><a href="{{Route('user.review',['order_item_id'=> $item->id])}}" class="review">write Review</a></p></div>    
                                        @endif
                                        
                                    </li>								
                                @endforeach				
                            </ul>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{$order->subtotal}}</b></p>
                                <p class="summary-info"><span class="title">Discount</span><b class="index">${{$order->discount}}</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index">${{$order->total}}</b></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Billing Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{$order->firstname}}</td>
                                <th>Last Name</th>
                                <td>{{$order->lastname}}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{$order->mobile}}</td>
                                <th>Email</th>
                                <td>{{$order->email}}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{$order->line1}}</td>
                                <th>Line2</th>
                                <td>{{$order->line2}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$order->city}}</td>
                                <th>State</th>
                                <td>{{$order->province}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$order->country}}</td>
                                <th>Zip Code</th>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($order->is_shipping_different)
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shipping Details
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>First Name</th>
                                    <td>{{$order->shipping->firstname}}</td>
                                    <th>Last Name</th>
                                    <td>{{$order->shipping->lastname}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{$order->shipping->mobile}}</td>
                                    <th>Email</th>
                                    <td>{{$order->shipping->email}}</td>
                                </tr>
                                <tr>
                                    <th>Line1</th>
                                    <td>{{$order->shipping->line1}}</td>
                                    <th>Line2</th>
                                    <td>{{$order->shipping->line2}}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{$order->shipping->city}}</td>
                                    <th>State</th>
                                    <td>{{$order->shipping->province}}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{$order->shipping->country}}</td>
                                    <th>Zip Code</th>
                                    <td>{{$order->shipping->zipcode}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Transaction Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
