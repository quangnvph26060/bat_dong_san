@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="btn-group">
                <a href="#tab-1" class="btn btn-primary border active" aria-current="page">01</a>
                <a href="#tab-2" class="btn btn-primary border">02</a>
                <a href="#tab-3" class="btn btn-primary border">03</a>
                <a href="#tab-4" class="btn btn-primary border">04</a>
                <a href="#tab-5" class="btn btn-primary border">05</a>
                <a href="#tab-6" class="btn btn-primary border">06</a>
                <a href="#tab-7" class="btn btn-primary border">07</a>
                <a href="#tab-8" class="btn btn-primary border">08</a>
                <a href="#tab-9" class="btn btn-primary border">09</a>
                <a href="#tab-10" class="btn btn-primary border">10</a>
                <a href="#tab-11" class="btn btn-primary border">11</a>
                <a href="#tab-12" class="btn btn-primary border">12</a>
                <a href="#tab-13" class="btn btn-primary border">13</a>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="" method="post" id="myForm" enctype="multipart/form-data">

                <div id="tab-1">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 1</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for=" " class="form-label">Tiêu đề</label>
                                <input type="text" name="main_title" id="main_title" value="{{ $config->main_title }}"
                                    class="form-control" placeholder="Nhập tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Nội dung</label>
                                <input type="text" name="short_content" value="{{ $config->short_content }}"
                                    id="short_content" class="form-control" placeholder="Nhập nội dung">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Image main</label>
                                <img class="img-fluid img-thumbnail" id="imageMain"
                                    style="width:991px; height: 708px; cursor: pointer;"
                                    src="{{ showImageStorage($config->image_container) }}" alt=""
                                    onclick="document.getElementById('image_container').click();">
                                <input type="file" class="form-control file-input" name="image_container"
                                    id="image_container" accept="image/*" onchange="previewImage(event, 'imageMain')">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Image thumbnail</label>
                                <div class="row">
                                    @for ($i = 0; $i < 3; $i++)
                                        <div class="col-md-4">
                                            <img id="preview_image_thumbnail_{{ $i }}"
                                                class="img-fluid mb-2 img-thumbnail image-thumbnail"
                                                src="{{ showImageStorage($config->image_thumbnail[$i]) }}" alt=""
                                                style="cursor: pointer"
                                                onclick="document.getElementById('image_thumbnail_{{ $i }}').click();">

                                            <input type="file" id="image_thumbnail_{{ $i }}"
                                                name="image_thumbnail[{{ $i }}]" class="file-input d-none"
                                                onchange="previewImage(event, 'preview_image_thumbnail_{{ $i }}')" />

                                            <input type="text" id="title_{{ $i }}"
                                                value="{{ $config->title[$i] }}" placeholder="Tiêu đề"
                                                name="title[{{ $i }}]" class="form-control mb-2" />

                                            <textarea id="content_{{ $i }}" cols="30" rows="5" name="content[{{ $i }}]"
                                                placeholder="Nội dung" class="form-control">{{ $config->content[$i] }}</textarea>
                                        </div>
                                    @endfor

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-1')">Lưu</button>
                </div>

                <div id="tab-2">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 2</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">test</label>
                                <input type="text" name="test" value="123">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-2')">Lưu</button>
                </div>

                <div id="tab-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 3</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 4</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-5">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 5</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 6</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-7">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 7</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 8</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-9">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 9</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-10">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 10</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-11">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 11</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 12</h5>
                        </div>
                    </div>
                </div>

                <div id="tab-13">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 13</h5>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Bắt sự kiện khi nhấn vào tab
            $('.btn-group a').on('click', function(e) {
                e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

                // Xóa class active khỏi tất cả các tab
                $('.btn-group a').removeClass('active');

                // Thêm class active cho tab đã chọn
                $(this).addClass('active');

                // Ẩn tất cả các tab nội dung
                $('[id^="tab-"]').hide();

                // Hiện tab nội dung tương ứng với tab đã chọn
                const targetTab = $(this).attr('href');
                $(targetTab).show();
            });

            // Hiển thị tab đầu tiên khi tải trang
            $('[id^="tab-"]').hide(); // Ẩn tất cả các tab
            $('#tab-1').show(); // Hiện tab đầu tiên

            window.submitTab = function(tabId) {
                var formData = new FormData();

                $('#' + tabId).find('input, textarea').each(function() {
                    if ($(this).attr('name')) {
                        // Nếu trường là input file, thì thêm file
                        if ($(this).attr('type') === 'file') {
                            $.each(this.files, function(i, file) {
                                formData.append($(this).attr('name'), file);
                            }.bind(this)); // Bind this để sử dụng đúng context
                        } else {
                            // Thêm dữ liệu vào formData
                            formData.append($(this).attr('name'), $(this).val());
                        }
                    }
                });

                // Thêm một trường "type" để xác định tab nào đang được gửi
                formData.append('type', tabId);

                // Gửi dữ liệu qua Ajax
                $.ajax({
                    url: "{{ route('admin.setting.config.session.save') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            $('input, textarea').removeClass("is-invalid").siblings("small")
                                .removeClass("text-danger").text('');
                            showToast('success', response.message);
                        } else {
                            // Xóa class lỗi cũ và các này báo lỗi trước đó
                            $('input, textarea').removeClass("is-invalid").siblings("small")
                                .removeClass("text-danger").text('');

                            $.each(response.errors, function(key, value) {
                                $(`input[name="${key}"]`).addClass('is-invalid').siblings(
                                    'small').addClass('text-danger').text(value);
                            });
                            showToast('error', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }



        })
    </script>
@endpush

@push('styles')
    <style>
        .btn-group .btn.active {
            padding-left: 30px;
            /* Padding trái */
            padding-right: 30px;
            /* Padding phải */
        }

        .image-thumbnail {
            cursor: pointer;
            width: 100%;
            height: 171px;
            object-fit: cover;
        }
    </style>
@endpush
