<div id="pg-29-1" class="panel-grid panel-has-style">
    <div class="siteorigin-panels-stretch panel-row-style panel-row-style-for-29-1" data-stretch-type="full"
        style="
            margin-left: -174.6px;
            margin-right: -174.4px;
            padding-left: 174.6px;
            padding-right: 174.4px;
            border-left: 0px;
            border-right: 0px;
            ">
        <div id="pgc-29-1-0" class="panel-grid-cell">
            <div id="panel-29-1-0-0" class="so-panel widget widget_sow-headline panel-first-child" data-index="1">
                <div class="so-widget-sow-headline so-widget-sow-headline-default-b844f3af56bf-29">
                    <div class="sow-headline-container">
                        <h2 class="sow-headline">
                            {!! $config->main_title !!}
                        </h2>
                    </div>
                </div>
            </div>
            <div id="panel-29-1-0-1" class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce"
                data-index="2">
                <div class="textwidget">
                    <p style="text-align: center">
                        {{ $config->short_content }}
                    </p>
                </div>
            </div>
            <div id="panel-29-1-0-2" class="so-panel widget widget_sow-image" data-index="3">
                <div class="nhanbanggia panel-widget-style panel-widget-style-for-29-1-0-2 pum-trigger"
                    style="cursor: pointer">
                    <div class="so-widget-sow-image so-widget-sow-image-default-ab294a5857f7-29">
                        <div class="sow-image-container">
                            <img src="{{ showImageStorage($config->image_container) }}" width="2560" height="1828"
                                title="E Flyer_ban nhe" alt="Chung cư Hưng Thịnh Linh Đàm" loading="lazy"
                                class="so-widget-image" />
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel-29-1-0-3" class="so-panel widget widget_siteorigin-panels-builder panel-last-child"
                data-index="4">
                <div id="pl-w64abc0f954fbd" class="panel-layout">
                    <div id="pg-w64abc0f954fbd-0" class="panel-grid panel-no-style">
                        @foreach ($config->image_thumbnail as $key => $item)
                            <div id="pgc-w64abc0f954fbd-0-0" class="panel-grid-cell">
                                <div id="panel-w64abc0f954fbd-0-0-0"
                                    class="so-panel widget widget_sow-image panel-first-child" data-index="0">
                                    <div class="so-widget-sow-image so-widget-sow-image-default-6b88c04c1f9b">
                                        <div class="sow-image-container">
                                            <img src="{{ showImageStorage($item) }}"
                                                width="768" height="432" alt="Chung cư Hưng Thịnh Linh Đàm"
                                                loading="lazy" class="so-widget-image" />
                                        </div>
                                    </div>
                                </div>
                                <div id="panel-w64abc0f954fbd-0-0-1"
                                    class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce panel-last-child"
                                    data-index="1">
                                    <div class="textwidget">
                                        <p style="text-align: center">
                                            <strong><span style="font-size: 13pt">{{ $config->title[$key] }}</span></strong>
                                        </p>
                                        <p style="text-align: center">
                                            <span style="font-size: 11pt">
                                                {{ $config->content[$key] }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
