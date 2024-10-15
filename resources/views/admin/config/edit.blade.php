@extends('admin.layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Cấu hình Email</h4>
        </div>
        <div class="card-body">
            <form action="" method="post" id="myForm">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $email }}">
                        <small></small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="form-label">Mật khẩu ứng dụng</label>
                        <input type="text" name="password" class="form-control" value="{{ $password }}">
                        <small></small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#myForm').on('submit', function(e) {
            e.preventDefault();



            let data = $(this).serialize();
            $.ajax({
                url: "{{ route('admin.setting.config.email.update') }}",
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.status) {
                        $('input').removeClass("is-invalid").siblings("small").removeClass(
                            "text-danger").text('');
                        showToast('success', response.message);
                    } else {

                        $('input').removeClass("is-invalid").siblings("small").removeClass(
                            "text-danger").text('');
                        $.each(response.errors, function(key, value) {
                            $(`input[name=${key}]`).addClass("is-invalid").siblings(
                                    'small')
                                .addClass(
                                    "text-danger").text(value);
                        })
                        showToast('error', response.message);
                    }
                }
            })
        })
    </script>
@endpush
