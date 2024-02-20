<section class="mb-3">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>پیشنهاد من و تو و ما به شما</span>
                            </h2>
                            <section class="content-header-link">
                                <a href="#">مشاهده همه</a>
                            </section>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="lazyload-wrapper">
                        <section class="lazyload light-owl-nav owl-carousel owl-theme">

                            @foreach($special_offer as $key => $product)
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart">
                                                <a href="#"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="left"
                                                   title="افزودن به سبد خرید"><i
                                                        class="fa fa-cart-plus"></i></a>
                                            </section>
                                            <section class="product-add-to-favorite">
                                                <a href="#"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="left"
                                                   title="افزودن به علاقه مندی"><i
                                                        class="fa fa-heart"></i>
                                                </a>
                                            </section>
                                            <a href="{{ route('products.show', ['vendor' => Modules\Vendor\Models\Vendor::first(), 'product' => $product]) }}"
                                               class="product-link text-black-50 text-decoration-none">

                                                <section class="product-image">
                                                    <img class="" src="../../assets/images/products/21.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <a href="{{ route('products.show', ['vendor' => Modules\Vendor\Models\Vendor::first(), 'product' => $product]) }}"
                                                   class="product-name text-black-50 text-decoration-none">
                                                    <h3>
                                                        {{ $product->persian_name }}
                                                        -
                                                        {{ $product->english_name }}
                                                    </h3>
                                                </a>
                                                <section class="product-price-wrapper">
                                                    <section class="product-discount">
                                                        <span class="product-old-price">
                                                            {{ priceFormat($product->price) }}
                                                            ریال
                                                        </span>
                                                        <span class="product-discount-amount">10%</span>
                                                    </section>
                                                    <section class="product-price">
                                                        {{ priceFormat($product->price) }}
                                                        ریال
                                                    </section>
                                                </section>
                                                <section class="product-colors">
                                                    <section class="product-colors-item"
                                                             style="background-color: white;"></section>
                                                    <section class="product-colors-item"
                                                             style="background-color: blue;"></section>
                                                    <section class="product-colors-item"
                                                             style="background-color: red;"></section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
