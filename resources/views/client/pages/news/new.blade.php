@extends('client/layouts/master')

@section('content')
    <div id="contents">
        <section class="shownews">
            <p id="breadcrumbs">
                <span><span><a href="{{ route('home') }}">Trang chủ</a>
                        »
                        <span class="breadcrumb_last" aria-current="page">Tin tức dự án</span></span></span>
            </p>
            <h1 class="shownews-title"><span>Tin tức dự án</span></h1>

            <div class="wrap-shownews">
                @foreach ($news as $item)
                    <div class="newsbox">
                        <a href="{{ showImageStorage($item->image) }}"><img width="150" height="150"
                                src="{{ showImageStorage($item->image) }}"
                                class="attachment-thumbnail size-thumbnail wp-post-image" alt=""
                                loading="lazy" /></a>
                        <p class="newsbox-name">
                            <a href="{{ $item->slug }}">{{ $item->title }}</a>
                        </p>
                        <p class="newsbox-time">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
                        <div class="newsbox-desc">
                            <p>
                                {!! \Str::words(strip_tags($item->content), 45, '...') !!}
                            </p>
                        </div>
                    </div>
                @endforeach

                {{ $news->links('vendor.pagination.custom') }}
            </div>
        </section>
    </div>
    @include('client.pages.news.include.sidebar')
@endsection
