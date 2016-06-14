@extends('layout.default1')
@section('content')
<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider">
            <li>
                <div class="banner1">
                    <img src="{{asset('assets/images/aa3.jpg')}}" style="height:525px">
                </div>
            </li>
            <li>
                <div class="banner2">
                    <img src="{{asset('assets/images/aa.jpg')}}">
                </div>
            </li>
            <li>
                <div class="banner3">
                    <img src="{{asset('assets/images/aa1.jpg')}}" style="height:525px">
                                   </div>
            </li>
        </ul>
    </div>
</div>
<!---->
<script src="{{asset('assets/js/bootstrap.js')}}"> </script>

<div class="items">
    <div class="container">
        <div class="items-sec">
            @foreach($recentProducts as $product)
            <div class="col-md-3 feature-grid">
                @if(isset($product->recentProduct->product_image))
                <a href="product.html"><img src="{{asset('assets/product_image/thumbs/'.$product->recentProduct->product_image)}}" alt=""/>
                 @else
                        <a href="product.html"><img src="{{asset('assets/product_image/thumbs/default.png')}}" alt=""/>
                   @endif
                    <div class="arrival-info">
                        <h4>{{$product->product_name}}</h4>
                        <p>Rs.{{$product->price}}</p>
                        <span class="disc">Dis.{{$product->discount}}%</span>
                    </div>
                    <div class="viw">
                        <a href="{{route('product.quickdetail',$product->product_id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View</a>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    alert("bottom!");
                    $.ajax({
                        method: 'get',
                        url: '{{route("")}}',
                    });
                }
            });
        });
    </script>
@endsection

