<div id="pg-29-14" class="panel-grid panel-has-style">
    <div class="siteorigin-panels-stretch panel-row-style panel-row-style-for-29-14" data-stretch-type="full"
        style="
            margin-left: -174.6px;
            margin-right: -174.4px;
            padding-left: 174.6px;
            padding-right: 174.4px;
            border-left: 0px;
            border-right: 0px;
            ">
        <div id="pgc-29-14-0" class="panel-grid-cell">
            <div id="panel-29-14-0-0" class="so-panel widget widget_sow-headline panel-first-child" data-index="47">
                <div class="so-widget-sow-headline so-widget-sow-headline-default-b844f3af56bf-29">
                    <div class="sow-headline-container">
                        <h2 class="sow-headline">{{ $session_09->title_s8 }}</h2>
                    </div>
                </div>
            </div>
            <div id="panel-29-14-0-1" class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce"
                data-index="48">
                <div class="textwidget">
                    <p style="text-align: center">
                        {{ $session_09->content_s8 }}
                    </p>
                </div>
            </div>

            @foreach ($session_09->images_s8 as $image_s8)
                <div id="panel-29-14-0-2" class="so-panel widget widget_sow-image" data-index="49">
                    <div class="popupms panel-widget-style panel-widget-style-for-29-14-0-2">
                        <div class="so-widget-sow-image so-widget-sow-image-default-ab294a5857f7-29">
                            <div class="sow-image-container">
                                <img src="{{showImageStorage($image_s8)}}"
                                    width="2560" height="1280" title="quan ly" alt="{{$image_s8 }}"
                                    loading="lazy" class="so-widget-image" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div id="panel-29-14-0-4" class="so-panel widget widget_sow-image panel-last-child" data-index="51">
                <div class="popupms panel-widget-style panel-widget-style-for-29-14-0-4">
                    <div class="so-widget-sow-image so-widget-sow-image-default-ab294a5857f7-29">
                        <div class="sow-image-container">
                            <img src="{{ showImageStorage($session_05->small_banner_s4) }}" width="1670"
                                height="136" alt="{{ $session_05->title_s4 }}" loading="lazy"
                                class="so-widget-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
