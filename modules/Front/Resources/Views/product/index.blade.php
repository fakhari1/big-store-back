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
                                    <span>
                                        {{ $product->persian_name }}
                                    </span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="row mt-4">
                            <!-- start image gallery -->
                            <section class="col-md-4">
                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                    <section class="product-gallery">
                                        <section class="product-gallery-selected-image mb-3">
                                            <img src="{{ asset($product->image_path) }}" alt="">
                                        </section>
                                        @if($product->images)
                                            <section class="product-gallery-thumbs">
                                                @foreach($product->images as $key => $image)
                                                    <img class="product-gallery-thumb" src="{{ $image->public_path }}"
                                                         alt="" data-input="{{ $image->public_path }}">
                                                @endforeach
                                            </section>
                                        @endif
                                    </section>
                                </section>
                            </section>
                            <!-- end image gallery -->

                            <!-- start product info -->
                            <section class="col-md-5">

                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                    <form
                                        id="form_add_to_cart"
                                        action="{{ route('users.buys.add-to-cart', ['vendor' => $vendor, 'product' => $product]) }}"
                                        method="post">
                                        @csrf
                                        <!-- start vontent header -->
                                        <section class="content-header mb-3">
                                            <section class="d-flex justify-content-between align-items-center">
                                                <h2 class="content-header-title content-header-title-small">
                                                    {{ $product->persian_name }}
                                                    -
                                                    {{ $product->english_name }}
                                                </h2>
                                                <section class="content-header-link">
                                                    <span>فروشنده: </span>
                                                    {{ $vendor->juridical_name ?? $vendor->shop_name }}
                                                </section>
                                            </section>
                                        </section>
                                        <section class="product-info">

                                            @if(count($product->colors))
                                                <p>
                                                    <span>رنگ انتخاب شده:</span>
                                                    <span id="selected_color_name">
                                                    قهوه ای
                                                </span>
                                                </p>
                                                <p>
                                                    @foreach($product->colors as $key => $color)
                                                        <input type="radio"
                                                               class="d-none"
                                                               name="color"
                                                               id="color-{{ $key }}"
                                                               value="{{ $color->id }}"
                                                               data-color-name="{{ $color->name }}"
                                                               data-color-price="{{ $color->price_increase ?? 0 }}"
                                                               @if($key ==0) checked @endif
                                                        >
                                                        <label
                                                            for="color-{{ $key  }}"
                                                            style="border: 1px solid black; background-color: {{ $color->code }}; cursor: pointer;"
                                                            class="product-info-colors me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="{{ $color->name }}"></label>
                                                    @endforeach

                                                </p>
                                            @endif
                                            @if(count($product->guaranties))
                                                <span>
                                                گارانتی:
                                            </span>
                                                <select name="guaranty" id="guaranty"
                                                        class="form-control form-select form-select-sm mb-3">
                                                    @foreach($product->guaranties as $key => $guaranty)
                                                        <option value="{{ $guaranty->id }}"
                                                                data-guaranty-price="{{ $guaranty->price_increase ?? 0 }}"

                                                                @if($key == 0) selected @endif>{{ $guaranty->title }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            <p>
                                                <i class="fa fa-store-alt cart-product-selected-store me-1"></i>
                                                @if($product->marketable_number > 0)
                                                    <span class="text-success">کالا موجود در انبار</span>
                                                @else
                                                    <span class="text-danger">کالا ناموجود در انبار</span>
                                                @endif
                                            </p>
                                            <p><a class="btn btn-light  btn-sm text-decoration-none" href="#"><i
                                                        class="fa fa-heart text-danger"></i> افزودن به علاقه مندی</a>
                                            </p>
                                            <section>
                                                <section class=" cart-product-number d-inline-block ">
                                                    <button class="cart-number cart-number-down" type="button">-</button>
                                                    <input class=""
                                                           name="number"
                                                           id="number"
                                                           type="number"
                                                           min="1"
                                                           max="5"
                                                           step="1"
                                                           value="1"
                                                           readonly="readonly"
                                                    >
                                                    <button class="cart-number cart-number-up" type="button">+</button>
                                                </section>
                                            </section>
                                            <p class="mb-3 mt-5">
                                                <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی
                                                نشده
                                                است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و
                                                سپس
                                                نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ
                                                اضافه
                                                شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش
                                                کالا
                                                بر اساس نحوه ارسال که شما انتخاب کرده اید کالا برای شما در مدت زمان
                                                مذکور
                                                ارسال می گردد.
                                            </p>
                                        </section>
                                    </form>
                                </section>

                            </section>
                            <!-- end product info -->

                            <section class="col-md-3">
                                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">قیمت کالا</p>
                                        <p class="text-muted" id="product_price"
                                           data-product-original-price="{{ $product->price }}">
                                            {{ priceFormat($product->price) }}
                                            <span class="small">ریال</span>
                                        </p>
                                    </section>

                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالا</p>
                                        <p class="text-danger fw-bolder"
                                           id="product-discount-price"
                                           data-product-discount-price="{{ $product->amazing_sale?->amount ?? 0 }}">
                                            {{ priceFormat($product->amazing_sale?->amount) ?? 0 }}
                                            <span class="small">ریال</span></p>
                                    </section>

                                    <section class="border-bottom mb-3"></section>

                                    <section class="d-flex justify-content-end align-items-center">
                                        <p class="fw-bolder">
                                            <span id="final-price">
                                                {{ priceFormat($product->price) }}
                                            </span>
                                            <span
                                                class="small">ریال</span></p>
                                    </section>

                                    <section class="">
                                        @if($product->marketable_number > 0)
                                            <button onclick="document.getElementById('form_add_to_cart').submit()"
                                                    id="next-level" href="#" class="btn btn-danger d-block">
                                                افزودن به سبد
                                                خرید
                                            </button>
                                        @else
                                            <button class="btn btn-danger d-block w-100" disabled>
                                                موجود نیست
                                            </button>
                                        @endif

                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->

        <div class="row vendor-products content-wrapper bg-white p-3 rounded-2 my-3">
            <h2>موجود در دیگر فروشگاه ها</h2>
            @foreach($product->vendors as $key => $vend)
                @if($vend->id == $vendor->id)
                    @continue

                @else
                    <section class="border-bottom-0">
                        <a class="d-flex justify-content-between w-100 align-items-center text-black-50 text-decoration-none px-5 mb-3"
                           style="max-width: 75%; margin: 0 auto; border-bottom: 1px solid black;"
                           href="{{ route('products.show', ['vendor' => $vend, 'product' => $product]) }}">
                            <div class="vendor-information me-4" style="max-width: 250px;">
                                <section class="">
                                    <section class="">
                                        <img src="{{ $vend->avatar_path }}" alt="">
                                    </section>
                                </section>
                                <section class="">
                                    <section class="">{{ $vend->shop_name }}</section>
                                </section>
                                <h3 class="">
                                    {{ $vend->juridical_name ?? $vend->shop_name }}
                                </h3>
                            </div>
                            <div class="product-information">
                                <section class="">
                                    <section class="product-comment-title">
                                        <img src="{{ $product->image_path }}" alt="">
                                    </section>
                                </section>
                                <section class="">
                                    <section class="">{{ $product->persian_name }}
                                        - {{ $product->english_name }}</section>
                                </section>
                                <h2 class="">
                                    {{ priceFormat($product->price) }}
                                    ریال
                                </h2>
                            </div>
                            {{--                            @if($product->marketable_number > 0)--}}
                            {{--                                <a id="next-level" href="#" class="btn btn-danger d-block">افزودن به سبد--}}
                            {{--                                    خرید</a>--}}
                            {{--                            @else--}}
                            {{--                                <button class="btn btn-secondary d-block w-100" disabled>--}}
                            {{--                                    موجود نیست--}}
                            {{--                                </button>--}}
                            {{--                            @endif--}}
                        </a>
                    </section>
                @endif
            @endforeach
        </div>
        <!-- start product lazy load -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>کالاهای مرتبط</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <!-- start vontent header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                    @foreach($related_products as $key => $prd)
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <section class="product-add-to-cart">
                                                        <a href="#"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="left"
                                                           title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i>
                                                        </a>
                                                    </section>
                                                    <section class="product-add-to-favorite">
                                                        <a href="#"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="left"
                                                           title="افزودن به علاقه مندی"><i
                                                                class="fa fa-heart"></i></a>
                                                    </section>
                                                    <a class="product-link" href="#">
                                                        <section class="product-image">
                                                            <img class="" src="{{ $prd->image_path }}" alt="">
                                                        </section>
                                                        <section class="product-name"><h3>
                                                                {{ $prd->persian_name }}
                                                                -
                                                                {{ $prd->english_name }}
                                                            </h3></section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-price">
                                                                {{ priceFormat($prd->price) }}
                                                                ریال
                                                            </section>
                                                        </section>
                                                        @if($prd->colors)
                                                            <section class="product-colors">
                                                                @foreach($prd->colors as $key => $color)
                                                                    <section class="product-colors-item"
                                                                             style="background-color: {{ $color->code }};">
                                                                    </section>
                                                                @endforeach
                                                            </section>
                                                        @endif
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
        <!-- end product lazy load -->

        <!-- start description, features and comments -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start content header -->
                            <section id="introduction-features-comments" class="introduction-features-comments">
                                <section class="content-header">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title">
                                            <span class="me-2"><a class="text-decoration-none text-dark"
                                                                  href="#introduction">معرفی</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark"
                                                                  href="#features">ویژگی ها</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark"
                                                                  href="#comments">دیدگاه ها</a></span>
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <!-- start content header -->

                            <section class="py-4">

                                <!-- start vontent header -->
                                <section id="introduction" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            معرفی
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-introduction mb-4">
                                    {!! $product->introduction !!}
                                </section>

                                <!-- start vontent header -->
                                <section id="features" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            ویژگی ها
                                        </h2>
                                        <section class="content-header-link">
                                            <a href="#">مشاهده همه</a>
                                        </section>
                                    </section>
                                </section>
                                <section class="product-features mb-4 table-responsive">
                                    <table class="table table-bordered border-white">
                                        @foreach($product->properties as $key => $value)
                                            <tr>
                                                @foreach($value as $k => $item)
                                                    <td>{{ $item }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </table>
                                </section>

                                <!-- start vontent header -->
                                <section id="comments" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            دیدگاه ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-comments mb-4">

                                    <section class="comment-add-wrapper">
                                        <button class="comment-add-button" type="button" data-bs-toggle="modal"
                                                data-bs-target="#add-comment"><i class="fa fa-plus"></i> افزودن دیدگاه
                                        </button>
                                        <!-- start add comment Modal -->
                                        <section class="modal fade" id="add-comment" tabindex="-1"
                                                 aria-labelledby="add-comment-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-comment-label"><i
                                                                class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" action="#">

                                                            <section class="col-6 mb-2">
                                                                <label for="first_name"
                                                                       class="form-label mb-1">نام</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                       id="first_name" placeholder="نام ...">
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="last_name" class="form-label mb-1">نام
                                                                    خانوادگی</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                       id="last_name" placeholder="نام خانوادگی ...">
                                                            </section>

                                                            <section class="col-12 mb-2">
                                                                <label for="comment" class="form-label mb-1">دیدگاه
                                                                    شما</label>
                                                                <textarea class="form-control form-control-sm"
                                                                          id="comment" placeholder="دیدگاه شما ..."
                                                                          rows="4"></textarea>
                                                            </section>

                                                        </form>
                                                    </section>
                                                    <section class="modal-footer py-1">
                                                        <button type="button" class="btn btn-sm btn-primary">ثبت
                                                            دیدگاه
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                                data-bs-dismiss="modal">بستن
                                                        </button>
                                                    </section>
                                                </section>
                                            </section>
                                        </section>
                                    </section>

                                    <section class="product-comment">
                                        <section class="product-comment-header d-flex justify-content-start">
                                            <section class="product-comment-date">۲۱ مرداد ۱۴۰۰</section>
                                            <section class="product-comment-title">مجتبی مجدی</section>
                                        </section>
                                        <section class="product-comment-body">
                                            با این تخفیف قیمت خیلی خوبه
                                        </section>
                                    </section>

                                    <section class="product-comment">
                                        <section class="product-comment-header d-flex justify-content-start">
                                            <section class="product-comment-date">۲۱ مرداد ۱۴۰۰</section>
                                            <section class="product-comment-title">هدیه سادات هاشمی نژاد</section>
                                        </section>
                                        <section class="product-comment-body">
                                            پیشنهاد میشه، کتاب مفیدیه
                                        </section>
                                    </section>

                                    <section class="product-comment">
                                        <section class="product-comment-header d-flex justify-content-start">
                                            <section class="product-comment-date">۲۱ مرداد ۱۴۰۰</section>
                                            <section class="product-comment-title">علی محمدی</section>
                                        </section>
                                        <section class="product-comment-body">
                                            هنوز مطالعه نکردم ولی از نظر چاپ و نشر و قيمت مناسب عالیه، کیفیت چاپ و جنسش
                                            عالیه با تخفیفی که خورده قیمت ۱۳ تومن واقعا براش فوق العاده هست محتوای کتابم
                                            که اصلا نیاز به تعریف نداره
                                        </section>
                                    </section>

                                    <section class="product-comment">
                                        <section class="product-comment-header d-flex justify-content-start">
                                            <section class="product-comment-date">۲۱ مرداد ۱۴۰۰</section>
                                            <section class="product-comment-title">حسین رحیمی دهنوی</section>
                                        </section>
                                        <section class="product-comment-body">
                                            این کتاب رو هر کسی باید حداقل یکبار تو زندگیش بخونه واقعا کتاب خوبیه
                                        </section>

                                        <section class="product-comment ms-5 border-bottom-0">
                                            <section class="product-comment-header d-flex justify-content-start">
                                                <section class="product-comment-date">۲۱ مرداد ۱۴۰۰</section>
                                                <section class="product-comment-title">ادمین</section>
                                            </section>
                                            <section class="product-comment-body">
                                                این کتاب برای همه مفیده
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
        <!-- end description, features and comments -->

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
            //input color
            $('input[name="color"]').change(function () {
                bill();
            })


            $('select[name="guaranty"]').change(function () {
                bill();
            })

            //number
            $('.cart-number').click(function () {
                bill();
            })
        })

        function bill() {
            if ($('input[name="color"]:checked').length != 0) {
                var selected_color = $('input[name="color"]:checked');
                $("#selected_color_name").html(selected_color.attr('data-color-name'));
            }

            let selected_color_price = 0;
            let selected_guaranty_price = 0;
            let number = 1;
            let product_discount_price = 0;
            let product_original_price = parseFloat($('#product_price').attr('data-product-original-price'));

            if ($('input[name="color"]:checked').length != 0) {
                selected_color_price = parseFloat(selected_color.attr('data-color-price'));
            }

            if ($('#guaranty option:selected').length != 0) {
                selected_guaranty_price = parseFloat($('#guaranty option:selected').attr('data-guaranty-price'));
            }

            if ($('#number').val() > 0) {
                number = parseFloat($('#number').val());
            }

            if ($('#product-discount-price').length != 0) {
                product_discount_price = parseFloat($('#product-discount-price').attr('data-product-discount-price'));
            }

            console.log(selected_color_price, selected_guaranty_price, number, product_discount_price)


            let product_price = product_original_price +
                selected_color_price +
                selected_guaranty_price;

            console.log('product price', product_price)

            let final_price = number * (product_price - product_discount_price);

            console.log('final price', final_price)


            $('#product-price').html(toFarsiNumber(product_price));
            $('#final-price').html(toFarsiNumber(final_price));

        }

        function toFarsiNumber(number) {
            const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            // add comma
            number = new Intl.NumberFormat().format(number);
            //convert to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }

    </script>
@endsection
