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
        <div class="well text-center">
        <div class="form-group">
          <label for=""></label>
          <select multiple class="form-control" name="" id="price">
          <option>select Price range</option>
            <option value="0-200">0-200</option>
            <option value="200-400">200-400</option>
            <option value="400-600">400-600</option>
            
            <option></option>
          </select>
        </div>
             
        </div>
    </div><!--/price-range-->
    <div class="shipping text-center"><!--shipping-->
        <img src="images/home/shipping.jpg" alt="" />
    </div><!--/shipping-->
</div>

