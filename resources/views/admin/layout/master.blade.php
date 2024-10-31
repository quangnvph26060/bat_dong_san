<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{showImageStorage($config->icon)}}" type="image/x-icon">

    @include('admin.layout.partials.styles')
</head>
<style>
    .collapse {
        display: none;
    }

    .collapse.show {
        display: block;
    }
    .cke_notifications_area {
        display: none;
    }
</style>

<body>
    <div id="wrapper">
        @include('admin.layout.partials.sidebar')

        <div class="main-panel">

            @include('admin.layout.partials.header');

            <div class="container">
                <div class="page-inner">
                    {{-- <div class="page-header">
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="http://123.31.31.39:9000/admin/config">Cấu hình</a>
                            </li>
                        </ul>
                    </div> --}}
                    @yield('content')
                </div>
            </div>


            @include('admin.layout.partials.footer')

        </div>

    </div>

    @include('admin.layout.partials.scripts')
</body>

</html>
