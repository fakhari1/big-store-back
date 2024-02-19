<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('Front::asset/styles')
    <title>ورود کد تایید</title>
</head>
<body>


<section class="vh-100 d-flex justify-content-center align-items-center pb-5">
    <form action="{{ route('auth.otp.confirmation', ['token' => $token]) }}" method="post">
        @csrf
        <section class="login-wrapper mb-5">
            <section class="login-title">
                <a href="{{ route('auth.otp.show-form') }}" class="text-black-50 text-decoration-none d-flex align-items-center">
                    <i class="fa fa-chevron-circle-right me-2"></i>
                    <span>
                    بازگشت
                    </span>
                </a>
            </section>
            <section class="login-title">دریافت کد تایید</section>
            <section class="login-info">
                کد ارسال شده به شماره موبایل
                {{ $otp->login_identity }}
                را وارد کنید
            </section>
            <section class="login-input-text">
                <input name="code" type="text" class="form-control form-control-sm">
                <div class="text-center my-2">
                    @error('code')
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
