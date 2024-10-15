<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    @include('client.layouts.partials.styles')
</head>

<body>
    <div id="wrapper" aria-hidden="false">
        <header id="header" class="">
            @include('client.layouts.partials.header')
        </header>

        <div class="container-home" {{ !request()->routeIs('home') ? 'id=container' : '' }}>
            @yield('content')
        </div>

        <footer id="footer">
           @include('client.layouts.partials.footer')
        </footer>
    </div>

    <div class="scrolltop-wrap" aria-hidden="false">
        <a href="#" role="button" aria-label="Scroll to top">
            <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg">
                <path id="scrolltop-bg" d="M0 0h48v48h-48z"></path>
                <path id="scrolltop-arrow" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
            </svg>
        </a>
    </div>

    <div class="hotline-phone-ring-wrap" aria-hidden="false">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a href="tel:084.8888.788" class="pps-btn-img"><img
                        src="https://tapdoanhungthinhcorp.com.vn/wp-content/themes/land070v2-mathsoft/images/hotline.png"
                        alt="Số điện thoại" width="50" /></a>
            </div>
        </div>
        <div class="hotline-bar">
            <a href="tel:084.8888.788"><span class="text-hotline">084.8888.788</span></a>
        </div>
    </div>

    <div id="zalo-ms" class="zalo-ms" aria-hidden="false">
        <div class="phone-ms">
            <div class="phone-ms-circle-fill"></div>
            <div class="phone-ms-img-circle">
                <a target="_blank" href="https://zalo.me/0848888788">
                    <img src="https://tapdoanhungthinhcorp.com.vn/wp-content/themes/land070v2-mathsoft/images/zalo.webp"
                        alt="Chat zalo với chúng tôi" />
                </a>
            </div>
        </div>
    </div>

    <div id="notificationms" class="animate" aria-hidden="false">
        <p><span>Quỳnh Trang</span> đã tải xuống bảng giá</p>
        <p class="notificationms-txt2 nhanbanggia pum-trigger" style="cursor: pointer">
            Click tải bảng giá ngay
        </p>
        <p class="notificationms-txt3"><label>8</label> phút trước</p>
    </div>


    @include('client.layouts.partials.scripts')
</body>

</html>
