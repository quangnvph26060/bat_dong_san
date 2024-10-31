@extends('client.layouts.master')

@section('titlee', $newDetail->title)

@section('title', $newDetail->seo_title ?? $newDetail->title)

@section('keywords', $newDetail->keywords)

@section('description', $newDetail->seo_description)


@section('content')
    <div id="contents">
        <section class="showsingle-details">
            <p id="breadcrumbs"><span><span><a href="{{ route('home') }}">Trang chủ</a> » <span><a
                                href="{{ route('news') }}">Tin tức dự án</a> » <span
                                class="breadcrumb_last" aria-current="page">Pháp lý vững chắc – Yếu tố hút khách của Hanoi
                                Melody Residences</span></span></span></span></p>
            <h1 class="showsingle-title">{{ $newDetail->title }}</h1>
            <p class="news-time">{{ \Carbon\Carbon::parse($newDetail->created_at)->format('d/m/Y') }}</p>
            <div class="entry-content">
                {!! $newDetail->content !!}
            </div>
            <div role="form" class="wpcf7" id="wpcf7-f31-p334-o6" lang="vi" dir="ltr">
                <div class="screen-reader-response">
                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                    <ul></ul>
                </div>
                <form action="" method="post" id="myForm">
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="31">
                        <input type="hidden" name="_wpcf7_version" value="5.4.2">
                        <input type="hidden" name="_wpcf7_locale" value="vi">
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f31-p334-o6">
                        <input type="hidden" name="_wpcf7_container_post" value="334">
                        <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                    </div>
                    <div class="proinfosent">
                        <div class="formcontact">
                            <div class="formcontact-left">
                                <span class="wpcf7-form-control-wrap your-name">
                                    <input type="text" name="name" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                        aria-required="true" aria-invalid="false" placeholder="Họ tên*" />
                                </span><br>
                                <span class="wpcf7-form-control-wrap your-tel">
                                    <input type="tel" name="phone" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                        aria-required="true" aria-invalid="false" placeholder="ví dụ: 012.3456.789" />
                                </span><br>
                                <span class="wpcf7-form-control-wrap your-email">
                                    <input type="email" name="email" value="" size="40"
                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                        aria-required="true" aria-invalid="false" placeholder="Email*" />
                                </span>
                            </div>
                            <div class="formcontact-right">
                                <h3 class="formcontact-title">Đăng Ký Nhận Tư Vấn</h3>
                                <p><span class="wpcf7-form-control-wrap your-mes">
                                        <textarea name="your-mes" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"
                                            placeholder="Vấn đề quan tâm!"></textarea>
                                    </span><br>
                                    <input type="submit" value="ĐĂNG KÝ NGAY" class="wpcf7-form-control wpcf7-submit" />
                                </p>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="wpcf7-pum"
                        value="{&quot;closepopup&quot;:false,&quot;closedelay&quot;:0,&quot;openpopup&quot;:false,&quot;openpopup_id&quot;:0}">
                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                </form>
            </div>
            <div class="share-post-bottom">

                <div class="addthis_native_toolbox"></div>
            </div>
            <div class="relatedpost shownews">

                <h3 class="shownews-title"><span>BÀI VIẾT LIÊN QUAN</span></h3>
                <div class="wrap-shownews">
                    @foreach ($news->take(5) as $item)
                        <div class="newsbox">
                            <a href="{{ $item->slug }}"><img width="150" height="150"
                                    src="{{ showImageStorage($item->image) }}"
                                    class="attachment-thumbnail size-thumbnail wp-post-image" alt=""
                                    loading="lazy"></a>
                            <p class="newsbox-name"><a href="{{ $item->slug }}">Hà
                                    {{ $item->title }}</a></p>
                            <p class="newsbox-time">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
                            <div class="newsbox-desc">
                                <p>
                                    {!! \Str::words(strip_tags($item->content), 45, '...') !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    @include('client.pages.news.include.sidebar')
@endsection
