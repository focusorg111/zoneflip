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
        <div class="items-sec" >
            @foreach($recentProducts as $product)
            <div class="col-md-3 feature-grid" data-product-id="{{$product->product_id}}">
                @if(isset($product->recentProduct->product_image))
                    <div style="height: 200px">
             <a href="{{route('product.quickdetail',$product->product_id)}}"><img src="{{asset('assets/product_image/thumbs/'.$product->recentProduct->product_image)}}" alt=""/></a>
                    </div>
                 @else
                    <div style="height: 200px">
                        <a href="{{route('product.quickdetail',$product->product_id)}}"><img src="{{asset('assets/product_image/thumbs/default.png')}}" alt=""/></a>
                        </div>
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
            var  complete=0;
            $(window).scrollTop(0);

            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                  //  alert("bottom!");
                    var  productId=    $('.items-sec').children().last().attr('data-product-id');

                    $.ajax({
                        method: 'get',
                        data: {
                            product_id: productId
                        },
                        beforeSend : function()
                        {
                          if(complete==1)
                          {

                              return false;
                          }
                        },
                        url: '{{route("show.image")}}',
                       success: function (data) {
                           if(data=='')
                           {
                               complete=1;

                           }
                           else{
                               $(".items-sec").append(data);
                           }


                        }
                    });
                }
            });
        });
    </script>
@endsection


@endsection
