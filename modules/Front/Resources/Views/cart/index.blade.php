@extends('Front::layouts.master')

@section('content')

    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">

        <!-- start cart -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>سبد خرید شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        @if(count($cartItems) > 0)
                            <section class="row mt-4">
                                <section class="col-md-9 mb-3">
                                    <section class="content-wrapper bg-white p-3 rounded-2">
                                        <form action="" id="cart_items" method="post">

                                            @php
                                                $totalProductPrice = 0;
                                                $totalDiscount = 0;
                                            @endphp

                                            @foreach($cartItems as $key => $item)

                                                @php
                                                    $totalProductPrice += $item->cartItemProductPrice();
                                                    $totalDiscount += $item->cartItemProductDiscount();
                                                @endphp

                                                <section class="cart-item d-md-flex py-3">
                                                    <section class="cart-img align-self-start flex-shrink-1"><img
                                                            src="{{ asset($item->product->image_path) }}" alt=""
                                                            style="max-width: 100px;"></section>
                                                    <section class="align-self-start w-100">
                                                        <p class="fw-bold">
                                                            {{ $item->product->persian_name }}
                                                            -
                                                            {{ $item->product->english_name }}
                                                        </p>
                                                        <p class="fw-bold">
                                                            <span>فروشنده:</span>
                                                            <span>{{ $item->vendor->juridical_name ?? $item->vendor->shop_name }}</span>
                                                        </p>
                                                        @if($item->product_color_id != null)
                                                            <p>
                                                        <span
                                                            style="background-color: {{ $item->color->code }}; border: 1px solid red; border-radius: 50%; "
                                                            class="cart-product-selected-color me-1"></span>
                                                                <span>{{ $item->color->name }}</span>
                                                            </p>
                                                        @endif
                                                        @if($item->guaranty_id != null)
                                                            <p>
                                                                <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                                <span>{{ $item->guaranty->title }}</span>
                                                            </p>
                                                        @endif
                                                        <p>
                                                            <i class="fa fa-store-alt cart-product-selected-store me-1"></i>
                                                            <span>{{ $item->product->marketable_number > 0 ? 'موجود در انبار' : 'موجودی به صفر رسید' }}</span>
                                                        </p>
                                                        <section>
                                                            <section class="cart-product-number d-inline-block ">
                                                                <button class="cart-number cart-number-down"
                                                                        type="button">-
                                                                </button>
                                                                <input class="number"
                                                                       data-product-price="{{ $item->cartItemProductPrice() }}"
                                                                       data-product-discount="{{ $item->cartItemProductDiscount() }}"
                                                                       value="{{ $item->number }}"
                                                                       type="number"
                                                                       min="1"
                                                                       max="5"
                                                                       step="1"
                                                                       readonly="readonly"
                                                                >
                                                                <button class="cart-number cart-number-up"
                                                                        type="button">+
                                                                </button>
                                                            </section>
                                                            <a class="text-decoration-none ms-4 cart-delete"
                                                               href="{{ route('users.buys.remove-from-cart', ['cart_item' => $item]) }}"><i
                                                                    class="fa fa-trash-alt"></i> حذف از سبد</a>
                                                        </section>
                                                    </section>
                                                    @if(!empty($item->product->activeAmazingDiscounts()))
                                                        <section
                                                            class="cart-items-discount text-danger text-nowrap mb-1">
                                                            تخفیف
                                                            {{ priceFormat($item->cartItemProductDiscount()) }}
                                                        </section>
                                                    @endif
                                                    <section class="align-self-end flex-shrink-1">
                                                        <section class="text-nowrap fw-bold">
                                                            {{ priceFormat($item->cartItemProductPrice()) }}
                                                            ریال
                                                        </section>
                                                    </section>
                                                </section>
                                            @endforeach


                                        </form>
                                    </section>
                                </section>
                                <section class="col-md-3">
                                    <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                        <section class="d-flex justify-content-between align-items-center">
                                            @dd($item->count())
                                            <p class="text-muted">
                                                قیمت کالاها
                                                ({{ $item->count() }})
                                            </p>
                                            <p class="text-muted">
                                            <span id="total_product_price">
                                                {{ priceFormat($totalProductPrice) }}
                                            </span>
                                                ریال
                                            </p>
                                        </section>

                                        <section class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted">تخفیف کالاها</p>
                                            <p class="text-danger fw-bolder">
                                            <span id="total_discount_price">
                                                {{ priceFormat($totalDiscount) }}
                                            </span>
                                                ریال
                                            </p>
                                        </section>
                                        <section class="border-bottom mb-3"></section>
                                        <section class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted">جمع سبد خرید</p>
                                            <p class="fw-bolder">
                                            <span id="total_price">
                                                {{ priceFormat($totalProductPrice - $totalDiscount) }}
                                            </span>
                                                ریال
                                            </p>
                                        </section>

                                        <p class="my-3">
                                            <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده
                                            است.
                                            برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه
                                            ارسال
                                            را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد
                                            شد.
                                            و در نهایت پرداخت این سفارش صورت میگیرد.
                                        </p>


                                        <section class="">
                                            <a href="address.html" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                        </section>

                                    </section>
                                </section>
                            </section>
                        @else
                            <section class="row mt-4">
                                <section class="col-12 mb-3">
                                    <section class="content-wrapper bg-white p-3 rounded-2 text-center">
                                        <h1 class="text-center">سبد خرید شما خالی است</h1>
                                    </section>
                                </section>
                            </section>
                        @endif
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->

        @if(count($cartItems) > 0)
            <section class="mb-4">
                <section class="container-xxl">
                    <section class="row">
                        <section class="col">
                            <section class="content-wrapper bg-white p-3 rounded-2">
                                <!-- start vontent header -->
                                <section class="content-header">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title">
                                            <span>کالاهای مرتبط با سبد خرید شما</span>
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <!-- start vontent header -->
                                <section class="lazyload-wrapper">
                                    <section class="lazyload light-owl-nav owl-carousel owl-theme">


                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/3.jpg" alt="">
                                                        </section>
                                                        <section class="product-name"><h3>پکیج آموزش خطاطی و خوشنویسی با
                                                                کد
                                                                624</h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">115,000 ریال</section>
                                                        </section>
                                                        <section class="product-colors">
                                                            <section class="product-colors-item"
                                                                     style="background-color: yellow;"></section>
                                                            <section class="product-colors-item"
                                                                     style="background-color: green;"></section>
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
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/4.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>مجموعه داستان های هزار و یک
                                                                شب</h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-discount">
                                                                <span class="product-old-price">230,000 </span>
                                                                <span class="product-discount-amount">10%</span>
                                                            </section>
                                                            <section class="product-price">207،000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/5.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>کتاب اطلاعات عمومی انتشارات
                                                                فارابی
                                                                با کد 3087</h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">870,000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/6.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>کتاب شیوه گرگ اثر جردن
                                                                بلفورت</h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-discount">
                                                                <span class="product-old-price">59,000 </span>
                                                                <span class="product-discount-amount">50%</span>
                                                            </section>
                                                            <section class="product-price">29،000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/7.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>مجموعه داستان های قصه های
                                                                مشهور
                                                                جهان</h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">450,000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/8.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>کتاب برای سفر خودآموز مکالمات
                                                                انگلیسی</h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">64,000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/9.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>کتاب آدم های سمی اثر لیلیان
                                                                گلاس</h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-discount">
                                                                <span class="product-old-price">164,000 </span>
                                                                <span class="product-discount-amount">10%</span>
                                                            </section>
                                                            <section class="product-price">147،600 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/10.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>مجموعه کتاب من پیش از تو، پس
                                                                از
                                                                تو، باز هم من</h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">221,000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/11.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>کتاب سلخ اثر غزاله شکوهی</h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">870,000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/12.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>کتاب بیشعوری اثر جردن
                                                                بلفورت</h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">57,000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <section class="product-add-to-favorite"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a></section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="assets/images/products/13.jpg" alt="">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name"><h3>کتاب تختخوابت را مرتب کن اثر
                                                                ژنرال
                                                                ویلیام مک ریون</h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">89,000 ریال</section>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>

                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        @endif

    </main>
    <!-- end main one col -->



    <!-- start body -->
    <section class="container-xxl body-container">
        <aside id="sidebar" class="sidebar">

        </aside>
        <main id="main-body" class="main-body">

        </main>
    </section>
    <!-- end body -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            bill();

            $('.cart-number').click(function () {
                bill();
            })
        })


        function bill() {
            let total_product_price = 0;
            let total_discount = 0;
            let total_price = 0;

            $('.number').each(function () {
                var productPrice = parseFloat($(this).data('product-price'));
                var productDiscount = parseFloat($(this).data('product-discount'));
                var number = parseFloat($(this).val());

                total_product_price += productPrice * number;
                total_discount += productDiscount * number;
            })

            total_price = total_product_price - total_discount;

            $('#total_product_price').html(toFarsiNumber(total_product_price));
            $('#total_discount_price').html(toFarsiNumber(total_discount));
            $('#total_price').html(toFarsiNumber(total_price));


            function toFarsiNumber(number) {
                const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                // add comma
                number = new Intl.NumberFormat().format(number);
                //convert to persian
                return number.toString().replace(/\d/g, x => farsiDigits[x]);
            }

        }
    </script>
@endsection
