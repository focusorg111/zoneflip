@extends('layout.default1')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Products</li>
        </ol>
        <h2>Our Products</h2>
        <div class="col-md-9 product-model-sec">
            @foreach($products as $product)
            <a href="single.html"><div class="product-grid">
                    <div class="more-product"><span> </span></div>
                    @foreach($products->productImage as $productimage)
                    <div class="product-img b-link-stripe b-animate-go  thickbox">
                        <img src="{{asset('assets/product_image/'.$productimage->product_image)}}" class="img-size" alt="">
                        <div class="b-wrapper">
                            <h4 class="b-animate b-from-left  b-delay03">
                                <button><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
                            </h4>
                        </div>
                    </div>
            </a>
            @endforeach
            <div class="product-info simpleCart_shelfItem">
                <div class="product-info-cust prt_name">
                    <h4>{{$product->product_name}}</h4>
                    <span class="item_price">{{$product->price}}</span>
                    <div class="ofr">
                        <p class="disc">{{$product->discount}}</p>
                    </div>
                    <input type="text" class="item_quantity" value="1" />
                    <input type="button" class="item_add items" value="ADD">
                    <div class="clearfix"> </div>
                </div>

            </div>
        </div>
@endforeach
</div>
    <div class="rsidebar span_1_of_left">
        <section  class="sky-form">
            <div class="product_right">
                <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
                <div class="tab1">
                    <ul class="place">
                        <li class="sort">Home Decorates</li>
                        <li class="by"><img src="images/do.png" alt=""></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="single-bottom">
                        <a href="#"><p>Lanterns</p></a>
                        <a href="#"><p>Wall Lamps</p></a>
                        <a href="#"><p>Table Lamps</p></a>
                        <a href="#"><p>Selling Lamps</p></a>
                    </div>
                </div>
                <div class="tab2">
                    <ul class="place">
                        <li class="sort">Festive Needs</li>
                        <li class="by"><img src="images/do.png" alt=""></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="single-bottom">
                        <a href="#"><p>Lanterns</p></a>
                        <a href="#"><p>Disco Lights</p></a>
                    </div>
                </div>
                <div class="tab3">
                    <ul class="place">
                        <li class="sort">Kitchen & Dining</li>
                        <li class="by"><img src="images/do.png" alt=""></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="single-bottom">
                        <a href="#"><p>Lights & Lamps</p></a>
                    </div>
                </div>
                <div class="tab4">
                    <ul class="place">
                        <li class="sort">Books</li>
                        <li class="by"><img src="images/do.png" alt=""></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="single-bottom">
                        <a href="#"><p>Standing Lamps</p></a>
                        <a href="#"><p>Lamps</p></a>
                        <a href="#"><p>Led Lamps</p></a>
                    </div>
                </div>
                <div class="tab5">
                    <ul class="place">
                        <li class="sort">Automotive</li>
                        <li class="by"><img src="images/do.png" alt=""></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="single-bottom">
                        <a href="#"><p>Car Lights</p></a>
                        <a href="#"><p>Stick Lights</p></a>
                        <a href="#"><p>Thread Lights</p></a>
                    </div>
                </div>

                <!--script-->
                <script>
                    $(document).ready(function(){
                        $(".tab1 .single-bottom").hide();
                        $(".tab2 .single-bottom").hide();
                        $(".tab3 .single-bottom").hide();
                        $(".tab4 .single-bottom").hide();
                        $(".tab5 .single-bottom").hide();

                        $(".tab1 ul").click(function(){
                            $(".tab1 .single-bottom").slideToggle(300);
                            $(".tab2 .single-bottom").hide();
                            $(".tab3 .single-bottom").hide();
                            $(".tab4 .single-bottom").hide();
                            $(".tab5 .single-bottom").hide();
                        })
                        $(".tab2 ul").click(function(){
                            $(".tab2 .single-bottom").slideToggle(300);
                            $(".tab1 .single-bottom").hide();
                            $(".tab3 .single-bottom").hide();
                            $(".tab4 .single-bottom").hide();
                            $(".tab5 .single-bottom").hide();
                        })
                        $(".tab3 ul").click(function(){
                            $(".tab3 .single-bottom").slideToggle(300);
                            $(".tab4 .single-bottom").hide();
                            $(".tab5 .single-bottom").hide();
                            $(".tab2 .single-bottom").hide();
                            $(".tab1 .single-bottom").hide();
                        })
                        $(".tab4 ul").click(function(){
                            $(".tab4 .single-bottom").slideToggle(300);
                            $(".tab5 .single-bottom").hide();
                            $(".tab3 .single-bottom").hide();
                            $(".tab2 .single-bottom").hide();
                            $(".tab1 .single-bottom").hide();
                        })
                        $(".tab5 ul").click(function(){
                            $(".tab5 .single-bottom").slideToggle(300);
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
            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>DISCOUNTS</h4>
            <div class="row row1 scroll-pane">
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto - 10% (20)</label>
                </div>
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
                </div>
            </div>
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
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
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


        <section  class="sky-form">
            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Type</h4>
            <div class="row row1 scroll-pane">
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Lights (30)</label>
                </div>
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diwali Lights   (30)</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Tube Lights      (30)</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>LED Lights        (30)</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bulbs  (30)</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ceiling Lights  (30)</label>
                </div>
            </div>
        </section>
        <section  class="sky-form">
            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Brand</h4>
            <div class="row row1 scroll-pane">
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Everyday</label>
                </div>
                <div class="col col-4">
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anchor</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Philips</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Wipro</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Havells</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Ferolex</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Gold Medal</label>
                </div>
            </div>
        </section>
    </div>
    </div>
    </div>
    @endsection