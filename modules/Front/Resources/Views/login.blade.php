<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('Front::asset/styles')
    <title>ورود / ثبت نام</title>
</head>
<body>


<section class="vh-100 d-flex justify-content-center align-items-center pb-5">
    <form action="{{ route('auth.otp.authenticate') }}" method="post">
        @csrf
        <section class="login-wrapper mb-5">
            <section class="login-logo">
                <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
            </section>
            <section class="login-title">ورود / ثبت نام</section>
            <section class="login-info">شماره موبایل یا پست الکترونیک خود را وارد کنید</section>
            <section class="login-input-text">
                <input name="mobile" type="text" class="form-control form-control-sm">
                <div class="text-center my-2">
                    @error('mobile')
                    <span class="badge bg-danger mx-auto">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </section>
            <section class="login-btn d-grid g-2">
                <button type="submit" class="btn btn-danger">ورود به من و تو و ما</button>
            </section>
            <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام
            </section>
        </section>
    </form>
</section>


@include('Front::asset.scripts')
</body>
</html>
