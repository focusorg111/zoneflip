
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active"><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
        <li><a href="{{url(route('get.products'))}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Add Products</a></li>
        <li><a href="{{url(route('get.product-list'))}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Product List</a></li>
    </ul>

</div><!--/.sidebar-->

