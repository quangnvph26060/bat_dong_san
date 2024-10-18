<div id="pg-29-11" class="panel-grid panel-has-style">
    <div class="siteorigin-panels-stretch panel-row-style panel-row-style-for-29-11" id="matbang"
        data-stretch-type="full"
        style="
        margin-left: -174.6px;
        margin-right: -174.4px;
        padding-left: 174.6px;
        padding-right: 174.4px;
        border-left: 0px;
        border-right: 0px;
        ">
        <div id="pgc-29-11-0" class="panel-grid-cell">
            @foreach ($session_08 as $s8)
                <div id="panel-29-11-0-0" class="so-panel widget widget_sow-headline panel-first-child" data-index="27">
                    <div class="so-widget-sow-headline so-widget-sow-headline-default-b844f3af56bf-29">
                        <div class="sow-headline-container">
                            <h2 class="sow-headline">
                                {{ $s8->title_s7 }}
                            </h2>
                        </div>
                    </div>
                </div>

                @foreach ($s8->toas as $toa)
                    <div id="panel-29-11-0-1" class="so-panel widget widget_sow-tabs" data-index="28">
                        <div class="so-widget-sow-tabs so-widget-sow-tabs-default-4cc93f78fb3f-29">
                            <div class="sow-tabs">
                                <div class="sow-tabs-tab-container" role="tablist">
                                    <div class="sow-tabs-tab sow-tabs-tab-selected" role="tab"
                                        data-anchor="t%c3%b2a-no2" aria-selected="true" tabindex="0">
                                        <div class="sow-tabs-title sow-tabs-title-icon-left">
                                           {{ $toa->building_name }}
                                        </div>
                                    </div>
                                </div>

                                <div class="sow-tabs-panel-container">
                                    <div class="sow-tabs-panel">
                                        <div class="sow-tabs-panel-content" role="tabpanel" tabindex="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($toa->images as $i)
                        <div id="panel-29-11-0-2" class="so-panel widget widget_sow-image" data-index="29">
                            <div class="popupms panel-widget-style panel-widget-style-for-29-11-0-2">
                                <div class="so-widget-sow-image so-widget-sow-image-default-ab294a5857f7-29">
                                    <div class="sow-image-container">
                                        <img src="{{ showImageStorage($i->image) }}"
                                            width="2560" height="1810" title="TANG 1_BLOCK NO2"
                                            alt="{{ $i->image }}" loading="lazy" class="so-widget-image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endforeach
        </div>
    </div>
</div>
