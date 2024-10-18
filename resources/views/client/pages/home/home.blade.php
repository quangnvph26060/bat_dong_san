@extends('client.layouts.master')

@section('content')
    <div class="container-web">
        <div class="show-pagehome">
            <!--<h2 class="pagehome-title"></h2>-->
            <div class="pagehome-details entry-content">
                <div id="pl-29" class="panel-layout">
                    @include('client.pages.home.breadcrumbs.banner')

                    @include('client.pages.home.breadcrumbs.session-01')

                    @include('client.pages.home.breadcrumbs.session-02')

                    @include('client.pages.home.breadcrumbs.session-03')

                    @include('client.pages.home.breadcrumbs.session-04')

                    @include('client.pages.home.breadcrumbs.session-05')

                    @include('client.pages.home.breadcrumbs.session-08')

                    @include('client.pages.home.breadcrumbs.session-09')

                    @include('client.pages.home.breadcrumbs.session-10')

                    @include('client.pages.home.breadcrumbs.session-11')

                    @include('client.pages.home.breadcrumbs.session-12')

                    @include('client.pages.home.breadcrumbs.session-13')

                    @include('client.pages.home.breadcrumbs.session-14')
                </div>
            </div>
        </div>
    </div>
    <div class="shownews-home">
        <div class="wrap-shownewshome container-web">
            <h2 class="shownewshome-title"><span>Tin tức dự án</span></h2>
            <div class="shownewshome-details owl-carouselnewshome owl-carousel owl-theme">


                @foreach ($news as $item)
                    <div class="item">
                        <article class="newshomebox">
                            <div class="newshomebox-inner">
                                <div class="newshomebox-thumb">
                                    <a
                                        href="{{$item->slug}}"><img
                                            width="300" height="168"
                                            src="{{showImageStorage($item->image)}}"
                                            class="attachment-medium size-medium wp-post-image" alt=""
                                            loading="lazy" /></a>
                                </div>
                                <div class="newshomeboxinfo">
                                    <h3 class="newshomeboxinfo-name">
                                        <a
                                            href="{{$item->slug}}">{{$item->title}}</a>
                                    </h3>
                                    <div class="newshomeboxinfo-desc">
                                        <p>
                                            {!! \Str::words(strip_tags($item->content), 45, '...') !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="shownewshome-more">
                <a href="https://tapdoanhungthinhcorp.com.vn/tin-tuc/">Xem thêm ►</a>
            </div>
        </div>
    </div>
@endsection
