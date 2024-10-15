<script>
    var panelsStyles = {
        fullContainer: "body"
    };

    var wpcf7 = {
        api: {
            root: "https:\/\/tapdoanhungthinhcorp.com.vn\/wp-json\/",
            namespace: "contact-form-7\/v1",
        },
    };
    var wpcf7 = {
        api: {
            root: "https:\/\/tapdoanhungthinhcorp.com.vn\/wp-json\/",
            namespace: "contact-form-7\/v1",
        },
    };
    var wpcf7 = {
        api: {
            root: "https:\/\/tapdoanhungthinhcorp.com.vn\/wp-json\/",
            namespace: "contact-form-7\/v1",
        },
    };
    var wpcf7 = {
        api: {
            root: "https:\/\/tapdoanhungthinhcorp.com.vn\/wp-json\/",
            namespace: "contact-form-7\/v1",
        },
    };
    var wpcf7 = {
        api: {
            root: "https:\/\/tapdoanhungthinhcorp.com.vn\/wp-json\/",
            namespace: "contact-form-7\/v1",
        },
    };
    var wpcf7 = {
        api: {
            root: "https:\/\/tapdoanhungthinhcorp.com.vn\/wp-json\/",
            namespace: "contact-form-7\/v1",
        },
    };
</script>


<script src="{{ asset('client/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('client/assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('client/assets/js/custom.js') }}"></script>
<script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client/assets/js/wp-embed.min.js') }}"></script>

{{-- <script src="{{ asset('client/assets/js/index.js') }}"></script> --}}
<script src="{{ asset('client/assets/js/regenerator-runtime.min.js') }}"></script>
<script src="{{ asset('client/assets/js/wp-polyfill.min.js') }}"></script>
<script src="{{ asset('client/assets/js/core.min.js') }}"></script>

<script src="{{ asset('client/assets/js/pum-site-scripts.js') }}"></script>

<script src="{{ asset('client/assets/js/styling.min.js') }}"></script>

<script src="{{ asset('client/assets/js/jquery.cycle.min.js') }}"></script>

<script src="{{ asset('client/assets/js/jquery.slider.min.js') }}"></script>

<script src="{{ asset('client/assets/js/jquery.cycle.swipe.min.js') }}"></script>

<script src="{{ asset('client/assets/js/tabs.min.js') }}"></script>

<script src="{{ asset('client/assets/js/lib.core.js') }}"></script>

<script src="{{ asset('client/assets/js/lib.view.js') }}"></script>

<script src="{{ asset('client/assets/js/client.js') }}"></script>

<script src="{{ asset('client/assets/js/default.client.js') }}"></script>

<script src="{{ asset('client/assets/js/tag.item.js') }}"></script>
<script src="{{ asset('client/assets/js/tag.ui.js') }}"></script>
<script src="{{ asset('client/assets/js/handler.image.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {

        window.showToast = function(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
                customClass: {
                    container: "custom-toast",
                },
            });
            Toast.fire({
                icon: icon,
                title: title,
            });
        }

        $(".pum-close.popmake-close").click(function() {
            $(".pum").hide();
        });

        var owl = $(".owl-carouselnewshome");
        owl.owlCarousel({
            margin: 30,
            nav: true,
            loop: true,
            items: 3,
            lazyLoad: true,
            autoplayTimeout: 4000,
            autoplay: false,
            dots: false,
            navText: [
                '<svg class="svg-icon" viewBox="0 0 20 20"> <path d="M11.739,13.962c-0.087,0.086-0.199,0.131-0.312,0.131c-0.112,0-0.226-0.045-0.312-0.131l-3.738-3.736c-0.173-0.173-0.173-0.454,0-0.626l3.559-3.562c0.173-0.175,0.454-0.173,0.626,0c0.173,0.172,0.173,0.451,0,0.624l-3.248,3.25l3.425,3.426C11.911,13.511,11.911,13.789,11.739,13.962 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.148,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.148,17.521,10"></path> </svg>',
                '<svg class="svg-icon" viewBox="0 0 20 20"> <path d="M12.522,10.4l-3.559,3.562c-0.172,0.173-0.451,0.176-0.625,0c-0.173-0.173-0.173-0.451,0-0.624l3.248-3.25L8.161,6.662c-0.173-0.173-0.173-0.452,0-0.624c0.172-0.175,0.451-0.175,0.624,0l3.738,3.736C12.695,9.947,12.695,10.228,12.522,10.4 M18.406,10c0,4.644-3.764,8.406-8.406,8.406c-4.644,0-8.406-3.763-8.406-8.406S5.356,1.594,10,1.594C14.643,1.594,18.406,5.356,18.406,10M17.521,10c0-4.148-3.374-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.147,17.521,10"></path> </svg>',
            ],
            responsive: {
                0: {
                    items: 1,
                    dots: false,
                },
                480: {
                    items: 2,
                    dots: false,
                },
                768: {
                    items: 3,
                },
                1024: {
                    items: 3,
                },
            },
        });
    });
</script>

<script>
    jQuery(function($) {
        jQuery(document).ready(function() {
            var $d = [
                "Vinh Tr\u1ea7n",
                "M\u1ea1nh H\u1ea3o",
                "Ng\u1ecdc Mai",
                "L\u00ea Ng\u1ecdc H\u00e2n",
                "Phan Tr\u01b0\u1eddng",
                "Ph\u01b0\u01a1ng Qu\u1ef3nh",
                "Mr V\u0103n \u0110\u1ed3ng",
                "Nguy\u1ec5n Minh",
                "Qu\u1ef3nh Trang",
                "Ho\u00e0ng Y\u1ebfn",
                "Nguy\u1ec5n Th\u00fay",
            ];
            var $ti = [
                "2",
                "9",
                "25",
                "38",
                "31",
                "10",
                "15",
                "22",
                "8",
                "27",
                "40",
            ];
            var $t = 0;
            setInterval(function() {
                if (jQuery("#notificationms").hasClass("animate")) {
                    jQuery("#notificationms").removeClass("animate");
                } else {
                    $("#notificationms > p > span").text($d[$t]);
                    $("#notificationms > p > label").text($ti[$t]);
                    jQuery("#notificationms").addClass("animate");
                    if ($t >= 30) {
                        $t = 0;
                    } else {
                        $t = $t + 1;
                    }
                    var $ms = Math.floor(Math.random() * 100 + 1);
                    $("#notificationms > h4 > label").text($ms);
                }
            }, 7000);
        });
    });
</script>

@stack('scripts')
