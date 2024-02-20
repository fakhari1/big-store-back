<section class="brand-part mb-4 py-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex align-items-center">
                        <h2 class="content-header-title">
                            <span>برندهای ویژه</span>
                        </h2>
                    </section>
                </section>
                <!-- start vontent header -->
                <section class="brands-wrapper py-4">
                    <section class="brands dark-owl-nav owl-carousel owl-theme">
                        @foreach($brands as $key => $brand)
                        <section class="item">
                            <section class="brand-item">
                                <a href="#"><img class="rounded-2" src="../../assets/images/brand/huawei.jpg"
                                                 alt=""></a>
                            </section>
                        </section>
                        @endforeach
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
