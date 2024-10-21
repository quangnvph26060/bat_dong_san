<style>
    .nav-collapse {
        margin-bottom: 0px;
    }

    @media (min-width: 768px) {
        .nav-toggle {
            display: none !important;
        }

        .image-container {
            display: flex;
            justify-content: center;

        }
    }
</style>
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header image-container" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo ">
                <img src="{{ showImageStorage($config->logo) }}" alt="navbar brand" class="navbar-brand image"
                    height="50" />
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
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                <li class="nav-item active">
                    <a href="{{ route('admin.dashboard') }}" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>

                    </a>
                </li>

                <li class="nav-item">
                    <a  href="{{ route('admin.setting.config.session') }}">
                        <i class="fas fa-users"></i>
                        <p>Cấu hình trang chủ</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#cauhinh">
                        <i class="fas fa-users"></i>
                        <p>Cấu hình</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="cauhinh">
                        <ul class="nav nav-collapse" style="margin-bottom: 0px">
                            <li>
                                <a href="{{ route('admin.setting.config.info') }}">
                                    <span class="sub-item">Thông tin</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.setting.config.email') }}">
                                    <span class="sub-item">Email</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#news">
                        <i class="far fa-newspaper"></i>
                        <p>Tin tức</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="news">
                        <ul class="nav nav-collapse" style="margin-bottom: 0px">
                            <li>
                                <a href="{{ route('admin.news.index') }}">
                                    <span class="sub-item">Tất cả bài viết</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.news.create') }}">
                                    <span class="sub-item">Thêm mới tin tức</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.email.index') }}">
                        <i class="far fa-envelope"></i>
                        <p>Yêu cầu gửi mail</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
