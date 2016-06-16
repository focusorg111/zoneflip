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