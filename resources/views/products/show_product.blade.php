@if(count($products))
        @foreach($products as $product)
           <a href="{{route('product.quickdetail',$product->product_id)}}">
            <div class="product-grid"  data-product-id="{{$product->product_id}}" data-category-id="{{$product->category_id}}" data-subcategory-id="{{$product->subcategory_id}}">
                <div class="more-product"><span> </span></div>
                <div class="product-img b-link-stripe b-animate-go  thickbox">
                    @if(isset($product->productimage->product_image))
                        <img src="{{asset('assets/product_image/thumbs/'.$product->productimage->product_image)}}" class="img-size" alt="">
                    @else
                        <img src="{{asset('assets/product_image/thumbs/default.png')}}" class="img-size" alt="">
                    @endif
                    <div class="b-wrapper">
                        <h4 class="b-animate b-from-left  b-delay03">
                         <button> <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
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

    @endif
