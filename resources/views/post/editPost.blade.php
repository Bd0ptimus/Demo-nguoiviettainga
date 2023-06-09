<!doctype html>
<html lang="vi">

@include('layouts.masterLayout')
@include('layouts.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="{{ asset('js/select2/select2.min.js') }}"></script>
<link href="{{ asset('css/select2/select2.min.css?v=') . time() }}" rel="stylesheet" />
@php
    use App\Admin;
@endphp
<link href="{{ asset('css/post/newPostCreate.css?v=') . time() }}" rel="stylesheet">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<body>
    <div class="project-content-section d-flex justify-content-center">
        <div class="row newPost-main d-flex justify-content-center">
            <div class="row newPost-header-sec" style="width: 100%; padding:20px 0px; position:relative;">
                <div style="height:100%; width:30px; position:absolute; top:0px; left:10px;" class="vertical-container">
                    <div style="height:30px; width:30px; border:0px; border-radius:50%; cursor:pointer;" class="vertical-element-middle-align" onclick="history.back()">
                        <i style="color:white; width:100%; height:100%; padding:12px 0px;" class="fa-solid fa-chevron-left fa-2xl"></i>
                    </div>
                </div>
                <h3 class="newPost-header newPost-text">
                    CHỈNH SỬA BÀI VIẾT
                </h3>
            </div>

            <div class="row d-flex justify-content-center" style="width: 100%; padding:15px 0px;">
                <div class="row" style="margin : 30px 0px;">
                    <form id="newPostForm" class="login100-form validate-form" name="login"
                        action="{{ route('post.editPost', ['postId' => $post->id]) }}"
                        method="post" enctype="multipart/form-data"> @csrf
                        <div class="row d-flex justify-content-center" style="width:100%; margin:auto;">
                            <div class="row d-flex justify-content-start">
                                <div class="filter-section">
                                    <h5 class="row">
                                        <span class="form-text">Đăng tin từ ngày đến ngày</span>
                                    </h5>
                                    <input type="text" class="data-field" name="daterange" id="editPostDateRangePicker"/>
                                </div>
                                {{-- {{dd(date('d/m/Y', strtotime($post->exist_from)).' - '.date('d/m/Y', strtotime($post->exist_to)))}}   value="{{date('d/m/Y', strtotime($post->exist_from))}} - {{date('d/m/Y', strtotime($post->exist_to))}}" --}}
                                <div class="filter-section">
                                    <h5 class="row">
                                        <span class="form-text">Thành phố </span>
                                    </h5>
                                    <select class="main-filter-classify classify-type-select" name="createPostCity"
                                        id="createPost-city-select">
                                        <option value="0">Tất cả</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" @if($post->city_id == $city->id) selected @endif>{{ $city->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if ($classify == REAL_ESTATE)
                                <div class="row d-flex justify-content-start" id="realEstate-form-sec">
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Giá (&#8381)</span>
                                        </h5>
                                        <input type="text" class="data-field" name="realEstatePrice"
                                            id="createPost-realEstate-price" value="{{isset($post->posts_classify->price)?$post->posts_classify->price:''}}"/>
                                    </div>
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Diện tích (&#13217)</span>
                                        </h5>
                                        <input type="text" class="data-field" name="realEstateSquare"
                                            id="createPost-realEstate-square"  value="{{isset($post->posts_classify->square)?$post->posts_classify->square:''}}"/>
                                    </div>
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Địa chỉ nhà đất</span>
                                        </h5>
                                        <input type="text" class="data-field" name="realEstateAddress"
                                            id="createPost-realEstate-address" value="{{isset($post->posts_classify->address)?$post->posts_classify->address:''}}"/>
                                    </div>
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Số phòng</span>
                                        </h5>
                                        <input type="text" class="data-field" name="realEstateNumberRoom"
                                            id="createPost-realEstate-numberRoom" value="{{isset($post->posts_classify->number_room)?$post->posts_classify->number_room:''}}"/>
                                    </div>
                                </div>
                            @endif

                            {{-- @if ($classify == SERVICE)
                                <div class="row d-flex justify-content-start" id="service-form-sec">
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Nội dung dịch vụ  <span class="text-danger">(*)</span></span>
                                        </h5>
                                        <input type="text" class="data-field" name="serviceContent"
                                            id="createPost-service-content" />
                                    </div>

                                </div>
                            @endif --}}




                            @if ($classify == GARMENT)
                                <div class="row d-flex justify-content-start" id="garment-form-sec">
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Thông tin</span>
                                        </h5>
                                        <input type="text" class="data-field" name="garmentInfo"
                                            id="createPost-garment-info" />
                                    </div>
                                </div>
                            @endif

                            @if ($classify == MOM_BABY)
                                <div class="row d-flex justify-content-start" id="momBaby-form-sec">
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Thông tin</span>
                                        </h5>
                                        <input type="text" class="data-field" name="momBabyInfo"
                                            id="createPost-momBaby-info" />
                                    </div>
                                </div>
                            @endif

                            @if ($classify == RESTAURANT)
                                <div class="row d-flex justify-content-start" id="restaurant-form-sec">
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Địa chỉ nhà hàng</span>
                                        </h5>
                                        <input type="text" class="data-field" name="restaurantAddress"
                                            id="createPost-restaurant-address" value="{{isset($post->posts_classify->restaurant_address)?$post->posts_classify->restaurant_address:''}}"/>
                                    </div>

                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Hoá đơn trung bình (&#8381)</span>
                                        </h5>
                                        <input type="number" class="data-field" name="restaurantAverageBill"
                                            id="createPost-restaurant-bill" value="{{isset($post->posts_classify->average_bill)?$post->posts_classify->average_bill:''}}"/>

                                    </div>
                                </div>
                            @endif

                            @if ($classify == AD)
                                <div class="row d-flex justify-content-start" id="ad-form-sec">
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Thông tin quảng cáo</span>
                                        </h5>
                                        <input type="text" class="data-field" name="adContent"
                                            id="createPost-ad-content" value="{{isset($post->posts_classify->adContent)?$post->posts_classify->adContent:''}}"/>
                                    </div>
                                </div>
                            @endif

                            <div class="row d-flex justify-content-start">
                                <div class="important-field">
                                    <h5 class="row">
                                        <span class="form-text">Tiêu đề<span class="text-danger">(*)</span></span>
                                    </h5>

                                    <input type="text" class="data-field" name="title" id="createPost-title" value="{{$post->title}}"/>
                                </div>

                                <div class="important-field">
                                    <h5 class="row">
                                        <span class="form-text">Mô tả<span class="text-danger">(*)</span></span>
                                    </h5>
                                    <textarea type="text" class="data-field" name="description" style="min-height: 150px;"
                                        id="createPost-description" >{{($post->description)}}</textarea>
                                </div>
                            </div>
                            @if ($classify == JOB)
                                <div class="row d-flex justify-content-start" id="job-form-sec">
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Nơi làm việc</span>
                                        </h5>
                                        <input type="text" class="data-field" name="jobAddress"
                                            id="createPost-job-city" value="{{isset($post->posts_classify->address_working)?$post->posts_classify->address_working:''}}"/>
                                    </div>

                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Lương (&#8381)</span>
                                        </h5>
                                        <input type="number" class="data-field" name="jobSalary"
                                            id="createPost-job-salary" value="{{isset($post->posts_classify->salary)?$post->posts_classify->salary:''}}"/>

                                    </div>
                                </div>
                            @endif


                            @if ($classify == CAR_TRADE)
                                <div class="row d-flex justify-content-start" id="carTrade-form-sec">
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Địa chỉ bán xe</span>
                                        </h5>
                                        <input type="text" class="data-field" name="carTradeAddress"
                                            id="createPost-carTrade-city" value="{{isset($post->posts_classify->address_trading)?$post->posts_classify->address_trading :''}}"/>
                                    </div>
                                </div>
                            @endif

                            <div class="row d-flex justify-content-start">
                                <div class="important-field">
                                    <h5 class="row">
                                        <span class="form-text">Hình ảnh</span>
                                    </h5>
                                    <div class="row">
                                        {{-- <div class="col-md-5">
                                            <div class="row form-text"><span>Logo/Ảnh đại diện</span></div>
                                            <div class="row d-flex justify-content-center">
                                                <div class="upload-btn-wrapper">
                                                    <button class="normal-button" disabled><i
                                                            class="fa-solid fa-upload"></i>
                                                        Upload Logo/ Ảnh đại diện</button>
                                                    <input type="file" name="logoUpload"
                                                        placeholder="Choose image" id="logoUpload"
                                                        class="normal-button" style="width:250px;">
                                                </div>
                                            </div>
                                            <div class="row d-flex justify-content-center">
                                                <span class="text-danger" id="logoUpload-warning"></span>
                                            </div>
                                            <div class="row d-flex justify-content-center"
                                                id="logoUpload-preview-sec">

                                            </div>
                                        </div> --}}

                                        <div class="col-md-7">
                                            <div class="row form-text"><span>Ảnh mô tả  @if($classify == RESTAURANT) <span class="text-danger">(*)</span> @endif</span></div>
                                            <div class="row d-flex justify-content-center">
                                                <div class="upload-btn-wrapper">
                                                    <button class="normal-button" disabled><i
                                                            class="fa-solid fa-upload"></i>
                                                        Upload ảnh mô tả</button>
                                                    {{-- <input type="file" wire:model="photoUpload" accept=".jpg, .jpeg, .png, .mov" />
                                                    <div wire:loading wire:target="photoUpload">
                                                        <!--Upload image loading screen-->
                                                        @include('layouts.loadingModalWithLivewire')
                                                    </div> --}}
                                                    <input type="file" multiple="multiple" name="desPhotoUpload[]"
                                                        placeholder="Choose image" id="desPhotoUpload"
                                                        class="normal-button" style="width:170px;">
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-content-center">
                                                <span class="text-danger" id="desPhotoUpload-warning"></span>
                                            </div>
                                            <div class="row d-flex justify-content-center"
                                                id="desPhotoUpload-preview-sec">
                                                @foreach($images as $key=>$image)
                                                    <div class="preview-image-sec" >
                                                        <img class="upload-image" src="{{$image}}" alt="logo upload">
                                                        <i class="previewImage-delete-icon fa-solid fa-square-xmark fa-xl" onclick="removePreviewImageInMultiple({{$key}}, 'desPhotoUpload-preview-sec', 'desPhotoUpload')"></i>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row d-flex justify-content-start">
                                <div class="filter-section">
                                    <h5 class="row">
                                        <span class="form-text">Tên người liên hệ</span>
                                    </h5>
                                    <input type="text" class="data-field" value="{{ $post->user->name }}"
                                        disabled />
                                </div>
                                <div class="filter-section">
                                    <h5 class="row">
                                        <span class="form-text">Email người liên hệ</span>
                                    </h5>
                                    <input type="text" class="data-field" value="{{ $post->user->email }}"
                                        disabled />
                                </div>

                                @if(isset($post->user->phone_number))
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Số điện thoại liên hệ 1</span>
                                        </h5>
                                        <input type="text" class="data-field"
                                            value="{{ $post->user->phone_number }}" disabled />
                                    </div>


                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Số điện thoại liên hệ 2</span>
                                        </h5>
                                        <input type="text" id="contactPhone" class="data-field" name="contactPhone"
                                            value="{{isset($post->contact_phone_number)?$post->contact_phone_number:''}}" style="margin:10px 0px; width:100%;" />
                                    </div>
                                @else
                                    <div class="filter-section">
                                        <h5 class="row">
                                            <span class="form-text">Số điện thoại liên hệ<span class="text-danger">(*)</span></span>
                                        </h5>
                                        <input type="text" id="contactPhone" class="data-field" name="contactPhone"
                                            style="margin:10px 0px; width:100%;" value="{{isset($post->contact_phone_number)?$post->contact_phone_number:''}}"/>
                                    </div>
                                @endif
                                <div class="filter-section">
                                    <h5 class="row">
                                        <span class="form-text">Địa chỉ người liên hệ</span>
                                    </h5>
                                    <input type="text" class="data-field" name="contactAddress" value="{{isset($post->contact_address)?$post->contact_address:''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3" id="createPost-warning-sec"
                            style="display:none;">
                            <div class="row warning-sec">
                                <ul id="createPost-warning">
                                    {{-- <li class="warning-text">abc</li>
                                    <li class="warning-text">dtdadw</li>
                                    <li class="warning-text">aweawd</li> --}}
                                </ul>
                            </div>

                        </div>


                    </form>

                </div>
                <div class="row d-flex justify-content-center" style="margin:20px auto;">
                    <button class="web-button button-active" id="createPost-btn" value="newPost" name="newPost-btn">
                        <i class="fa-solid fa-floppy-disk"></i> Xác nhận
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('templates.main.mainCheckingService')
</body>

<script>
    var desPhotoExist = new DataTransfer();

    function formatTextClassify(icon) {
        return $('<span><i class="fa-solid fa-bars"></i>     ' + icon.text + '</span>');
    };
    $('.main-filter-classify').select2({
        width: "100%",
        placeholder: 'Phân loại',
        templateSelection: formatTextClassify,
        selectionCssClass: 'header-function-sec',
    });

    $(function() {
        console.log('date picker start date : ', '{{date('d/m/Y', strtotime($post->exist_to))}}');
        $('input[name="daterange"]').daterangepicker({
            opens: 'right',
            // autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY',
                separator: '  - ',
                applyLabel: 'Áp dụng',
                cancelLabel: 'Hủy bỏ',
                fromLabel: 'Từ',
                toLabel: 'Đến',
                customRangeLabel: 'Tùy chỉnh',
                daysOfWeek: [
                    'CN',
                    'T2',
                    'T3',
                    'T4',
                    'T5',
                    'T6',
                    'T7'
                ],
                monthNames: [
                    'Tháng 1',
                    'Tháng 2',
                    'Tháng 3',
                    'Tháng 4',
                    'Tháng 5',
                    'Tháng 6',
                    'Tháng 7',
                    'Tháng 8',
                    'Tháng 9',
                    'Tháng 10',
                    'Tháng 11',
                    'Tháng 12',
                ],

            },


        },
        // function(start, end, label) {
        //     console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
        //         .format('YYYY-MM-DD'));
        // }

        );
    });



    function removePreviewImageInMultiple(index, idForRemove, inputId) {
        // //check delete
        // console.log("multiple file before delete: ");
        // const filecheck = document.getElementById(inputId).files;
        // for (let i = 0; i < filecheck.length; i++) {
        //     console.log('file before : ', filecheck[i]);
        // }

        // const dt = new DataTransfer()
        desPhotoExist = new DataTransfer();
        const input = document.getElementById(inputId)
        const {
            files
        } = input

        console.log('index for remove : ', index);
        for (let i = 0; i < files.length; i++) {
            const file = files[i]
            if (index !== i) {
                console.log('not remove i : ', i);
                desPhotoExist.items.add(file) // here you exclude the file. thus removing it.
            }
        }
        console.log('desPhotoExist after remove : ', desPhotoExist.files);
        input.files = desPhotoExist.files;
        // desPhotoExist.files = dt.files;
        $(`#${idForRemove}`).empty();

        var newListFiles = $(`#${inputId}`).prop('files');
        for (let i = 0; i < newListFiles.length; i++) {
            let reader = new FileReader();

            reader.onload = (e) => {
                console.log('check file multiple: ', i);
                $(`#${idForRemove}`).append(`
                            <div class="preview-image-sec">
                                <img class="upload-image" src="${e.target.result}" alt="logo upload">
                                <i class="previewImage-delete-icon fa-solid fa-square-xmark fa-xl" onclick="removePreviewImageInMultiple(${i}, '${idForRemove}', '${inputId}')"></i>
                            </div>
                        `);
            }
            reader.readAsDataURL(newListFiles[i]);
        }

        // //Test
        // console.log("multiple file after delete: ");
        // const filecheckafter = document.getElementById('desPhotoUpload').files;
        // for (let i = 0; i < filecheckafter.length; i++) {
        //     console.log('file before : ', filecheckafter[i]);
        // }
    }

    function validateCreatePostForm() {
        var haveError = false;
        $('#createPost-warning-sec').hide();
        $('#createPost-warning').empty();
        // if($('#createPost-city-select').val() == 0){
        //     $('#createPost-warning').append('<li class="warning-text">Cần phải chọn thành phố</li>');
        // }


        //RealEstate part
        if ($('#realEstate-form-sec').length) {
            console.log('real estate Existed');
            if (isNaN($('#createPost-realEstate-price').val())) {
                $('#createPost-warning').append('<li class="warning-text">Giá bất động sản phải là số</li>');
                haveError = true;
            }
            if (isNaN($('#createPost-realEstate-square').val())) {
                $('#createPost-warning').append('<li class="warning-text">Diện tích bất động sản phải là số</li>');
                haveError = true;
            }
            if (isNaN($('#createPost-realEstate-numberRoom').val())) {
                $('#createPost-warning').append('<li class="warning-text">Số phòng bất động sản phải là số</li>');
                haveError = true;
            }
        }

        //Service
        if ($('#service-form-sec').length) {
            if ($('#createPost-service-content').val() == "") {
                $('#createPost-warning').append(
                    '<li class="warning-text">Nội dung của dịch vụ không được để trống</li>');
                haveError = true;
            }
        }


        //JOB
        if ($('#job-form-sec').length) {}

        //CAR_TRADE
        if ($('#carTrade-form-sec').length) {}


        //GARMENT
        if ($('#garment-form-sec').length) {}


        //MOM_BABY
        if ($('#momBaby-form-sec').length) {}


        //RESTAURANT
        if ($('#restaurant-form-sec').length) {
            if(desPhotoExist.items.length == 0){
                $('#createPost-warning').append('<li class="warning-text">Bắt buộc phải có ảnh mô tả</li>');
                haveError = true;
            }
        }

        //AD
        if ($('#ad-form-sec').length) {}





        if ($('#createPost-title').val() == "") {
            $('#createPost-warning').append('<li class="warning-text">Cần phải nhập tiêu đề</li>');
            haveError = true;
        }

        if ($('#createPost-description').val() == "") {
            $('#createPost-warning').append('<li class="warning-text">Cần phải nhập mô tả</li>');
            haveError = true;
        }

        // console.log('check phone : ', phoneInput.getNumber());
        var userPhone = '<?=Admin::user()->phone_number?>';
        console.log('userPhone : ', userPhone);
        if(userPhone == ''){
            if (phoneInput.getNumber() == "") {
                $('#createPost-warning').append(
                    '<li class="warning-text">Số điện thoại là bắt buộc</li>'
                );
                haveError = true;
            }else{
                if (phoneInput.getNumber().indexOf("+") == -1) {
                    $('#createPost-warning').append(
                            '<li class="warning-text">Số điện thoại không hợp lệ (sai định dạng, quá ngắn hoặc quá dài)</li>'
                    );
                    haveError = true;
                }
            }
        }else{
            if (phoneInput.getNumber() != "") {
                if (phoneInput.getNumber().indexOf("+") == -1) {
                    $('#createPost-warning').append(
                        '<li class="warning-text">Số điện thoại không hợp lệ (sai định dạng, quá ngắn hoặc quá dài)</li>'
                    );
                    haveError = true;
                }
            }
        }



        if (!haveError) {
            $('#contactPhone').val(phoneInput.getNumber());
            $('#newPostForm').submit();
        } else {
            $('#createPost-warning-sec').show();
        }
    }


    var takeFile = function(url){
        return new Promise(async function(resolve, reject) {
            var err=0;
            let response = await fetch(url);
            let data = await response.blob();
            let metadata = {
                type: 'image/jpeg'
            };
            var fileName = url.split('/').pop();
            let file = new File([data], fileName, metadata);
            desPhotoExist.items.add(file);
            // console.log('desPhotoExist in takeFile');
            if(response == null){
                reject('not ok');
            }else{
                resolve('ok');
            }
        })

    }


    async function addExistedImgFromBackend(){
        var imagesExisted = @json($images);
        imagesExisted.forEach(function(e){
            takeFile(e).then(function(){
                console.log('desPhoto : ', desPhotoExist.files);
                document.getElementById('desPhotoUpload').files = desPhotoExist.files;
            });
        })

    }

    $(document).ready(async function() {
        await addExistedImgFromBackend();
        $('#editPostDateRangePicker').data('daterangepicker').setStartDate('{{date('d/m/Y', strtotime($post->exist_from))}}');
        $('#editPostDateRangePicker').data('daterangepicker').setEndDate('{{date('d/m/Y', strtotime($post->exist_to))}}');

        $('#createPost-btn').on('click', function() {
            validateCreatePostForm();
        });
        // $('#newPostForm').submit(function() {
        //     $('#createPost-btn').val(phoneInput.getNumber());
        // });

        $('#logoUpload').on('change', function() {
            var filesTypesAccept = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
            var extension = this.files[0].name.split('.').pop().toLowerCase();
            fileExtensionAccept = filesTypesAccept.indexOf(extension) > -1;
            $('#logoUpload-preview-sec').empty();
            if (fileExtensionAccept) {
                fileSizeAccept = this.files[0].size < 15728640;
                if (fileSizeAccept) {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        console.log('check name file: ', e.target.result);
                        $('#logoUpload-preview-sec').append(`
                            <div class="preview-image-sec" >
                                <img class="upload-image" src="${e.target.result}" alt="logo upload">
                                <i class="previewImage-delete-icon fa-solid fa-square-xmark fa-xl" onclick="removePreviewImage('logoUpload-preview-sec', 'logoUpload')"></i>
                            </div>
                        `);
                        // $('#accept-avatar-show').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#logoUpload-warning').text('');

                } else {
                    $('#logoUpload-warning').text(
                        'Kích thước ảnh quá lớn! Vui lòng chọn ảnh có kích thước không lớn hơn 15mb.'
                    );
                }
            } else {
                $('#logoUpload-warning').text(
                    'Định dạng file không được chấp nhận! Chỉ chấp nhận ảnh JPG, JPEG, PNG, GIF, AVG.'
                );
            }
        });


        $('#desPhotoUpload').on('change', function() {
            var filesTypesAccept = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
            var filesAmount = this.files.length;
            $('#desPhotoUpload-preview-sec').empty();
            for (let i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                var extension = this.files[i].name.split('.').pop().toLowerCase();
                fileExtensionAccept = filesTypesAccept.indexOf(extension) > -1;
                if (fileExtensionAccept) {
                    fileSizeAccept = this.files[i].size < 15728640;
                    if (fileSizeAccept) {
                        desPhotoExist.items.add(this.files[i]);
                        $('#desPhotoUpload-warning').text('');
                    } else {
                        $('#desPhotoUpload-warning').text(
                            'Kích thước ảnh quá lớn! Mỗi ảnh được chọn phải có kích thước không lớn hơn 15mb.'
                        );
                    }
                } else {
                    $('#desPhotoUpload-warning').text(
                        'Định dạng file không được chấp nhận! Chỉ chấp nhận ảnh JPG, JPEG, PNG, GIF, AVG.'
                    );
                }
            }

            const input = document.getElementById('desPhotoUpload');

            input.files = desPhotoExist.files;
            var filesAdd = $(`#desPhotoUpload`).prop('files');
            for (let i = 0; i < filesAdd.length; i++) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    console.log('check file multiple: ', i);
                    $('#desPhotoUpload-preview-sec').append(`
                            <div class="preview-image-sec" >
                                <img class="upload-image" src="${e.target.result}" alt="logo upload">
                                <i class="previewImage-delete-icon fa-solid fa-square-xmark fa-xl" onclick="removePreviewImageInMultiple(${i}, 'desPhotoUpload-preview-sec', 'desPhotoUpload')"></i>
                            </div>
                        `);
                }
                reader.readAsDataURL(filesAdd[i]);
            }

            // //Test
            // console.log('file after append');
            // const filecheckafter = document.getElementById('desPhotoUpload').files;
            // for (let i = 0; i < filecheckafter.length; i++) {
            //     console.log('file append : ', filecheckafter[i]);
            // }

        });
    });

    const phoneInputField = document.querySelector("#contactPhone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["ru", "vn"],
        initialCountry: "ru",
        // geoIpLookup: getIp,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>

</html>
