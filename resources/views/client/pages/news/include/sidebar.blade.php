<aside id="sidebar">
    <div id="black-studio-tinymce-2" class="widget widget_black_studio_tinymce">
        <h3 class="widget-title">Đăng ký tải báo giá</h3>
        <div class="textwidget">
            <p></p>
            <div role="form" class="wpcf7" id="wpcf7-f30-o6" lang="vi" dir="ltr">
                <div class="screen-reader-response">
                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                    <ul></ul>
                </div>
                <form action="" method="post" id="myForm">
                    <p>
                        <label>
                            <span class="wpcf7-form-control-wrap name">
                                <input type="text" name="name" value="" size="40"
                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                    aria-required="true" aria-invalid="false" placeholder="Họ tên*" />
                                <small></small>
                            </span>
                        </label>
                        <br />
                        <label>
                            <span class="wpcf7-form-control-wrap your-email">
                                <input type="email" name="email" value="" size="40"
                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                    aria-required="true" aria-invalid="false" placeholder="Email*" />
                                <small></small>
                            </span>
                        </label>
                        <br />
                        <label>
                            <span class="wpcf7-form-control-wrap your-tel">
                                <input type="tel" name="phone" value="" size="40"
                                    class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                    aria-required="true" aria-invalid="false" placeholder="ví dụ: 012.3456.789" />
                                <small></small>
                            </span>
                        </label>
                        <br />
                        <input type="submit" value="ĐĂNG KÝ NGAY" class="wpcf7-form-control wpcf7-submit" />
                    </p>
                </form>
            </div>
            <p></p>
        </div>
    </div>
    <div id="category-posts-2" class="widget cat-post-widget">
        <h3 class="widget-title">Tin tức dự án</h3>
        <ul id="category-posts-2-internal" class="category-posts-internal">

            @foreach ($news as $item)
                <li class="cat-post-item">
                    <div>
                        <a class="cat-post-thumbnail cat-post-none" href="{{ $item->slug }}"
                            title="Pháp lý vững chắc – Yếu tố hút khách của Hanoi Melody Residences"><span
                                class="cat-post-crop cat-post-format cat-post-format-standard"><img width="90"
                                    height="90" src="{{ showImageStorage($item->image) }}"
                                    class="attachment-150x150x1x151x151 size-150x150x1x151x151 wp-post-image"
                                    alt="" loading="lazy" data-cat-posts-width="90"
                                    data-cat-posts-height="90" /></span></a><a class="cat-post-title"
                            href="{{ $item->slug }}" rel="bookmark"> {!! \Str::words(strip_tags($item->content), 10, '...') !!}</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</aside>

@push('scripts')
    <script>
        $(document).ready(function() {

            function resetForm(){

                $('input').removeClass("is-invalid").siblings("small").removeClass(
                    "text-danger").text('');

                $("#myForm").trigger("reset");
            }

            $("#myForm").on("submit", function(e) {
                e.preventDefault();


                $.ajax({
                    url: "{{ route('subscribe') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: $('input[name=name]').val(),
                        email: $('input[name=email]').val(),
                        phone: $('input[name=phone]').val(),
                    },
                    success: function(response) {
                        if (response.status) {
                            $('input').removeClass("is-invalid").siblings("small").removeClass(
                                "text-danger").text('');

                            showToast('success', response.message);
                        } else {
                            $('input').removeClass("is-invalid").siblings("small").removeClass(
                                "text-danger").text('');

                            $.each(response.errors ?? {}, function(key, value) {
                                console.log(key, value);

                                $(`input[name=${key}]`).addClass("is-invalid").siblings(
                                        'small')
                                    .addClass(
                                        "text-danger").text(value);
                            })
                            showToast('error', response.message);
                        }
                        resetForm();
                    }
                })
            })
        })
    </script>
@endpush

@push('scripts')
    <style>
        .text-danger {
            color: red !important;
        }
    </style>
@endpush
