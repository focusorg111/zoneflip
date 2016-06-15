@extends('layout.default1')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Products</li>
        </ol>
        <h2>Our Products</h2>
        <div class="col-md-9 product-model-sec">
            @if(count($products))
            @foreach($products as $product)
                <a href="{{route('product.quickdetail',$product->product_id)}}"><div class="product-grid">
                        <div class="more-product"><span> </span></div>
                        <div class="product-img b-link-stripe b-animate-go  thickbox">
                            @if(isset($product->productimage->product_image))
                            <img src="{{asset('assets/product_image/thumbs/'.$product->productimage->product_image)}}" class="img-size" alt="">
                            @else
                                <img src="{{asset('assets/product_image/thumbs/default.png')}}" class="img-size" alt="">
                                @endif
                                <div class="b-wrapper">
                                    <h4 class="b-animate b-from-left  b-delay03">
                                        <button><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
                                    </h4>
                                </div>
                        </div>
                </a>
                <div class="product-info simpleCart_shelfItem">
                    <div class="product-info-cust prt_name">
                        <h4>{{$product->product_name}}</h4>
                        <span class="item_price">Rs.{{$product->price}}</span>
                        <div class="ofr">
                            <p class="disc">Dis.{{$product->discount}}%</p>
                        </div>
                        <input type="text" class="item_quantity" value="1" />
                        <input type="button" class="btn btn-primary" value="ADD TO CART">
                        <div class="clearfix"> </div>
                        <div class="clearfix"> </div>
                    </div>

                </div>
        </div>
@endforeach
        @else
            <div class="text-size" style="margin: 55px">No matching products available.</div>
            @endif
</div>
    <div class="rsidebar span_1_of_left">
        <section  class="sky-form">
            <div class="product_right">
                <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
                <?php
                $categories=get_navigation();
                ?>
                @foreach($categories as $category)
                <div class="tab{{$category->category_id}}">
                    <ul class="place">
                        <li class="sort">{{$category->category_name}}</li>
                        <li class="by"><img src="{{asset('assets/images/do.png')}}" alt=""></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="single-bottom">
                        @foreach($category->subcategories as $subcategory)
                        <a href="{{route('product.list',$subcategory->subcategory_id)}}?category_id={{$subcategory->category_id}}"><p>{{ucwords($subcategory->subcategory_name)}}</p></a>
                        @endforeach
                    </div>
                </div>
                @endforeach

                <!--script-->
                <script>
                    $(document).ready(function(){
                        $(".tab1 .single-bottom").hide();
                        $(".tab2 .single-bottom").hide();
                        $(".tab3 .single-bottom").hide();
                        $(".tab4 .single-bottom").hide();
                        $(".tab5 .single-bottom").hide();
                        $(".tab6 .single-bottom").hide();

                        $(".tab1 ul").click(function(){
                            $(".tab1 .single-bottom").slideToggle(300);
                            $(".tab2 .single-bottom").hide();
                            $(".tab3 .single-bottom").hide();
                            $(".tab4 .single-bottom").hide();
                            $(".tab5 .single-bottom").hide();
                            $(".tab6 .single-bottom").hide();
                        })
                        $(".tab2 ul").click(function(){
                            $(".tab2 .single-bottom").slideToggle(300);
                            $(".tab1 .single-bottom").hide();
                            $(".tab3 .single-bottom").hide();
                            $(".tab4 .single-bottom").hide();
                            $(".tab5 .single-bottom").hide();
                            $(".tab6 .single-bottom").hide();
                        })
                        $(".tab3 ul").click(function(){
                            $(".tab3 .single-bottom").slideToggle(300);
                            $(".tab4 .single-bottom").hide();
                            $(".tab5 .single-bottom").hide();
                            $(".tab6 .single-bottom").hide();
                            $(".tab2 .single-bottom").hide();
                            $(".tab1 .single-bottom").hide();
                        })
                        $(".tab4 ul").click(function(){
                            $(".tab4 .single-bottom").slideToggle(300);
                            $(".tab5 .single-bottom").hide();
                            $(".tab6 .single-bottom").hide();
                            $(".tab3 .single-bottom").hide();
                            $(".tab2 .single-bottom").hide();
                            $(".tab1 .single-bottom").hide();
                        })
                        $(".tab5 ul").click(function(){
                            $(".tab5 .single-bottom").slideToggle(300);
                            $(".tab6 .single-bottom").hide();
                            $(".tab4 .single-bottom").hide();
                            $(".tab3 .single-bottom").hide();
                            $(".tab2 .single-bottom").hide();
                            $(".tab1 .single-bottom").hide();
                        })
                        $(".tab6 ul").click(function(){
                            $(".tab6 .single-bottom").slideToggle(300);
                            $(".tab5 .single-bottom").hide();
                            $(".tab4 .single-bottom").hide();
                            $(".tab3 .single-bottom").hide();
                            $(".tab2 .single-bottom").hide();
                            $(".tab1 .single-bottom").hide();
                        })

                    });
                </script>
                <!-- script -->
        </section>


        <section  class="sky-form">
            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Price</h4>
            <ul class="dropdown-menu1">
                <li><a href="">
                        <div id="slider-range"></div>
                        <input type="text" id="amount" style="border: 0; font-weight: NORMAL;   font-family: 'Dosis-Regular';" />
                    </a></li>
            </ul>
        </section>
        <!---->
        <script type="text/javascript" src="{{asset('assetsjs/jquery-ui.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}">
        <script type='text/javascript'>//<![CDATA[
            $(window).load(function(){
                $( "#slider-range" ).slider({
                    range: true,
                    min: 0,
                    max: 100000,
                    values: [ 500, 100000 ],
                    slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                    }
                });
                $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

            });//]]>
        </script>
        <!---->

    </div>
    </div>
    </div>
    @endsection