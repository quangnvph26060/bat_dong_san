<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>

<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
<script src="{{ asset('assets/js/kaiadmin.js') }}"></script>
<script src="{{ asset('assets/js/setting-demo.js') }}"></script>
<script src="{{ asset('assets/js/setting-demo2.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["{{ asset('assets/css/fonts.min.css') }}"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
</script>

<script>
    $(document).ready(function() {

        window.previewImage = function(event, imgId) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                const imgElement = document.getElementById(imgId);
                imgElement.src = reader.result; // Cập nhật nguồn cho ảnh
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }

        window.removeImages = function(imgId, inputId) {
            const imgElement = document.getElementById(imgId);
            const inputElement = document.getElementById(inputId);

            // Đặt src của ảnh thành trống hoặc ảnh mặc định
            imgElement.src = '';

            // Đặt giá trị của input là null
            inputElement.value = null;

            // Thêm một hidden input để báo cho server biết là ảnh cần xóa
            const removeImageFlag = document.createElement('input');
            removeImageFlag.type = 'hidden';
            removeImageFlag.name = `${inputId}_remove`;
            removeImageFlag.value = true;

            inputElement.parentNode.appendChild(removeImageFlag);
        }


        window.showToast = function(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
                customClass: {
                    container: "custom-toast",
                },
            });
            Toast.fire({
                icon: icon,
                title: title,
            });
        }

        @if (session('successlogin'))
            $.notify({
                icon: 'icon-bell',
                title: 'Đăng nhập',
                message: '{{ session('successlogin') }}',
            }, {
                type: 'secondary',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        @endif

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    });
</script>

@stack('scripts')
