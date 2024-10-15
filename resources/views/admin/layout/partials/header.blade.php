<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <div style="flex: 2; align-items: baseline; display: flex; margin-right: 20px">
                <marquee id="demoMarquee" scrollamount="7" style="color: red">
                    <span style="margin-right: 300px"></span>
                    <span></span>
                </marquee>
            </div>
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">



                <li class="nav-item topbar-user dropdown hidden-caret" style="padding: 0px 20px !important">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src=""
                                alt="..." class="avatar-img rounded-circle" />
                        </div>
                        <span class="profile-username">
                            <span class="op-7">Hi,</span>
                            <span class="fw-bold"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img src=""
                                            alt="image profile" class="avatar-img rounded" />
                                    </div>
                                    <div class="u-text">
                                        <h4></h4>
                                        <p class="text-muted"></p>
                                        <a href="#" class="btn btn-xs btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewProfileModal">View Profile</a>

                                        <!-- Modal -->
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </div>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

    <!-- End Navbar -->
</div>

<div class="modal fade" id="viewProfileModal" tabindex="-1" aria-labelledby="viewProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProfileLabel">Thông tịn tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data"  action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 add_product">
                            <div>
                                <label for="nameInput" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ Auth::user()->name }}" required>
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="name_error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                    required id="email">
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="email_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 add_product">
                            <div>
                                <label for="phone" class="form-label">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                                    required id="phone">
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="phone_error"></span>
                                </div>
                            </div>



                            <div>
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ Auth::user()->address }}" id="address" required>
                                <div class="col-lg-9">
                                    <span class="invalid-feedback d-block" style="font-weight: 500"
                                        id="address_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 add_product">
                            <div class="form-group">
                                <label for="avatar" class="form-label">Avatar</label>
                                <div class="custom-file">
                                    <input id="avatar" class="custom-file-input @error('avatar') is-invalid @enderror"
                                        type="file" name="avatar" accept="image/*">
                                    <label class="custom-file-label" for="avatar">Chọn
                                        avatar</label>
                                </div>
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img id="profileImageavatar" style="width:100px; height:100px"
                                    src="{{ isset(Auth::user()->avatar) && !empty(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('images/avatar2.jpg') }}"
                                    alt="image avatar" class="avatar">
                            </div>
                        </div>


                        <div class="modal-footer m-2" style="display: flex; justify-content: center">
                            <button type="submit" class="btn btn-primary w-md">Xác
                                nhận</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    document.getElementById('avatar').addEventListener('change', function(event) {
                    const input = event.target;
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        document.getElementById('profileImageavatar').src = e.target.result;
                    };

                    if (input.files && input.files[0]) {
                        reader.readAsDataURL(input.files[0]);
                    }
                });
</script>

<style>
     .form-label {
        font-weight: 500;
    }

</style>
