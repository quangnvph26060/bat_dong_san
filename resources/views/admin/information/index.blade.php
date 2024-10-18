@extends('admin.layout.master')

@section('content')
    <form action="" id="myForm" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Thông Tin Công Ty</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Tên công ty</label>
                                <input type="text" class="form-control" value="{{ $config->company_name }}"
                                    name="company_name" id="company_name" placeholder="Tên công ty...">
                                <small></small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Phong ban</label>
                                <input type="text" class="form-control" name="departments"
                                    value="{{ $config->departments }}" id="departments" placeholder="Tên phòng ban">
                                <small></small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $config->email }}"
                                    id="email" placeholder="Địa chỉ email...">
                                <small></small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" value="{{ $config->address }}" name="address"
                                    id="address" placeholder="Địa chỉ...">
                                <small></small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" value="{{ $config->hotline }}" name="hotline"
                                    id="hotline" placeholder="Số điện thoại...">
                                <small></small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Footer chân trang</label>
                                <input type="text" class="form-control" value="{{ $config->footer }}" name="footer"
                                    id="footer" placeholder="Chân trang...">
                                <small></small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Logo</label>
                                <img class="img-fluid img-thumbnail" id="show_logo"
                                    style="height: 100px; cursor: pointer"
                                    src="{{ showImageStorage($config->logo) }}" alt=""
                                    onclick="document.getElementById('logo').click();">
                                <input type="file" name="logo" id="logo" class="form-control file-input"
                                    accept="image/*" onchange="previewImage(event, 'show_logo')">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Icon</label>
                                <img class="img-fluid img-thumbnail" id="show_icon"
                                style="height: 100px; cursor: pointer"
                                src="{{ showImageStorage($config->icon) }}" alt=""
                                onclick="document.getElementById('icon').click();">
                            <input type="file" name="icon" id="icon" class="form-control file-input"
                                accept="image/*" onchange="previewImage(event, 'show_icon')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Cấu hình banner</h5>
                    </div>
                    <div class="card-body">
                        <img class="img-fluid img-thumbnail" id="image-container"
                            style="width: 1011px; height: 506px; cursor: pointer"
                            src="{{ showImageStorage($config->banner) }}" alt=""
                            onclick="document.getElementById('banner').click();">
                        <input type="file" name="banner" id="banner" class="form-control file-input" accept="image/*"
                            onchange="previewImage(event, 'image-container')">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('admin.setting.config.store') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Xóa bỏ class lỗi cũ và các thông báo lỗi trước đó
                        $('input, textarea').removeClass("is-invalid").siblings("small")
                            .removeClass("text-danger").text('');

                        if (response.status) {
                            showToast('success', response.message);
                        } else {
                            showToast('error', response.message);
                            $.each(response.errors, function(key, value) {

                                if (key.includes('.')) {
                                    var parts = key.split('.');
                                    var fieldName = parts[0];
                                    var index = parts[1];

                                    $(`#${fieldName}_${index}`).addClass("is-invalid");
                                } else {
                                    // Nếu trường là ảnh
                                    if (key === 'banner') {
                                        $(`#${key}`).siblings('img').addClass(
                                            'border-danger');
                                    } else {
                                        $(`input[name=${key}]`).addClass("is-invalid")
                                            .siblings("small")
                                            .addClass("text-danger").text(value);
                                    }
                                }
                            });

                            response.message && showToast('error', response.message);
                        }
                    }
                });

            });
        });
    </script>
@endpush
