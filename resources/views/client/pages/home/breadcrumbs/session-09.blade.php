<div id="pg-29-9" class="panel-grid panel-has-style">
    <div class="siteorigin-panels-stretch panel-row-style panel-row-style-for-29-9" data-stretch-type="full"
        style="
            margin-left: -174.6px;
            margin-right: -174.4px;
            padding-left: 174.6px;
            padding-right: 174.4px;
            border-left: 0px;
            border-right: 0px;
            ">
        <div id="pgc-29-9-0" class="panel-grid-cell">
            <div id="panel-29-9-0-0" class="so-panel widget widget_sow-headline panel-first-child" data-index="23">
                <div class="so-widget-sow-headline so-widget-sow-headline-default-b844f3af56bf-29">
                    <div class="sow-headline-container">
                        <h2 class="sow-headline">
                            {{ $session_07->title_s6 }}
                        </h2>
                    </div>
                </div>
            </div>
            <div id="panel-29-9-0-1" class="so-panel widget widget_siteorigin-panels-builder" data-index="24">
                <div id="pl-w62cd9c4c09ba3" class="panel-layout">
                    <div id="pg-w62cd9c4c09ba3-0" class="panel-grid panel-no-style">
                        <div id="pgc-w62cd9c4c09ba3-0-0" class="panel-grid-cell">
                            <div id="panel-w62cd9c4c09ba3-0-0-0"
                                class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce panel-first-child"
                                data-index="0">
                                <div class="textwidget">
                                    {!! $session_07->text_s6 !!}
                                </div>
                            </div>
                            {{-- <div id="panel-w62cd9c4c09ba3-0-0-1"
                                class="so-panel widget widget_sow-button panel-last-child"
                                data-index="1">
                                <div class="taidanhmuc panel-widget-style panel-widget-style-for-w62cd9c4c09ba3-0-0-1 pum-trigger"
                                    style="cursor: pointer">
                                    <div
                                        class="so-widget-sow-button so-widget-sow-button-flat-6d08785a903a">
                                        <div class="ow-button-base ow-button-align-center">
                                            <a href="#"
                                                class="popupms ow-icon-placement-left ow-button-hover">
                                                <span>
                                                    TẢI DANH MỤC NỘI THẤT BÀN GIAO CHI
                                                    TIẾT
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div id="pgc-w62cd9c4c09ba3-0-1" class="panel-grid-cell">
                            <div id="panel-w62cd9c4c09ba3-0-1-0"
                                class="so-panel widget widget_sow-slider panel-first-child panel-last-child"
                                data-index="2">
                                <div class="so-widget-sow-slider so-widget-sow-slider-default-53fd0f98de19">
                                    <div class="sow-slider-base" style="">
                                        <ul class="sow-slider-images"
                                            data-settings='{"pagination":true,"speed":800,"timeout":8000,"paused":false,"pause_on_hover":false,"swipe":true,"nav_always_show_desktop":"","nav_always_show_mobile":"","breakpoint":"780px"}'
                                            style="position: relative">
                                            @foreach ($session_07->slider_s6 as $slider)
                                                <li class="sow-slider-image sow-slider-image-cover cycle-slide cycle-sentinel"
                                                    style="
                                                background-image: url('{{ showImageStorage($slider) }}');
                                                position: static;
                                                top: 0px;
                                                left: 0px;
                                                z-index: 100;
                                                opacity: 1;
                                                display: block;
                                                visibility: hidden;
                                                height: 369px;
                                                ">
                                                </li>
                                            @endforeach

                                        </ul>
                                        <ol class="sow-slider-pagination" style="display: none">



                                            @foreach ($session_07->slider_s6 as $item)
                                                <li class="{{ $loop->first ? 'sow-active' : '' }}">
                                                    <a href="#" data-goto="1" aria-label="display slide 2"></a>
                                                </li>
                                            @endforeach

                                        </ol>

                                        <div class="sow-slide-nav sow-slide-nav-next" style="display: none">
                                            <a href="#" data-goto="next" aria-label="next slide"
                                                data-action="next">
                                                <i class="fas fa-chevron-right" style="color: #ffffff"></i>
                                            </a>
                                        </div>

                                        <div class="sow-slide-nav sow-slide-nav-prev" style="display: none">
                                            <a href="#" data-goto="previous" aria-label="previous slide"
                                                data-action="prev">
                                                <i class="fas fa-chevron-left" style="color: #ffffff"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel-29-9-0-2"
                class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce panel-last-child"
                data-index="25">
                <div class="textwidget">



                    @foreach ($session_07->images_s6 ?? [] as $image)
                        <article class="imageshoverbox imageshoverbox-3">
                            <div class="imageshoverbox-details">
                                <p></p>
                                <p>
                                    <a href="{{ showImageStorage($image) }}" class="imageshoverbox-image"
                                        data-slb-active="1" data-slb-asset="1222102049" data-slb-internal="0"
                                        data-slb-group="slb"><img class="aligncenter size-full wp-image-58"
                                            src="{{ showImageStorage($image) }}"
                                            alt="" width="768" height="512" /></a>
                                </p>
                                <p></p>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
