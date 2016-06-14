<!DOCTYPE html>
<html>
<head>
    <title>ZONEFLIP</title>
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme style-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/jquery.auto-complete.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" media="all" />

    <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="{{asset('assets/css/flexslider.css')}}" type="text/css" media="screen" />


    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.auto-complete.js')}}"></script>
    <script src="{{asset('assets/js/jquery.auto-complete.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <!--//theme style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
     Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- start menu -->
    <script src="{{asset('assets/js/simpleCart.min.js')}}"> </script>
    <!-- start menu -->
    <link href="{{asset('assets/css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{asset('assets/js/memenu.js')}}"></script>
    <script>$(document).ready(function(){$(".memenu").memenu();});</script>
    <!-- /start menu -->
    <script src="{{asset('assets/js/responsiveslides.min.js')}}"></script>

    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: false,
            });
        });
    </script>
    <link href="{{asset('assets/css/form.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- the jScrollPane script -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.jscrollpane.min.js')}}"></script>
    <script type="text/javascript" id="sourcecode">
        $(function()
        {
            $('.scroll-pane').jScrollPane();
        });
    </script>
    <!-- //the jScrollPane script -->

    <script>

        $(document).ready(function() {
            jQuery.fn.extend({
                propAttr: $.fn.prop || $.fn.attr
            });
            $("#product_id").autocomplete({
                source: function (request, response) {
                    var productId = $("#product_id").val();
                    //var cat = $('.label-holder').attr('data-id');
                    $.ajax({
                        url: '{!! route('get.autocomplete') !!}',
                        dataType: "json",
                        data: {
                            keyword: request.term,
                            product_id: productId,
                           // category: cat
                        }, success: function (data, textStatus, jqXHR) {
                            //console.log(data);
                            response($.map(data, function (value, key) {
                               console.log(value.product_name);
                                var productName;

                                if (value.product_name.length > 20) {
                                    productName = value.product_name.substring(0, 20);

                                } else {
                                    productName = value.product_name;
                                }
                                return {
                                    label: productName,
                                    id: value.product_id

                                };
                            }));
                        },

                    });
                },
                    select: function( event, ui ) {

                        var route = '{{ route('product.quickdetail')}}' + '/' + ui.item.id;
                        window.location.href = route;
                    }
            });
                });
    </script>


</head>
<body>
<!--header-->
<div class="header-top">
    <div class="header-bottom">
        <div class="logo">
            <h1><a href="index.html">ZONEFLIP</a></h1>
        </div>
        <!---->
        <div class="top-nav">
            <ul class="memenu skyblue"><li class="active"><a href="{{route('index')}}">Home</a></li>
                <li class="grid"><a href="#">Products</a>
                    <div class="mepanel">
                        <div class="row">
                            <?php
                            $categories=get_navigation();
                            ?>
                            @foreach($categories as $category)
                                <div class="col1 me-one">
                                    <h4>{{ucwords($category->category_name)}}</h4>
                                    @foreach($category->subcategories as $subcategory)
                                        <ul>
                                            <li><a href="{{route('product.list',$subcategory->subcategory_id)}}">{{ucwords($subcategory->subcategory_name)}}</a></li>
                                        </ul>
                                    @endforeach
                                </div>
                            @endforeach

                        </div>
                    </div>
                </li>
                <li class="grid"><a href="#">Accessories</a>
                    <div class="mepanel">
                        <div class="row">
                            <div class="col1 me-one">
                                <h4>Shop</h4>
                                <ul>
                                    <li><a href="product.html">New Arrivals</a></li>
                                    <li><a href="product.html">Home</a></li>
                                    <li><a href="product.html">Decorates</a></li>
                                    <li><a href="product.html">Accessories</a></li>
                                    <li><a href="product.html">Kids</a></li>
                                    <li><a href="product.html">Login</a></li>
                                    <li><a href="product.html">Brands</a></li>
                                    <li><a href="product.html">My Shopping Bag</a></li>
                                </ul>
                            </div>
                            <div class="col1 me-one">
                                <h4>Type</h4>
                                <ul>
                                    <li><a href="product.html">Diwali Lights</a></li>
                                    <li><a href="product.html">Tube Lights</a></li>
                                    <li><a href="product.html">Bulbs</a></li>
                                    <li><a href="product.html">Ceiling Lights</a></li>
                                    <li><a href="product.html">Accessories</a></li>
                                    <li><a href="product.html">Lanterns</a></li>
                                </ul>
                            </div>
                            <div class="col1 me-one">
                                <h4>Popular Brands</h4>
                                <ul>
                                    <li><a href="product.html">Everyday</a></li>
                                    <li><a href="product.html">Philips</a></li>
                                    <li><a href="product.html">Havells</a></li>
                                    <li><a href="product.html">Wipro</a></li>
                                    <li><a href="product.html">Jaguar</a></li>
                                    <li><a href="product.html">Ave</a></li>
                                    <li><a href="product.html">Gold Medal</a></li>
                                    <li><a href="product.html">Anchor</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="grid"><a href="typo.html">Typo</a></li>
                <li class="grid"><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <!---->

        <div class="row">
            <div class="form-search">
                <input type="text" name="product_name" id="product_id" placeholder="search" autocomplete="off">
            </div>



        <div class="cart box_1">
            <a href="checkout.html">
                <div class="total">
                    <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span>)</div>
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
            </a>
            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
            <div class="clearfix"> </div>
        </div>
        <div> <a href="{{route('login')}}" class="pull-right">Login</a><a href="{{route('register.view')}}" class="pull-right">Register|</a></div>

        <div class="clearfix"></div>
        <!---->
    </div>
    <div class="clearfix"> </div>
</div>
</div>




<div class="product-model">
    @yield('content')
    </div>
<!---->
<div class="subscribe">
    <div class="container">
        <h3>Newsletter</h3>
        <form>
            <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
            <input type="submit" value="Subscribe">
        </form>
    </div>
</div>
<!---->

<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 about-us">
                <h3>About Us</h3>
                <p>Maecenas nec auctor sem. Vivamus porttitor tincidunt elementum nisi a, euismod rhoncus urna. Curabitur scelerisque vulputate arcu eu pulvinar. Fusce vel neque diam</p>
            </div>
            <div class="col-md-3 ftr-grid">
                <h3>Information</h3>
                <ul class="nav-bottom">
                    <li><a href="#">Track Order</a></li>
                    <li><a href="#">New Products</a></li>
                    <li><a href="#">Location</a></li>
                    <li><a href="#">Our Stores</a></li>
                    <li><a href="#">Best Sellers</a></li>
                </ul>
            </div>
            <div class="col-md-3 ftr-grid">
                <h3>More Info</h3>
                <ul class="nav-bottom">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Membership</a></li>
                </ul>
            </div>
            <div class="col-md-3 ftr-grid">
                <h3>Categories</h3>
                <ul class="nav-bottom">
                    <li><a href="#">Car Lights</a></li>
                    <li><a href="#">LED Lights</a></li>
                    <li><a href="#">Decorates</a></li>
                    <li><a href="#">Wall Lights</a></li>
                    <li><a href="#">Protectors</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="copywrite">
    <div class="container">
        <div class="copy">
            <p>© 2015 Lighting. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
        </div>
        <div class="social">
            <a href="#"><i class="facebook"></i></a>
            <a href="#"><i class="twitter"></i></a>
            <a href="#"><i class="dribble"></i></a>
            <a href="#"><i class="google"></i></a>
            <a href="#"><i class="youtube"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!---->
</body>
</html>
