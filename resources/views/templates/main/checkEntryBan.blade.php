@php
    use App\Admin;
@endphp
<div class="modal fade clearfix px-5" id="entryBan-modal" tabindex="-1" role="dialog"
    aria-labelledby="serviceCheckingModalContainer" aria-hidden="true" style="padding:0px;">
    <div class="modal-dialog modal-dialog-centered " role="document"
        style="max-width: 1000px; width: 100%; margin : auto;">
        <div class="modal-content">
            {{-- <div class="modal-header">
                Kiểm tra cấm nhập cảnh
                <span id="entryBan-modal-close" class="fs-4"><i class="fa-regular fa-circle-xmark"
                        style="float:right; width: 20px; height:20px; margin-right:5px;"></i></span>

            </div> --}}

            <div class="modal-header d-flex justify-content-center" style="position:relative;">
                <h4 style="font-size:20px; font-weight:bold; text-align:center;  padding:0px 50px;">Kiểm tra cấm nhập
                    cảnh</h4>
                <span id="entryBan-modal-close" style=" position:absolute; right:10px; top:5px;"
                    class="modal-close-btn d-flex justify-content-center">
                    <i class="fa-solid fa-xmark fa-xl icon-align"></i></span>

            </div>


            <div class="modal-body">

                <form id="modalBodyEntryBan" class="serviceCheckingModalBody" method="POST" action=""> @csrf
                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0" style="display:block; justify-content: center;">
                            <h6 class="mt-2">Họ tên - Tiếng Nga</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="25" id="checkEntry-nameRussian" name='checkEntry-nameRussian'
                                type="text" class="form-control h-100" value="" required />
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-xs-4 h-100 m-0">
                            <h6 class="mt-2">Họ tên - Tiếng Việt không dấu</h6>
                        </div>
                        <div class="col-xs-7 h-100 m-0">
                            <input maxlength="55" id="checkEntry-nameLatin" name='checkEntry-nameLatin' type="text"
                                class="form-control h-100" value="" required />
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-ms-6" style="width : 40%;">
                            <h6 class="mt-2">Giới tính</h6>
                            <select class="select-btn" name="checkEntry-gender">
                                <option value="1" selected>Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                        </div>
                        <div class="col-ms-6" style="width : 60%;">
                            <h6 class="mt-2">Ngày sinh</h6>
                            <input maxlength="55" id="checkEntry-dob" name='checkEntry-dob' type="date"
                                class="form-control" value="" required />
                        </div>
                    </div>

                    <div class="row my-1">
                        <div class="col-ms-6" style="width : 40%;">
                            <h6 class="mt-2">Số hộ chiếu</h6>
                            <input maxlength="55" id="checkEntry-passportSeries" name='checkEntry-passportSeries'
                                type="text" class="form-control" value="" required />
                        </div>
                        <div class="col-ms-6" style="width : 60%;">
                            <h6 class="mt-2">Ngày hết hạn hộ chiếu</h6>
                            <input maxlength="55" id="checkEntry-passportExpiredDate"
                                name='checkEntry-passportExpiredDate' type="date" class="form-control" required />
                        </div>
                    </div>
                </form>
                <div class="row col-ms-6" style="margin-top: 20px;">
                    <h6>Nhận thông báo thông qua:</h6>
                    @if (Admin::user() !== null)
                        @if (
                            (!isset(Admin::user()->email) || Admin::user()->email == '') &&
                                (!isset(Admin::user()->phone_number) || Admin::user()->phone_number == ''))
                            <br>
                            <h6 style="color:red;">Bạn chưa đăng ký email hoặc số điện thoại : </h6><span><a
                                    class="text-link"
                                    href="{{ route('user.index', ['userId' => Admin::user() !== null ? Admin::user()->id : 0]) }}">cập
                                    nhật</a></span>
                        @else
                            <select class="select-btn" id="checkingResponse" name="checkingResponse"
                                style="width:auto;">
                                @if (isset(Admin::user()->email))
                                    <option value="{{ RESPONSE_VIA_EMAIL }}">{{ Admin::user()->email }}</option>
                                @endif
                                @if (isset(Admin::user()->phone_number))
                                    <option value="{{ RESPONSE_VIA_PHONE }}">{{ Admin::user()->phone_number }}</option>
                                @endif

                            </select>
                        @endif
                    @else
                        <h6 class="mt-2">Email nhận thông báo :</h6>
                        <input maxlength="55" id="email-receiver-checkEntryBan" name='emailReceiver' type="email"
                            class="form-control" value="" required />
                    @endif


                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button id="entryBanCheckingServiceBtn" type="button" class="btn modal-btn">Xác nhận</button>
            </div>
        </div>
    </div>
    <style>
        #entryBanCheckingServiceBtn {
            background-color: #1d8daf;
            color: white;
            border: solid 1px #1d8daf;
        }

        #entryBanCheckingServiceBtn:hover {
            border: solid 2px #1d8daf;
            transition: 0.5s;
            background-color: white;
            color: rgba(102, 102, 102, .85);
        }

        .modal-active {
            /* border-bottom: solid 3px #1d8daf; */
            color: white;
            background-color: #1d8daf;
            border-top-right-radius: 8px 8px;
            border-top-left-radius: 8px 8px;
        }

        .modalTitle {
            float: left;
            margin: 0px;
            padding: 10px 10px 0px;
        }

        .modalTitle:hover {
            transition: 0.4s;
            cursor: pointer;
            color: white;
            /* border-bottom: solid 3px #1d8daf; */
            background-color: #1d8daf;
            border-top-right-radius: 8px 8px;
            border-top-left-radius: 8px 8px;

        }

        .select2-dropdown {
            z-index: 2000;
        }


        @media screen and (min-width : 1020px) and (max-width: 5000px) {
            .modal-header {
                padding: 10px 20px 0px;
            }
        }


        @media screen and (min-width : 820px) and (max-width: 1020px) {
            .modal-header {
                padding: 10px 20px 0px;
            }
        }


        @media screen and (min-width : 450px) and (max-width: 820px) {
            .modal-header {
                padding: 10px 0px 10px 5px;
            }
        }


        @media screen and (max-width: 450px) {
            .modal-header {
                padding: 10px 0px 10px 5px;
            }
        }
    </style>
</div>
<script type="text/javascript">
    function entryBanResetFormStyle() {
        var setupBorderColor = "rgba(0, 0, 0, 0.175)";
        $('#checkEntry-nameRussian').css('border-color', setupBorderColor);
        $('#checkEntry-nameLatin').css('border-color', setupBorderColor);
        $('#checkEntry-dob').css('border-color', setupBorderColor);
        $('#checkEntry-passportSeries').css('border-color', setupBorderColor);
        $('#checkEntry-passportExpiredDate').css('border-color', setupBorderColor);
        $('#email-receiver-checkEntryBan').css('border-color', setupBorderColor);


    }

    function entryBanResetForms() {
        $('#checkEntry-nameRussian').val("");
        $('#checkEntry-nameLatin').val("");
        $('#checkEntry-dob').val("");
        $('#checkEntry-passportSeries').val("");
        $('#checkEntry-passportExpiredDate').val("");
        $('#email-receiver-checkEntryBan').val("");

    }

    $(document).ready(function() {
        $('#entryBan-modal-close').on('click', function() {
            $('#entryBan-modal').modal('hide');
        })

        $('#entryBanCheckingServiceBtn').on('click', function() {
            console.log('on click : ');

            entryBanResetFormStyle();
            var haveError = false;
            var data = {};
            if ($('#checkEntry-nameRussian').val() == "") {
                $('#checkEntry-nameRussian').css('border-color', 'red');
                haveError = true;
            }
            if ($('#checkEntry-nameLatin').val() == "") {
                $('#checkEntry-nameLatin').css('border-color', 'red');
                haveError = true;
            }
            if ($('#checkEntry-dob').val() == "") {
                $('#checkEntry-dob').css('border-color', 'red');
                haveError = true;
            }
            if ($('#checkEntry-passportSeries').val() == "") {
                $('#checkEntry-passportSeries').css('border-color', 'red');
                haveError = true;
            }
            if ($('#checkEntry-passportExpiredDate').val() == "") {
                $('#checkEntry-passportExpiredDate').css('border-color', 'red');
                haveError = true;
            }
            let userId = '<?= Admin::user() !== null ? Admin::user()->id : null ?>';
            let emailReceiver = null;
            let responseRequire = null;
            if (userId == '') {
                if ($('#email-receiver-checkEntryBan').val() == "") {
                    $('#email-receiver-checkEntryBan').css('border-color', 'red');
                    haveError = true;
                } else {
                    emailReceiver = $('#email-receiver-checkEntryBan').val();
                }
            } else {
                if ($('#checkingResponse').length == 0) {
                    $('#toast-fail-text').text('Bạn chưa cập nhật Email hoặc Số điện thoại');
                    $('#notification-fail').toast('show');
                    haveError = true;
                } else {
                    responseRequire = $('#checkingResponse').val()
                }
            }

            if (!haveError) {
                data = {
                    userId: '<?= Admin::user() !== null ? Admin::user()->id : '' ?>',
                    checkingType: <?= ENTRY_BAN_TYPE ?>,
                    nameRussian: $('#checkEntry-nameRussian').val(),
                    nameLatin: $('#checkEntry-nameLatin').val(),
                    dob: $('#checkEntry-dob').val(),
                    passportSeries: $('#checkEntry-passportSeries').val(),
                    passportExpiredDate: $('#checkEntry-passportExpiredDate').val(),
                    responseRequire: responseRequire,
                    emailReceiver: emailReceiver,
                };
            }
            if (!haveError) {
                sendRequestChecking(data);
            }
        });

    });
</script>
