<div id="pg-29-4" class="panel-grid panel-has-style">
    <div class="siteorigin-panels-stretch panel-row-style panel-row-style-for-29-4" data-stretch-type="full"
        style="
        margin-left: -174.6px;
        margin-right: -174.4px;
        padding-left: 174.6px;
        padding-right: 174.4px;
        border-left: 0px;
        border-right: 0px;
        ">
        <div id="pgc-29-4-0" class="panel-grid-cell">
            <div id="panel-29-4-0-0" class="so-panel widget widget_sow-headline panel-first-child" data-index="11">
                <div class="so-widget-sow-headline so-widget-sow-headline-default-b844f3af56bf-29">
                    <div class="sow-headline-container">
                        <h2 class="sow-headline">
                            {!! $session_04->title_s3 !!}
                        </h2>
                    </div>
                </div>
            </div>
            <div id="panel-29-4-0-1" class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce"
                data-index="12">
                <div class="textwidget">
                    <div dir="auto" style="text-align: center">
                        {{ $session_04->text_s3 }}
                    </div>
                    <div dir="auto" style="text-align: justify"></div>
                </div>
            </div>
            <div id="panel-29-4-0-2"
                class="so-panel widget widget_black-studio-tinymce widget_black_studio_tinymce panel-last-child"
                data-index="13">
                <div class="textwidget">

                    @foreach ($session_04->image_s3 as $key => $item)
                        <article class="imageshoverbox imageshoverbox-4">
                            <div class="imageshoverbox-details">
                                <p></p>
                                <p>
                                    <img class="alignnone size-medium wp-image-321"
                                        src="{{showImageStorage($session_04->image_s3[$key])}}"
                                        alt="" width="300" height="168" />
                                </p>
                                <p></p>
                            </div>
                        </article>
                        <p></p>
                        <p></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
