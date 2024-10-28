<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    {{-- <link rel="icon" href="{{ asset($config->icon) }}" type="image/x-icon" /> --}}
    <link rel="stylesheet" href="{{ asset('login/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('login/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('login/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}">

    <title>Login</title>
    <style>
        .form-block {
            display: none;
        }

        .form-block.active {
            display: block;
        }

        .error {
            color: red;
            padding: 5px 0px 0px 10px;
            font-size: 13px;

        }

        .password {
            position: relative;
        }

        .password i {
            position: absolute;
            right: 5%;
            top: 60%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .custom-toast {
            width: auto !important;
            /* Cho phép chiều rộng tự động */
            max-width: 500px;
            /* Bạn có thể điều chỉnh giá trị này theo nhu cầu */
            white-space: nowrap;
            /* Ngăn việc xuống dòng */
        }
    </style>
</head>

<body>
    <div class="d-md-flex half">
        <div class="bg" style="background-image: url('{{ asset('login/images/bg_1.jpg') }}');"></div>
        <div class="contents">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <!-- Login Form -->
                        <div id="loginForm" class="form-block mx-auto active">
                            <div class="text-center mb-5">
                                <h3 class="text-uppercase">Đăng nhập <strong> Admin</strong></h3>
                            </div>
                            <form id="myForm">

                                <div class="form-group first">
                                    <label for="loginEmail">Email</label>
                                    <input type="text" class="form-control" placeholder="your-email@gmail.com"
                                        name="email">
                                    <small></small>
                                </div>

                                <div class="form-group last mb-3 password">
                                    <label for="loginPassword">Password</label>
                                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password"
                                        id="loginPassword">
                                    <i class="icon-lock"></i>
                                    <small></small> <!-- Thông báo lỗi -->
                                </div>

                                <div class="d-sm-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-3 mb-sm-0">
                                        <span class="caption">Remember me</span>
                                        <input type="checkbox" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-block py-2 btn-primary"> Đăng nhận</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login/js/popper.min.js') }}"></script>
    <script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(".icon-lock").click(function() {
            $(this).toggleClass("icon-unlock");
            $(this).toggleClass("icon-lock");

            if ($(this).hasClass("icon-unlock")) {
                $(this).parent().find("input").attr("type", "text");
            } else {
                $(this).parent().find("input").attr("type", "password");
            }

        })



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        $(document).ready(function() {

            function showToast(icon, title) {
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

            $('#myForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serializeArray();

                $.ajax({
                    url:"{{ config('app.url') }}/admin/login",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response);

                        if (response.status) {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        } else {
                            $('small.text-danger').text('').removeClass('text-danger');

                            $.each(response.errors, function(key, value) {
                                $(`input[name=${key}]`).siblings("small").addClass(
                                    "text-danger").text(value);
                            })

                            response.message && showToast('error', response.message);
                        }
                    }
                })
            })
        });
    </script>

</body>

</html>
