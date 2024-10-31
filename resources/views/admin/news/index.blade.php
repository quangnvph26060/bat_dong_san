@extends('admin.layout.master')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <div class="page-inner">
        <div class="page-header">
            <!-- Breadcrumbs here -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Danh sách tin tức</h4>
                        <a class="btn btn-primary" href="{{ route('admin.news.create') }}">Thêm bài viết</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="dataTables_length" id="basic-datatables_length">

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12" id="product-table">
                                        <table id="basic-datatables"
                                            class="display table table-striped table-hover dataTable" role="grid"
                                            aria-describedby="basic-datatables_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>Tiêu đề</th>
                                                    <th>Tags</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($news as $item)
                                                    <tr role="row" class="odd">
                                                        <td class="ellipsis"><a href="{{ route('admin.news.edit', $item) }}">{{ $item->title }}</a></td>
                                                        <td>
                                                            @php
                                                                $tags = explode(',', $item->keywords);

                                                                foreach ($tags as $tag) {
                                                                    echo '<span class="badge badge-primary me-2">' .
                                                                        $tag .
                                                                        '</span>';
                                                                }
                                                            @endphp
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y \a\t h:i a') }}
                                                        </td>
                                                        <td>
                                                           {!! $item->status ? '<span class="badge badge-success">Phát hành</span>' : '<span class="badge badge-danger">Ngưng phát hành</span>' !!}
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" onclick="return confirm('Xóa bài viết này?')" class="btn btn-danger btn-sm">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
{{$news->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .ellipsis {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 300px
            }

                /* .radio-container {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            } */
            .toggle {
                position: relative;
                display: inline-block;
                width: 52px;
                height: 29px;
            }

            .toggle input {
                display: none;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: .4s;
                border-radius: 34px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 20px;
                width: 20px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                transition: .4s;
                border-radius: 50%;
            }

            input.status-change:checked+.slider {
                background-color: #4CAF50;
            }

            input.status-change:checked+.slider:before {
                transform: translateX(24px);
            }

            .label {
                margin-left: 20px;
                font-size: 18px;
                font-weight: bold;
            }

            .status-input {
                margin-bottom: 20px;
            }

            .status-input label {
                font-weight: bold;
                margin-right: 10px;
            }

            .radio-group {
                display: flex;
                align-items: center;
            }

            .radio-group input[type="radio"] {
                margin-right: 5px;
                accent-color: #007bff;
                /* Màu xanh cho Hoạt động */
            }

            .radio-group label {
                margin-right: 20px;
                font-size: 16px;
            }
        </style>
    @endpush



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if (session('success'))
        <script>
            $(document).ready(function() {
                $.notify({
                    icon: 'icon-bell',
                    title: 'Tin tức',
                    message: '{{ session('success') }}',
                }, {
                    type: 'secondary',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    time: 1000,
                });
            });
        </script>
    @endif
@endsection
