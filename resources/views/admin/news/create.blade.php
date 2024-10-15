@extends('admin.layout.master')
@section('content')
    <div class="page-inner">
        <form action="" id="myForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thêm tin tức</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" placeholder="Nhập tiêu đề..." name="title" class="form-control"
                                    id="title">
                                <small id="error-title"></small>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Tiêu đề seo..." name="seo_title" class="form-control"
                                    id="seo_title">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                               <textarea name="seo_description" cols="30" rows="5" class="form-control" placeholder="Seo description"> </textarea>
                                <small id="error-seo_description"></small>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="content">Nội dung bài viết:</label><br>
                                <textarea name="content" class="form-control" id="content" rows="10" cols="80"></textarea>
                                <small id="error-content"></small>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-dark">Quay lại</a>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Đặt lịch</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Ngày đăng</label>
                                <input type="datetime-local" name="published_at" class="form-control" id="">
                                <small id="error-published_at"></small>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Từ khóa</h4>
                        </div>
                        <div class="card-body">
                            <input id="keywords" class="form-control " name="keywords" type="text">
                            <small id="error-keywords"></small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hình ảnh</h4>
                        </div>
                        <div class="card-body">
                            <img src="" alt="" id="image_main" class="img-fluid mb-3"
                                style="max-height: 200px; object-fit: cover;">
                            <a href="#" id="select_main_image" style="text-decoration: underline">Chọn ảnh tiêu
                                biểu</a>
                            <input type="file" name="image" id="image" class="form-control" style="display: none"> <br>
                            <small id="error-image"></small>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

    <script>
        $('#select_main_image').click(function(e) {
            e.preventDefault();
            $('#image').click();
        });

        $('#image').change(function() {
            const file = $(this)[0].files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#image_main').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });

        CKEDITOR.replace('content', {
            language: 'vi',
            height: 300,
            toolbar: [{
                    name: 'document',
                    items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
                },
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt']
                },
                {
                    name: 'forms',
                    items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button',
                        'ImageButton', 'HiddenField'
                    ]
                },
                '/',
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript', '-', 'Strike',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                        '-', 'BidiLtr', 'BidiRtl', 'Language'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                        'Iframe'
                    ]
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks', '-']
                },
                {
                    name: 'about',
                    items: ['About']
                }
            ],
            extraPlugins: 'font,colorbutton,justify',
            fontSize_sizes: '11px;12px;13px;14px;15px;16px;18px;20px;22px;24px;26px;28px;30px;32px;34px;36px',
        });

        document.getElementById('logo')?.addEventListener('change', function(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        });

        $(document).ready(function() {
            $('#keywords').selectize({
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
        })

        $('#myForm').submit(function(e) {
            e.preventDefault();

            CKEDITOR.instances.content.updateElement();

            let data = new FormData(this);

            $.ajax({
                url: "{{ route('admin.news.store') }}",
                method: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);


                    if (response.status) {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    } else {
                        $('input').removeClass("is-invalid").siblings("small").removeClass(
                            "text-danger").text('');

                        $.each(response.errors, function(key, value) {
                            // $(`input[name=${key}]`).addClass("is-invalid").siblings(`#error-${key}`)
                            //     .addClass(
                            //         "text-danger").text(value);
                            $(`#error-${key}`)
                                .addClass(
                                    "text-danger").text(value)
                        })
                        showToast('error', response.message);
                    }
                }
            });
        });
    </script>
@endpush

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .card-title {
            margin-bottom: 0 !important;
        }

        .icon-bell:before {
            content: "\f0f3";
            font-family: FontAwesome;
        }

        .form-group {
            margin-bottom: 0 !important;
        }

        .breadcrumbs {
            background: #fff;
            padding: 0.75rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .breadcrumbs a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumbs i {
            color: #6c757d;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control,
        .form-select {
            border-radius: 5px;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .add_product>div {
            margin-top: 20px;
        }

        .modal-footer {
            justify-content: center;
            border-top: none;
        }

        textarea.form-control {
            height: auto;
        }

        #description {
            border-radius: 5px;
        }

        .add_product>div {
            margin-top: 20px;
        }

        .tags-input .tag {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 0.5rem;
            border-radius: 3px;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            position: relative;
        }

        .tags-input .tag button {
            background: none;
            border: none;
            color: white;
            font-weight: bold;
            margin-left: 0.5rem;
            cursor: pointer;
            padding: 0;
        }

        .input-container input {
            width: 100%;
            padding: 0.5rem;
            margin-top: 1rem;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .cke_notifications_area {
            display: none;
        }
    </style>
@endpush
