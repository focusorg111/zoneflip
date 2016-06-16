@extends('layout.default1')
@section('content')
    <div class="product">
        <div class="container">
            <div class="product-price1">
                <div class="top-sing">
                    <div class="col-md-7 single-top">
                        <div class="flexslider">
                            <ul class="slides">
                                @if(count($products->quickProductImage))
                                @foreach($products->quickProductImage as $image)
                                    <li data-thumb="{{asset('assets/product_image/thumbs/'.$image->product_image)}}">
                                    <div class="thumb-image"> <img src="{{asset('assets/product_image/thumbs/'.$image->product_image)}}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                @endforeach
                                    @else
                                        <li data-thumb="{{asset('assets/product_image/thumbs/default.png')}}">
                                            <div class="thumb-image"> <img src="{{asset('assets/product_image/thumbs/default.png')}}" class="img-responsive" alt=""/> </div>
                                        </li>
                                    @endif

                            </ul>
                        </div>

                        <script src="{{asset('assets/js/imagezoom.js')}}"></script>
                        <script defer src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
                        <script>
                            // Can also be used with $(document).ready()
                            $(window).load(function() {
                                $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                });
                            });
                        </script>

                    </div>
                    <div class="col-md-5 single-top-in simpleCart_shelfItem">
                        <div class="single-para ">
                         <h4>{{$products->product_name}} </h4>
                            <h5 class="item_price">Rs.{{$products->price}}</h5>
                        <p class="nv-bullet">{{$products->product_description}}</p>
                            <a class="add-cart item_add" data-product-id="{{$products->product_id}}">ADD TO CART</a>

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
    </div>
    </div>
    <script>

        $(document).ready(function() {
            $(".add-cart").click(function () {
                var prodId =$(this).attr('data-product-id');
                $.ajax({
                    method: 'get',
                    data: {
                       product_id: prodId
                    },
                    url: '{{route('get.cart')}}'

                });
            });
        });



    </script>
    @endsection

