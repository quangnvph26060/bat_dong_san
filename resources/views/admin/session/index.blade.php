@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="btn-group">
                <a href="#tab-banner" class="btn btn-primary border" aria-current="page">Banner</a>
                <a href="#tab-1" class="btn btn-primary border active" aria-current="page">01</a>
                <a href="#tab-2" class="btn btn-primary border">02</a>
                <a href="#tab-3" class="btn btn-primary border">03</a>
                <a href="#tab-4" class="btn btn-primary border">04</a>
                <a href="#tab-5" class="btn btn-primary border">05</a>
                <a href="#tab-6" class="btn btn-primary border">06</a>
                <a href="#tab-7" class="btn btn-primary border">07</a>
                <a href="#tab-8" class="btn btn-primary border">08</a>
                <a href="#tab-9" class="btn btn-primary border">09</a>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="" method="post" id="myForm" enctype="multipart/form-data">

                <div id="tab-banner">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình banner</h5>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid img-thumbnail" id="image-container"
                                style="width: 100%; height: 506px; cursor: pointer"
                                src="{{ showImageStorage($config->banner) }}" alt=""
                                onclick="document.getElementById('banner').click();">
                            <input type="file" name="banner" id="banner" class="form-control file-input"
                                accept="image/*" onchange="previewImage(event, 'image-container')">
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-banner')">Lưu</button>
                </div>

                <div id="tab-1">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 1</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for=" " class="form-label">Tiêu đề</label>
                                {{-- <input type="text" name="main_title" id="main_title" value="{{ $config->main_title }}"
                                    class="form-control" placeholder="Nhập tiêu đề"> --}}
                                <textarea name="main_title" id="main_title" cols="30" rows="10" class="summernote">{!! $config->main_title !!}</textarea>
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
                            <div class="row">

                                <div class="form-group col-12">
                                    <label for=" " class="form-label">Tiêu đề</label>
                                    {{-- <input type="text" name="main_title" id="main_title_session2"
                                        value="{{ $session_02->main_title }}" class="form-control"
                                        placeholder="Nhập tiêu đề"> --}}

                                    <textarea name="main_title" id="main_title" cols="30" rows="10" class="summernote">{!! $session_02->main_title !!}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label for=" " class="form-label">Tiêu đề phụ</label>
                                    <input type="text" name="extra_title" id="extra_title_session2"
                                        value="{{ $session_02->extra_title }}" class="form-control"
                                        placeholder="Nhập tiêu đề">
                                </div>

                                <div class="form-group col-12">
                                    <label for="" class="form-label">Nội dung</label>
                                    <textarea class="summernote" name="text" data-editor-name="session_01" id="session_01">{!! $session_02->text !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5>Main Image</h5>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid img-thumbnail" id="main_image_session2"
                                style="width:100%; cursor: pointer;"
                                src="{{ showImageStorage($session_02->main_image) }}" alt=""
                                onclick="document.getElementById('image_container_session2').click();">

                            <input type="file" class="form-control file-input" name="main_image"
                                id="image_container_session2" accept="image/*"
                                onchange="previewImage(event, 'main_image_session2')">

                            <!-- Nút Xóa ảnh -->
                            <button type="button" class="btn btn-danger mt-2"
                                onclick="removeImages('main_image_session2', 'image_container_session2')">
                                Xóa ảnh
                            </button>
                        </div>

                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-2')">Lưu</button>
                </div>

                <div id="tab-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 3</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="" class="form-label">Tiêu đề</label>
                                    {{-- <input type="text" name="title_s2" class="form-control"
                                        value="{{ $session_03->title_s2 }}"> --}}
                                    <textarea name="title_s2" id="title_s2" cols="30" rows="10" class="summernote">{!! $session_03->title_s2 !!}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="" class="form-label">Link video</label>
                                    <input type="text" name="link_video" class="form-control"
                                        value="{{ $session_03->link_video }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="" class="form-label">Nội dung</label>
                                    <textarea class="summernote" name="text_s2" data-editor-name="session_02" id="session_02"> {!! $session_03->text_s2 !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-3')">Lưu</button>
                </div>

                <div id="tab-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 4</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="" class="form-label">Tiêu đề</label>

                                    <textarea name="title_s3" id="title_s3" cols="30" rows="10" class="summernote">{!! $session_04->title_s3 !!}</textarea>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="" class="form-label">Nội dung</label>
                                    <input type="text" name="text_s3" class="form-control"
                                        value="{{ $session_04->text_s3 }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="" class="form-label">Ảnh</label>
                                    <div class="row">
                                        @for ($i = 0; $i < 4; $i++)
                                            <div class="col-md-3">
                                                <img id="image_s3_{{ $i }}" class="img-fluid mb-2"
                                                    src="{{ showImageStorage($session_04->image_s3[$i]) }}"
                                                    style="height: 168px" alt="" style="cursor: pointer"
                                                    onclick="document.getElementById('images_s3_{{ $i }}').click();">

                                                <input type="file" id="images_s3_{{ $i }}"
                                                    name="image_s3[{{ $i }}]" class="file-input d-none"
                                                    onchange="previewImage(event, 'image_s3_{{ $i }}')" />
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-4')">Lưu</button>
                </div>

                <div id="tab-5">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5>Cấu hình Session 5</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="" class="form-label">Banner Small</label>
                                        <img id="show_small_banner_s4" class="img-fluid mb-2"
                                            src="{{ showImageStorage($session_05->small_banner_s4) }}" alt=""
                                            style="cursor: pointer; width:100%; height: 136px"
                                            onclick="document.getElementById('small_banner_s4').click();">

                                        <input type="file" id="small_banner_s4" name="small_banner_s4"
                                            class="file-input d-none"
                                            onchange="previewImage(event, 'show_small_banner_s4')" />
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="" class="form-label">Nội dung</label>
                                        <textarea class="summernote" name="text_s4" data-editor-name="session_05" id="session_05">{!! $session_05->text_s4 !!}</textarea>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="" class="form-label">Image</label>
                                        <img id="show_image_s4" class="img-fluid mb-2"
                                            src="{{ showImageStorage($session_05->image_4) }}" alt=""
                                            style="cursor: pointer; width:100%; height: 457px"
                                            onclick="document.getElementById('image_4').click();">

                                        <input type="file" id="image_4" name="image_4" class="file-input d-none"
                                            onchange="previewImage(event, 'show_image_s4')" />
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="" class="form-label">Banner</label>
                                        <img id="show_banner_s4" class="img-fluid mb-2"
                                            src="{{ showImageStorage($session_05->banner_s4) }}" alt=""
                                            style="cursor: pointer; width:100%; height: 457px"
                                            onclick="document.getElementById('banner_s4').click();">

                                        <input type="file" id="banner_s4" name="banner_s4" class="file-input d-none"
                                            onchange="previewImage(event, 'show_banner_s4')" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-5')">Lưu</button>
                </div>

                <div id="tab-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 6</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="" class="form-label">Tiêu đề </label>

                                    <textarea name="main_title_s5" id="main_title_s5" cols="30" rows="10" class="summernote">{!! $session_06->main_title_s5 !!}</textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="" class="form-label">Nội dung</label>
                                    <input type="text" name="extra_title_s5" id=""
                                        placeholder="Nhập nội dung" class="form-control"
                                        value="{{ $session_06->extra_title_s5 }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="form-label">Extra Image</label>
                                    <img id="show_extra_image_s5" class="img-fluid mb-2"
                                        src="{{ showImageStorage($session_06->extra_image_s5) }}" alt=""
                                        style="cursor: pointer; width:100%; height: 321px"
                                        onclick="document.getElementById('extra_image_s5').click();">

                                    <input type="file" id="extra_image_s5" name="extra_image_s5"
                                        class="file-input d-none" onchange="previewImage(event, 'show_extra_image_s5')" />
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="form-label">Text</label>
                                    <textarea class="summernote" name="text_s5" data-editor-name="session_07" id="session_07">
                                        {!! $session_06->text_s5 !!}
                                    </textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label for="" class="form-label">Main Image</label>
                                    <img id="show_main_image_s5" class="img-fluid mb-2"
                                        src="{{ showImageStorage($session_06->main_image_s5) }}" alt=""
                                        style="cursor: pointer; width:100%; height: 585px"
                                        onclick="document.getElementById('main_image_s5').click();">

                                    <input type="file" id="main_image_s5" name="main_image_s5"
                                        class="file-input d-none" onchange="previewImage(event, 'show_main_image_s5')" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-6')">Lưu</button>
                </div>

                <div id="tab-7">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 7</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for=" " class="form-label">Tiêu đề</label>


                                    <textarea name="title_s6" id="title_s6" cols="30" rows="10" class="summernote">{!! $session_07->title_s6 !!}</textarea>

                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nội dung</label>
                                        <textarea class="summernote" name="text_s6" data-editor-name="session_08" id="session_08">
                                            {!! $session_07->text_s6 !!}
                                        </textarea>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <label for="" class="form-label">Slider</label>
                                    <div class="row">
                                        @for ($i = 0; $i < 6; $i++)
                                            <div class="col-2">
                                                <img class="img-fluid" id="show_slider_s6_{{ $i }}"
                                                    style="width:100&; height: 150px; cursor: pointer;"
                                                    src="{{ showImageStorage($session_07->slider_s6[$i]) }}"
                                                    alt=""
                                                    onclick="document.getElementById('slider_s6_{{ $i }}').click();">
                                                <input type="file" class="form-control file-input"
                                                    name="slider_s6[{{ $i }}]"
                                                    id="slider_s6_{{ $i }}" accept="image/*"
                                                    onchange="previewImage(event, 'show_slider_s6_{{ $i }}')">
                                            </div>
                                        @endfor
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="" class="form-label">Images</label>
                                    <div class="row">
                                        @for ($j = 0; $j < 6; $j++)
                                            <div class="col-4">
                                                <img class="img-fluid mb-4" id="show_images_s6_{{ $j }}"
                                                    style="width:100%; height: 240px; cursor: pointer;"
                                                    src="{{ showImageStorage($session_07->images_s6[$j] ?? '') }}"
                                                    alt=""
                                                    onclick="document.getElementById('images_s6_{{ $j }}').click();">
                                                <input type="file" class="form-control file-input"
                                                    name="images_s6[{{ $j }}]"
                                                    id="images_s6_{{ $j }}" accept="image/*"
                                                    onchange="previewImage(event, 'show_images_s6_{{ $j }}')">
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-7')">Lưu</button>
                </div>

                <div id="tab-8">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <h5>Cấu hình Session 8</h5>
                            <button type="button" class="btn btn-primary btnAddTitle" data-bs-toggle="modal"
                                data-bs-target="#viewProfile">
                                Thêm mới
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover table-sm text-center">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Tòa</th>
                                        {{-- <th>Thứ tự hiện thị</th> --}}
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody id="appendedTable">
                                    @foreach ($session_08 as $key => $value)
                                        <tr id="row_{{ $value->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->title_s7 }}</td>
                                            <td>{{ implode(' | ', $value->toas->pluck('building_name')->toArray()) }}</td>
                                            {{-- <td>{{ is_null($value->displayed_location) ? 'Không xác định' : $value->displayed_location }} --}}
                                            </td>
                                            <td>

                                                <a href="{{ route('admin.setting.config.session.edit', $value->id) }}" class="btn btn-warning"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                                <button type="button" class="btn btn-danger btn-delete"
                                                    data-id="{{ $value->id }}"
                                                    onclick="deleteConfirmation({{ $value->id }})"><i
                                                        class="fa-solid fa-trash"></i></button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>



                <div id="tab-9">
                    <div class="card">
                        <div class="card-header">
                            <h5>Cấu hình Session 9</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="" class="form-label">Tiêu đề</label>


                                    <textarea name="title_s8" id="title_s8" cols="30" rows="10" class="summernote">{!! $session_09->title_s8 !!}</textarea>

                                </div>
                                <div class="col-12 form-group">
                                    <label for="" class="form-label">Nội dung</label>
                                    <input type="text" name="content_s8" id=""
                                        value="{{ $session_09->content_s8 }}" class="form-control">
                                </div>
                                <div class="col-12 form-group">

                                    <label for="" class="form-label">Ảnh</label>

                                    <div class="row">
                                        @for ($k = 0; $k < 2; $k++)
                                            <div class="col-md-6">
                                                <img class="img-fluid" id="show_images_{{ $k }}"
                                                    style="width: 100%; height: 250px; cursor: pointer;"
                                                    src="{{ showImageStorage($session_09->images_s8[$k]) }}"
                                                    alt=""
                                                    onclick="$('#images_s8_{{ $k }}').click();">
                                                <input type="file" class="form-control file-input"
                                                    name="images_s8[{{ $k }}]"
                                                    id="images_s8_{{ $k }}" accept="image/*"
                                                    onchange="previewImage(event, 'show_images_{{ $k }}')">
                                            </div>
                                        @endfor


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitTab('tab-9')">Lưu</button>
                </div>
            </form>
        </div>
    </div>

    {{-- modal --}}
    <!-- Modal for building form -->
    <div class="modal fade" id="viewProfile" tabindex="-1" aria-labelledby="viewProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewProfileLabel">Thông tin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="" id="addBuildingForm" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Tiêu đề -->
                            <div class="form-group col-md-9">
                                <label for="" class="form-label">Tiêu đề</label>
                                <input type="text" name="title" id="title_s7" class="form-control">
                            </div>

                            <!-- Thứ tự -->
                            <div class="form-group col-md-3">
                                <label for="" class="form-label">Thứ tự</label>
                                <input type="text" name="displayed_location" id="displayed_location"
                                    class="form-control" placeholder="Thứ tự hiển thị">
                            </div>

                            <!-- Nút thêm tòa -->
                            <div class="form-group col-md-12">
                                <button type="button" id="addBuildingBtn" class="btn btn-primary">Thêm tòa</button>
                            </div>

                            <!-- Container cho các tòa -->
                            <div id="buildingsContainer">
                                <!-- Các tòa sẽ được thêm vào đây -->
                            </div>
                        </div>
                        <div class="modal-footer m-2" style="display: flex; justify-content: center">
                            <button type="submit" class="btn btn-primary w-md">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/summernote-bs4.min.js') }}"></script>
    <script>
        function initSummernote(selector, height) {
            $(selector).summernote({
                height: height, // Thiết lập chiều cao
                toolbar: [
                    ['fontname', ['fontname']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['view', ['codeview']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['help', ['help']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['history', ['undo', 'redo']],
                ]
            });
        }

        initSummernote('#main_title', 100);

        $('.summernote').summernote({
            height: 200, // Thiết lập chiều cao
            toolbar: [
                ['fontname', ['fontname']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['view', ['codeview']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['help', ['help']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['history', ['undo', 'redo']],
            ]
        });

        $(document).ready(function() {
            // Khởi tạo CKEditor cho tất cả các textarea
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

                // Lưu tab hiện tại vào localStorage
                localStorage.setItem('activeTab', targetTab);
            });

            // Khôi phục tab hiện tại từ localStorage
            const activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('.btn-group a').removeClass('active');
                $(`.btn-group a[href="${activeTab}"]`).addClass('active');
                $('[id^="tab-"]').hide();
                $(activeTab).show();
            } else {
                // Hiển thị tab đầu tiên nếu không có tab nào được lưu
                $('[id^="tab-"]').hide();
                $('#tab-1').show();
            }

            // Hàm để gửi dữ liệu từ tab
            window.submitTab = function(tabId) {
                // Cập nhật nội dung từ CKEditor
                $('textarea.ckeditor').each(function() {
                    const editorId = this.id;
                    if (CKEDITOR.instances[editorId]) {
                        CKEDITOR.instances[editorId].updateElement();
                    }
                });

                var formData = new FormData();

                // Thu thập dữ liệu từ các trường trong tab
                $('#' + tabId).find('input, textarea').each(function() {
                    if ($(this).attr('name')) {
                        // Nếu trường là input file, thêm file vào formData
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
                    url: "{{ config('app.url') }}/admin/session",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Xử lý phản hồi từ server
                        if (response.status) {
                            $('input, textarea').removeClass("is-invalid").siblings("small")
                                .removeClass("text-danger").text('');
                            showToast('success', response.message);
                        } else {
                            // Xóa class lỗi cũ và thông báo lỗi
                            $('input, textarea').removeClass("is-invalid").siblings("small")
                                .removeClass("text-danger").text('');
                            $.each(response.errors, function(key, value) {
                                $(`input[name="${key}"]`).addClass('is-invalid').siblings(
                                    'small').addClass('text-danger').text(value);
                            });
                            showToast('error', response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        showToast('error', 'Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            };


            $('#addBuildingForm').on('submit', function(event) {
                event.preventDefault();

                const id = $('#addBuildingForm').data('id');

                const action = id ? "{{ route('admin.setting.config.session.update', ':id') }}".replace(
                    ':id', id) : "{{ route('admin.setting.config.session.save') }}";

                let formData = new FormData(this);

                formData.append('type', 'tab-8');

                formData.append('deleted_images', JSON.stringify(deletedImages));

                $.ajax({
                    url: action, // Đường dẫn xử lý form
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            showToast('success', 'Cập nhật thành công');
                            $('#viewProfile').modal('hide');
                        } else {
                            showToast('error', response.message);
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });


            window.deleteConfirmation = function(id) {

                Swal.fire({
                    title: 'Bạn có chắc muốn xóa?',
                    text: "Bạn sẽ không thể hoàn tác sau khi đã xóa!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Huỷ'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.setting.config.session.delete') }}",
                            method: 'POST',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                if (response.status) {
                                    $('#row_' + id).remove();
                                    showToast('success', response.message);
                                } else {
                                    showToast('error', response.message);
                                }
                            }
                        })
                    }
                })
            }

            let buildingIndex = 0;
            let deletedImages = [];

            // Function to add a new building
            function addBuilding() {
                let buildingTemplate = `
                        <div class="card mb-3 position-relative" id="building_${buildingIndex}">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Button to remove building -->
                                    <div class="form-group col-md-12">

                                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: -18px; right: -3px; border-radius: 5px;" onclick="removeBuilding(${buildingIndex})">X</button>

                                    </div>

                                    <!-- Building Name -->
                                    <div class="col-12 form-group">
                                        <label for="" class="form-label">Tên tòa</label>
                                        <input type="text" name="buildings[${buildingIndex}][name]" class="form-control">
                                    </div>

                                    <!-- Button to add image -->
                                    <div class="form-group col-md-12">
                                        <button type="button" class="btn btn-primary btn-sm addImageBtn" data-building-index="${buildingIndex}">Thêm ảnh</button>
                                    </div>

                                    <!-- Image container -->
                                    <div class="row" id="building_${buildingIndex}_images">
                                        <div class="form-group col-md-4 position-relative">
                                            <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: 9px; right: 15px; border-radius: 5px;" onclick="removeImage(${buildingIndex}, 0)">X</button>
                                            <img class="img-fluid" id="show_building_image_${buildingIndex}_0" style="height: 150px; width: 100%; cursor: pointer;" src="{{ showImageStorage('') }}" alt="Chọn ảnh" onclick="$('#building_image_${buildingIndex}_0').click();">
                                            <input type="file" class="form-control file-input" name="buildings[${buildingIndex}][images][0]" id="building_image_${buildingIndex}_0" accept="image/*" onchange="previewImage(event, 'show_building_image_${buildingIndex}_0')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                $('#buildingsContainer').append(buildingTemplate);
                buildingIndex++;
            }

            // Function to add an image for a building
            function addImage(buildingIndex) {
                let imageContainer = $(`#building_${buildingIndex}_images`);
                let imageCount = imageContainer.find('.form-group').length;

                let newImageTemplate = `
                    <div class="form-group col-md-4 position-relative">
                        <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: 9px; right: 15px; border-radius: 5px;" onclick="removeImage(${buildingIndex}, ${imageCount})">X</button>
                        <img class="img-fluid" id="show_building_image_${buildingIndex}_${imageCount}" style="height: 150px; width: 100%; cursor: pointer;" src="{{ showImageStorage(null) }}" alt="Chọn ảnh" onclick="$('#building_image_${buildingIndex}_${imageCount}').click();">
                        <input type="file" class="form-control file-input" name="buildings[${buildingIndex}][images][${imageCount}]" id="building_image_${buildingIndex}_${imageCount}" accept="image/*" onchange="previewImage(event, 'show_building_image_${buildingIndex}_${imageCount}')">
                    </div>
                `;
                imageContainer.append(newImageTemplate);
            }

            // Function to remove a building
            window.removeBuilding = function(buildingIndex) {
                $(`#building_${buildingIndex}`).remove();
            }

            // Function to remove an image
            window.removeImage = function(buildingIndex, imageIndex, imageId = null) {
                if (imageId) {
                    // Thêm ID của ảnh bị xóa vào mảng deletedImages
                    deletedImages.push(imageId);
                }
                // Xóa ảnh trên frontend
                $(`#show_building_image_${buildingIndex}_${imageIndex}`).closest('.form-group').remove();
            };


            // Initialize with one building and one image when the page is loaded
            addBuilding();

            // Add a new building when the "Add Building" button is clicked
            $('#addBuildingBtn').on('click', function() {
                addBuilding();
            });

            // Add an image when the "Add Image" button is clicked for the respective building
            $(document).on('click', '.addImageBtn', function() {
                let buildingIndex = $(this).data('building-index');
                addImage(buildingIndex);
            });

            // Handle the 'Thêm mới' button click event
            $(document).on('click', '.btnAddTitle', function() {
                // Clear all input fields in the modal
                $('#title_s7').val(''); // Clear title
                $('#displayed_location').val(''); // Clear location

                // Clear the buildings container
                $('#buildingsContainer').empty();

                // Reset the form's data-id attribute
                $('#addBuildingForm').removeAttr('data-id');

                // Change the modal title to 'Thêm mới'
                $('.modal-title').text('Thêm mới');

                $('#addBuildingForm').removeAttr('data-id');
            });


        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/summernote-bs4.min.css') }}">
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
