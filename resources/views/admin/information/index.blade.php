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
                                <label for="" class="form-label">Seo title</label>
                                <input type="text" class="form-control" value="{{ $config->seo_title }}" name="seo_title"
                                    id="seo_title" placeholder="Seo title...">
                                <small></small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Seo description</label>
                                <input type="text" class="form-control" value="{{ $config->seo_description }}"
                                    name="seo_description" id="seo_description" placeholder="Seo description...">
                                <small></small>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="" class="form-label">Seo keyword</label>
                                <input id="seo_keyword" class="form-control"
                                    value="{{ old('seo_keyword', $config->seo_keyword) }}" name="seo_keyword"
                                    type="text">
                                <small></small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Logo</label>
                                <img class="img-fluid img-thumbnail" id="show_logo" style="height: 100px; cursor: pointer"
                                    src="{{ showImageStorage($config->logo) }}" alt=""
                                    onclick="document.getElementById('logo').click();">
                                <input type="file" name="logo" id="logo" class="form-control file-input"
                                    accept="image/*" onchange="previewImage(event, 'show_logo')">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="" class="form-label">Icon</label>
                                <img class="img-fluid img-thumbnail" id="show_icon"
                                    style="height: 100px; cursor: pointer" src="{{ showImageStorage($config->icon) }}"
                                    alt="" onclick="document.getElementById('icon').click();">
                                <input type="file" name="icon" id="icon" class="form-control file-input"
                                    accept="image/*" onchange="previewImage(event, 'show_icon')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection


@push('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "{{ config('app.url') }}"+"/admin/config" ,
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

            $('#seo_keyword').selectize({
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                },
                plugins: ['remove_button'],
                onKeyDown: function(e) {
                    if (e.key === ' ') {
                        e.preventDefault();
                        var value = this.$control_input.val().trim();
                        if (value) {
                            this.addItem(value);
                            this.$control_input.val('');
                        }
                    }
                }
            });
        });
    </script>
@endpush

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        rel="stylesheet">
@endpush
