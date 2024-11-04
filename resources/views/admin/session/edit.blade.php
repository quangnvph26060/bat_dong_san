@extends('admin.layout.master')

@section('title', 'Cập nhật')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form action="{{ route('admin.setting.config.session.update', $title->id) }}" id="addBuildingForm"
        enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Tiêu đề -->
            <div class="form-group col-md-9">
                <label for="" class="form-label">Tiêu đề</label>
                <input type="text" name="title" id="title_s7" class="form-control"
                    value="{{ old('title', $title->title_s7) }}">
            </div>

            <!-- Thứ tự -->
            <div class="form-group col-md-3">
                <label for="" class="form-label">Thứ tự</label>
                <input type="text" name="displayed_location" id="displayed_location" class="form-control"
                    placeholder="Thứ tự hiển thị" value="{{ old('displayed_location', $title->displayed_location) }}">
            </div>

            <!-- Nút thêm tòa -->
            <div class="form-group col-md-12">
                <button type="button" id="addBuildingBtn" class="btn btn-primary">Thêm tòa</button>
            </div>

            <!-- Container cho các tòa -->
            <div id="buildingsContainer">
                @foreach ($title->toas as $building)
                    <div class="card mb-3 position-relative" id="building_{{ $building->id }}" data-id="{{ $building->id }}">
                        <div class="card-body">
                            <div class="row">
                                <!-- Button to remove building -->
                                <div class="form-group col-md-12">

                                    <button  type="button" class="btn btn-danger btn-sm position-absolute"
                                        style="top: -18px; right: -3px; border-radius: 5px;"
                                        onclick="removeBuilding({{ $building->id }})">X</button>

                                </div>

                                <!-- Building Name -->
                                <div class="col-12 form-group">
                                    <label for="" class="form-label">Tên tòa</label>
                                    <input type="text" name="buildings[{{ $building->id }}][name]"
                                        value="{{ $building->building_name }}" class="form-control">
                                </div>

                                <!-- Button to add image -->
                                <div class="form-group col-md-12">
                                    <button type="button" class="btn btn-primary btn-sm addImageBtn"
                                        data-building-index="{{ $building->id }}">Thêm ảnh</button>
                                </div>

                                <!-- Image container -->
                                <div class="row" id="building_{{ $building->id }}_images">

                                    @foreach ($building->images as $image)
                                        <div class="form-group col-md-4 position-relative">
                                            <button type="button" class="btn btn-danger btn-sm position-absolute"
                                                style="top: 9px; right: 15px; border-radius: 5px;"
                                                onclick="removeImage({{ $building->id }}, {{ $image->id }})">X</button>
                                            <img class="img-fluid"
                                                id="show_building_image_{{ $building->id }}_{{ $image->id }}"
                                                style="height: 150px; width: 100%; cursor: pointer;"
                                                src="{{ showImageStorage($image->image) }}" alt="Chọn ảnh"
                                                onclick="$('#building_image_{{ $building->id }}_{{ $image->id }}').click();">
                                            <input type="file" class="form-control file-input"
                                                name="buildings[{{ $building->id }}][images][{{ $image->id }}]"
                                                id="building_image_{{ $building->id }}_{{ $image->id }}"
                                                accept="image/*"
                                                onchange="previewImage(event, 'show_building_image_{{ $building->id }}_{{ $image->id }}')">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <input type="hidden" name="deleted_images" id="deleted_images">
        <input type="hidden" name="deleted_buildings" id="deleted_buildings">

        <div class="modal-footer m-2" style="display: flex; justify-content: center">
            <button type="submit" class="btn btn-primary w-md" id="submitFormBtn">Xác nhận</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        let buildingIndex = $('#buildingsContainer .card').last().attr('id');
        buildingIndex = buildingIndex ? parseInt(buildingIndex.replace('building_', '')) + 1 : 0;

        let deletedImages = [];
        let deletedBuildings = [];

        function addBuilding() {
            let buildingTemplate = `
            <div class="card mb-3 position-relative" id="building_${buildingIndex}">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: -18px; right: -3px; border-radius: 5px;" onclick="removeBuilding(${buildingIndex})">X</button>
                        </div>
                        <div class="col-12 form-group">
                            <label for="" class="form-label">Tên tòa</label>
                            <input type="text" name="buildings[${buildingIndex}][name]" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-primary btn-sm addImageBtn" data-building-index="${buildingIndex}">Thêm ảnh</button>
                        </div>
                        <div class="row" id="building_${buildingIndex}_images"></div>
                    </div>
                </div>
            </div>
        `;
            $('#buildingsContainer').append(buildingTemplate);
            buildingIndex++;
        }

        function addImage(buildingIndex) {
            let imageContainer = $(`#building_${buildingIndex}_images`);
            let imageCount = imageContainer.find('.form-group').length;

            let newImageTemplate = `
            <div class="form-group col-md-4 position-relative">
                <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: 9px; right: 15px; border-radius: 5px;" onclick="removeImage(${buildingIndex}, ${imageCount})">X</button>
                <img class="img-fluid" id="show_building_image_${buildingIndex}_${imageCount}" style="height: 150px; width: 100%; cursor: pointer;" src="{{ showImageStorage(null) }}" alt="Chọn ảnh" onclick="$('#building_image_${buildingIndex}_${imageCount}').click();">
                <input type="file" class="form-control file-input" name="buildings[${buildingIndex}][images][${imageCount}]" id="building_image_${buildingIndex}_${imageCount}" accept="image/*" onchange="previewImage(event, 'show_building_image_${buildingIndex}_${imageCount}')">
            </div>
        `;
            imageContainer.append(newImageTemplate);
        }

        window.removeBuilding = function(buildingIndex) {

            if ($(`#building_${buildingIndex}`).data('id')) {

                deletedBuildings.push(buildingIndex);
                $('#deleted_buildings').val(JSON.stringify(deletedBuildings));
            }

            $(`#building_${buildingIndex}`).remove();
        };

        window.removeImage = function(buildingIndex, imageId) {
            // Thêm ID của ảnh vào mảng deletedImages
            deletedImages.push(imageId);

            // Cập nhật giá trị của input hidden deleted_images
            $('#deleted_images').val(JSON.stringify(deletedImages));

            // Xóa ảnh khỏi giao diện
            $(`#show_building_image_${buildingIndex}_${imageId}`).closest('.form-group').remove();
        };

        $('#addBuildingBtn').on('click', function() {
            addBuilding();
        });

        $(document).on('click', '.addImageBtn', function() {
            let buildingIndex = $(this).data('building-index');
            addImage(buildingIndex);
        });

        // Frontend validation for images
        $('#submitFormBtn').on('click', function(e) {
            let isValid = true;
            $('#buildingsContainer .card').each(function() {
                let buildingImages = $(this).find('.file-input').length;
                if (buildingImages === 0) {
                    alert('Mỗi tòa mới thêm cần phải có ít nhất 1 ảnh.');
                    isValid = false;
                    return false; // Exit loop
                }
            });

            if (!isValid) {
                e.preventDefault(); // Prevent form submission
            }
        });
    </script>
@endpush
