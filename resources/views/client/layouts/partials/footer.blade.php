<div class="top-footer">
    <div class="wrap-tfooter container-web">
        <div class="tfooter-details">
            <div class="tfooterbox" id="lienhe">
                <div id="black-studio-tinymce-3" class="tfooter-widget widget_black_studio_tinymce">
                    <h3 class="tfooter-title">
                       {{ $config->company_name }}
                    </h3>
                    <div class="textwidget">
                        <p>
                            <strong>{{ $config->departments }}</strong>
                        </p>
                        <p>
                            <strong>{{ $config->address }}</strong>
                        </p>
                        <p>Hotline: {{ $config->hotline }}</p>
                        <p>Email: {{ $config->email }}</p>
                        <p>Website: www.tapdoanhungthinhcorp.com.vn</p>
                    </div>
                </div>
            </div>
            <div class="tfooterbox">
                <div id="black-studio-tinymce-4" class="tfooter-widget widget_black_studio_tinymce">
                    <div class="textwidget">
                        <p>
                            <em>* Nhập chính xác thông tin, địa chỉ Email để chúng tôi
                                có thể gửi toàn bộ tài liệu cho Quý Khách. Xin cám
                                ơn!</em>
                        </p>
                        <p>&nbsp;</p>
                        <p></p>
                        <div role="form" class="wpcf7" id="wpcf7-f30-o8" lang="vi" dir="ltr">
                            <div class="screen-reader-response">
                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                <ul></ul>
                            </div>
                            <form action="" method="post" id="myForm">

                                <p>
                                    <label><span class="wpcf7-form-control-wrap your-name">
                                        <input type="text" name="name" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                        aria-required="true" aria-invalid="false" placeholder="Họ tên*" />
                                            </span> </label><br />
                                    <label><span class="wpcf7-form-control-wrap your-email">
                                        <input type="email" name="email" value="" size="40"
                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                    aria-required="true" aria-invalid="false" placeholder="Email*" />
                                            </span>
                                    </label><br />
                                    <label><span class="wpcf7-form-control-wrap your-tel">
                                        <input type="tel" name="phone" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                        aria-required="true" aria-invalid="false" placeholder="ví dụ: 012.3456.789" />
                                            </span> </label><br />
                                </p>
                                <input type="submit" value="ĐĂNG KÝ NGAY" class="wpcf7-form-control wpcf7-submit" />
                                <div class="wpcf7-response-output" aria-hidden="true"></div>
                            </form>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bottom-footer">
    <div class="wrap-bfooter container-web">
        <div class="copyright">
            <p>
                {{ $config->footer }}
                <a href="https://www.mathsoftvn.com" target="_blank">Mathsoft Việt Nam</a>
            </p>
        </div>
    </div>
</div>
