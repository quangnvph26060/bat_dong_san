@extends('admin.layout.master')

@section('content')
    <div class="card">
        <div class="card-header"></div>
        <h4 class="card-title">Danh sách yêu cầu</h4>
    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($emails as $key => $email)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $email->name ?? 'Không có tên' }}</td>
                        <td>{{ $email->email }}</td>
                        <td>{{ $email->phone }}</td>
                        <td>
                            <div class="radio-container">
                                <label class="toggle">
                                    <input type="checkbox" class="status-change" data-id="{{ $email->id }}"
                                        @disabled($email->status) @checked($email->status)>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('change', '.status-change', function() {
            const id = $(this).data('id');
            let checkbox = $(this);
            let isChecked = checkbox.is(':checked');
            let newStatus = isChecked ? 1 : 0;

            Swal.fire({
                title: 'Xác nhận',
                text: newStatus == 1 ? "Bạn có chắc chắn muốn ẩn bình luận?" :
                    "Bạn có chắc chắn muốn hiện bình luận?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, cập nhật!',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.email.change.status', ':id') }}'.replace(':id', id),
                        type: 'GET',
                        success: function(response) {
                            if (response.status) {
                                showToast('success', response.message);
                                // Thêm thuộc tính disabled vào checkbox
                                checkbox.prop('disabled', true);
                            } else {
                                showToast('error', response.message);
                            }
                        },
                        error: function() {
                            Swal.fire('Lỗi!', 'Có lỗi xảy ra. Vui lòng thử lại.', 'error');
                        }
                    });
                } else {
                    checkbox.prop('checked', !isChecked);
                }
            });
        });
    </script>
@endpush

@push('styles')
    <style>
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
