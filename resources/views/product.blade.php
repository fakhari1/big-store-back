<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./../../assets/css/bootstrap/bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="./../../assets/css/bootstrap/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./../../assets/plugins/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./../../assets/plugins/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="./../../assets/css/style.css">
    <link rel="stylesheet" href="./../../assets/css/cart.css">
    <link rel="stylesheet" href="./../../assets/css/address.css">
    <link rel="stylesheet" href="./../../assets/css/payment.css">
    <link rel="stylesheet" href="./../../assets/css/filter.css">
    <link rel="stylesheet" href="./../../assets/css/product.css">
    <link rel="stylesheet" href="./../../assets/css/profile.css">
    <link rel="stylesheet" href="./../../assets/css/login.css">
    <title>صفحه کالا</title>
</head>
<body>


    <!-- start header -->
    @include('layout.header')
    <!-- end header -->



    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">

        <!-- start cart -->
        <section class="mb-4">
            <section class="container-xxl" >
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>{{ $product->title}}</span>
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
                                            <img src="../../assets/images/single-product/1.jpg" alt="">
                                        </section>
                                        <section class="product-gallery-thumbs">
                                            <img class="product-gallery-thumb" src="../../assets/images/single-product/1.jpg" alt="" data-input="../../assets/images/single-product/1.jpg">
                                            <img class="product-gallery-thumb" src="../../assets/images/single-product/2.jpg" alt="" data-input="../../assets/images/single-product/2.jpg">
                                            <img class="product-gallery-thumb" src="../../assets/images/single-product/3.jpg" alt="" data-input="../../assets/images/single-product/3.jpg">
                                            <img class="product-gallery-thumb" src="../../assets/images/single-product/4.jpg" alt="" data-input="../../assets/images/single-product/4.jpg">
                                            <img class="product-gallery-thumb" src="../../assets/images/single-product/5.jpg" alt="" data-input="../../assets/images/single-product/5.jpg">
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <!-- end image gallery -->

                            <!-- start product info -->
                            <section class="col-md-5">

                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                کتاب اثر مرکب نوشته دارن هاردی
                                            </h2>
                                            <section class="content-header-link">
                                                <!--<a href="#">مشاهده همه</a>-->
                                            </section>
                                        </section>
                                    </section>
                                    <section class="product-info">

                                        <p><span>رنگ : قهوه ای</span></p>
                                        <p>
                                            <span style="background-color: #523e02;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="قهوه ای تیره"></span>
                                            <span style="background-color: #0c4128;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="سبز یشمی"></span>
                                            <span style="background-color: #fd7e14;" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="نارنجی پرتقالی"></span>
                                        </p>
                                        <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                        <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                        <p><a class="btn btn-light  btn-sm text-decoration-none" href="#"><i class="fa fa-heart text-danger"></i> افزودن به علاقه مندی</a></p>
                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number-down" type="button">-</button>
                                                <input class="" type="number" min="1" max="5" step="1" value="1" readonly="readonly">
                                                <button class="cart-number-up" type="button">+</button>
                                            </section>
                                        </section>
                                        <p class="mb-3 mt-5">
                                            <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه ارسال که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                                        </p>
                                    </section>
                                </section>

                            </section>
                            <!-- end product info -->

                            <section class="col-md-3">
                                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">قیمت کالا</p>
                                        <p class="text-muted">{{ number_format($product->price) }} <span class="small">ریال</span></p>
                                    </section>

                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالا</p>
                                        <p class="text-danger fw-bolder">260,000 <span class="small">ریال</span></p>
                                    </section>

                                    <section class="border-bottom mb-3"></section>

                                    <section class="d-flex justify-content-end align-items-center">
                                        <p class="fw-bolder">1,066,000 <span class="small">ریال</span></p>
                                    </section>

                                    <section class="">
                                        <a id="next-level" href="#" class="btn btn-danger d-block">افزودن به سبد خرید</a>
                                    </section>

                                </section>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->



        <!-- start product lazy load -->
        <section class="mb-4">
            <section class="container-xxl" >
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
                            <section class="lazyload-wrapper" >
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/3.jpg" alt="">
                                                    </section>
                                                    <section class="product-name"><h3>پکیج آموزش خطاطی و خوشنویسی با کد 624</h3></section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-price">115,000 ریال</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        <section class="product-colors-item" style="background-color: yellow;"></section>
                                                        <section class="product-colors-item" style="background-color: green;"></section>
                                                        <section class="product-colors-item" style="background-color: white;"></section>
                                                        <section class="product-colors-item" style="background-color: blue;"></section>
                                                        <section class="product-colors-item" style="background-color: red;"></section>
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/4.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>مجموعه داستان های هزار و یک شب</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/5.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>کتاب اطلاعات عمومی انتشارات فارابی با کد 3087</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/6.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>کتاب شیوه گرگ اثر جردن بلفورت</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/7.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>مجموعه داستان های قصه های مشهور جهان</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/8.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>کتاب برای سفر خودآموز مکالمات انگلیسی</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/9.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>کتاب آدم های سمی اثر لیلیان گلاس</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/10.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>مجموعه کتاب من پیش از تو، پس از تو، باز هم من</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/11.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>کتاب سلخ اثر غزاله شکوهی</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/12.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>کتاب بیشعوری اثر جردن بلفورت</h3></section>
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
                                                <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class="" src="../../assets/images/products/13.jpg" alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name"><h3>کتاب تختخوابت را مرتب کن اثر ژنرال ویلیام مک ریون</h3></section>
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
        <!-- end product lazy load -->

        <!-- start description, features and comments -->
        <section class="mb-4">
            <section class="container-xxl" >
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start content header -->
                            <section id="introduction-features-comments" class="introduction-features-comments">
                                <section class="content-header">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title">
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#introduction">معرفی</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#features">ویژگی ها</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#comments">دیدگاه ها</a></span>
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
                                    {{ $product->introduction  }}
                                </section>

                                <!-- start vontent header -->
                                <section id="features" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            ویژگی ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-features mb-4 table-responsive">
                                    <table class="table table-bordered border-white">
                                        <tr>
                                            <td>وزن</td>
                                            <td>220 گرم</td>
                                        </tr>
                                        <tr>
                                            <td>قطع</td>
                                            <td>رقعی</td>
                                        </tr>
                                        <tr>
                                            <td>تعداد صفحات</td>
                                            <td>173 صفحه</td>
                                        </tr>
                                        <tr>
                                            <td>نوع جلد</td>
                                            <td>شومیز</td>
                                        </tr>
                                        <tr>
                                            <td>نویسنده/نویسندگان</td>
                                            <td>دارن هاردی</td>
                                        </tr>
                                        <tr>
                                            <td>مترجم</td>
                                            <td>ناهید محمدی</td>
                                        </tr>
                                        <tr>
                                            <td>ناشر</td>
                                            <td>انتشارات نگین ایران</td>
                                        </tr>
                                        <tr>
                                            <td>رده‌بندی کتاب</td>
                                            <td>روان‌شناسی (فلسفه و روان‌شناسی)</td>
                                        </tr>
                                        <tr>
                                            <td>شابک</td>
                                            <td>9786227195132</td>
                                        </tr>
                                        <tr>
                                            <td>سایر توضیحات</td>
                                            <td>چهار صفحه اول رنگی</td>
                                        </tr>
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
                                        <button class="comment-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-comment" ><i class="fa fa-plus"></i> افزودن دیدگاه</button>
                                        <!-- start add comment Modal -->
                                        <section class="modal fade" id="add-comment" tabindex="-1" aria-labelledby="add-comment-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-comment-label"><i class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" action="#">

                                                            <section class="col-6 mb-2">
                                                                <label for="first_name" class="form-label mb-1">نام</label>
                                                                <input type="text" class="form-control form-control-sm" id="first_name" placeholder="نام ...">
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="last_name" class="form-label mb-1">نام خانوادگی</label>
                                                                <input type="text" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی ...">
                                                            </section>

                                                            <section class="col-12 mb-2">
                                                                <label for="comment" class="form-label mb-1">دیدگاه شما</label>
                                                                <textarea class="form-control form-control-sm" id="comment" placeholder="دیدگاه شما ..." rows="4"></textarea>
                                                            </section>

                                                        </form>
                                                    </section>
                                                    <section class="modal-footer py-1">
                                                        <button type="button" class="btn btn-sm btn-primary">ثبت دیدگاه</button>
                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
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
                                            هنوز مطالعه نکردم ولی از نظر چاپ و نشر و قيمت مناسب عالیه، کیفیت چاپ و جنسش عالیه با تخفیفی که خورده قیمت ۱۳ تومن واقعا براش فوق العاده هست محتوای کتابم که اصلا نیاز به تعریف نداره
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




    <!-- start footer -->
   @include('layout.footer')
    <!-- end footer -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../assets/js/jQuery-3.5.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="../../assets/js/bootstrap/bootstrap.min.js" ></script>
    <script src="../../assets/js/bootstrap/bootstrap.bundle.min.js" ></script>
    <script src="../../assets/plugins/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../assets/js/main.js" ></script>
</body>
</html>
