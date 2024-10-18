<form action="" id="addBuildingForm" enctype="multipart/form-data">
    <div class="row">
        <!-- Tiêu đề -->
        <div class="form-group col-md-9">
            <label for="" class="form-label">Tiêu đề</label>
            <input type="text" name="title" id="title_s7" class="form-control" value="{{ $title->title_s7 }}">
        </div>

        <!-- Thứ tự -->
        <div class="form-group col-md-3">
            <label for="" class="form-label">Thứ tự</label>
            <input type="text" name="displayed_location" id="displayed_location" class="form-control"
                value="{{ $title->displayed_location }}" placeholder="Thứ tự hiển thị">
        </div>

        <!-- Nút thêm tòa -->
        <div class="form-group col-md-12">
            <button type="button" id="addBuildingBtn" class="btn btn-primary">Thêm tòa</button>
        </div>

        <!-- Container cho các tòa -->
        <div id="buildingsContainer">
            @foreach ($title->toas as $toa)
                <div class="building-item mb-3">
                    <label>Tên tòa:</label>
                    <input type="text" class="form-control" value="{{ $toa->building_name }}">

                    <!-- Hiển thị hình ảnh -->
                    @if ($toa->images->isNotEmpty())
                        <div class="row mt-2">
                            @foreach ($toa->images as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="building image"
                                        class="img-thumbnail">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal-footer m-2" style="display: flex; justify-content: center">
        <button type="submit" class="btn btn-primary w-md">Xác nhận</button>
    </div>
</form>
