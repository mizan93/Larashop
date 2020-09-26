<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach ($categories as $category)
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{ route('category.product',$category->slug)}}">{{ $category->cat_name}}
                    -({{ $category->products->count()}})</span>
                </a></h4>
            </div>
        </div>
        @endforeach
    </div><!--/category-products-->
    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($brands as $brand)
                    <li><a href="{{ route('brand.product',$brand->slug)}}"> {{{ $brand->name }}}-<span class="badge badge-primary">{{ $brand->products->count()}}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->
    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        {{-- <div class="well text-center">
        <div class="form-group">
          <label for=""></label>
          <select multiple class="form-control" name="" id="pricerange">
          <option>select Price range</option>
            <option value="0-200">0-200</option>
            <option value="200-400">200-400</option>
            <option value="400-600">400-600</option>
            <option value="600-800">600-800</option>
            <option value="800-1000">800-1000</option>


          </select>
        </div>

        </div> --}}
        <div class="well text-center">
            <form action="{{ route('price.range') }}">
                @csrf
            <input type="text" name="minval" id="minval" placeholder="min"/>
<input type="text" name="maxval" id="maxval" placeholder="max"/>
<button type="submit" class="btn btn-primary">Find</button>
</form>
            {{-- <div class="slider slider-horizontal" style="width: 178px;"><div class="slider-track"><div class="slider-selection" style="left: 18.3333%; width: 25.8333%;"></div><div class="slider-handle round left-round" style="left: 18.3333%;"></div><div class="slider-handle round" style="left: 44.1667%;"></div></div><div class="tooltip top" style="top: -30px; left: 23.125px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">110 : 265</div></div><input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" style=""></div><br>
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b> --}}
       </div>
    </div><!--/price-range-->
    {{-- <div class="shipping text-center"><!--shipping-->
        <img src="images/home/shipping.jpg" alt="" />
    </div><!--/shipping--> --}}
</div>
<script>
    $(document).ready(function () {
        $('pricerange').click(function (e) {
            e.preventDefault();

        });
    });
</script>
