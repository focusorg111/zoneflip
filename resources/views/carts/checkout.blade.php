@extends('layout.default1')
@section('content')
<div class="container">
    <div class="check-sec">
        <div class="col-md-3 cart-total">
            <a class="continue" href="product.quickdetail">Continue to basket</a>
            <div class="price-details">
                <h3>Price Details</h3>
                <span>Total</span>
                <span class="total1">6200.00</span>
                <span>Discount</span>
                <span class="total1">10%(Festival Offer)</span>
                <span>Delivery Charges</span>
                <span class="total1">150.00</span>
                <div class="clearfix"></div>
            </div>
            <ul class="total_price">
                <li class="last_price"> <h4>TOTAL</h4></li>
                <li class="last_price"><span>6150.00</span></li>
            </ul>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <a class="order" href="#">Place Order</a>
            <div class="total-item">
                <h3>OPTIONS</h3>
                <h4>COUPONS</h4>
                <a class="cpns" href="#">Apply Coupons</a>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>

        <div class="col-md-9 cart-items">
            <h1>My Shopping Bag (2)</h1>

            <table class="table table-bordered">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th style="width: 200px">Action</th>
                </tr>
                @foreach($cartPrices as $cartPrice)
                    <tr><td>{{$cartPrice->product_name}}
                        <td>{{$cartPrice->quantity }}</td>
                        <td>{{$cartPrice->price}}</td>
                        <td> <a class="btn btn-danger"  href="">
                                Remove
                            </a>
                            <a class="btn btn-success" href="">To Wishlist</a></td>
                    </tr>
            @endforeach
            </table>


        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //check out -->
<!---->

    @endsection