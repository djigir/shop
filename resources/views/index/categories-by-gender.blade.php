<!-- ****** New Arrivals Area Start ****** -->
<section class="new_arrivals_area section_padding_100_0 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>Категории</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="karl-projects-menu mb-100">
        <div class="text-center portfolio-menu">
            @foreach(\App\Models\Category::all() as $category)
                <button class="btn" data-filter=".{{ $category->id }}">{{ $category->title }}</button>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="row karl-new-arrivals">

            <!-- Single gallery Item Start  women = .women или другой класс для подгрузки -->
            @foreach(\App\Models\Product::orderBy('id', 'desc')->take(15)->get() as $product)

                <div class="col-12 col-sm-6 col-md-4 single_gallery_item {{ $product->category }} wow fadeInUpBig" data-wow-delay="0.2s">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="{{ $product->img }}" alt="">
                        {{--<img src="{{ asset('img/products/pr1.webp') }}" alt="">--}}
                        <div class="product-quicview">
                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                        </div>
                    </div>
                    <!-- Product Description -->
                    <div class="product-description">
                        <h4 class="product-price">$39.90</h4>
                        <p>Jeans midi cocktail dress</p>
                        <!-- Add to Cart -->
                        <a href="#" class="add-to-cart-btn add-to-cart-btn_custom">Добавить в корзину</a>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
</section>
<!-- ****** New Arrivals Area End ****** -->
