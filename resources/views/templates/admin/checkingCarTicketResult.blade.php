@php
    use App\Admin;
@endphp
<div class="modal fade clearfix px-5" id="add-checking-carTicket-request-result" tabindex="-1" role="dialog"
    aria-labelledby="serviceCheckingModalContainer" aria-hidden="true" style="padding:0px; display:none; z-index:1500;">
    <div class="modal-dialog modal-dialog-centered " role="document"
        style="max-width: 1000px; width: 100%; margin : auto;">
        <div class="modal-content">
            <div class="modal-header">

                <div>
                    <h5>
                        Nhập kết quả
                    </h5>
                </div>
                <span id="add-checking-carTicket-request-result-close" class="fs-4"><i class="fa-regular fa-circle-xmark"
                        style="float:right; width: 20px; height:20px; margin-right:5px;"></i></span>

            </div>


            <div class="modal-body">
                <div class="row">
                    <div style="width:30%;">
                        <p style="font-weight:600;">ID người gửi yêu cầu : </p>
                    </div>
                    <div style="width:50%;">
                        <p id="carTicketModal-idRequester"></p>
                    </div>
                </div>
                <div class="row">
                    <div style="width:30%;">
                        <p style="font-weight:600;">Tên người gửi yêu cầu : </p>
                    </div>
                    <div style="width:50%;">
                        <p id="carTicketModal-nameRequester"></p>
                    </div>
                </div>
                <div class="row">
                    <div style="width:30%;">
                        <p style="font-weight:600;">Biển số xe : </p>
                    </div>
                    <div style="width:50%;">
                        <p id="carTicketModal-carLicense"></p>
                    </div>
                </div>
                <div class="row">
                    <div style="width:30%;">
                        <p style="font-weight:600;">Chứng nhận sở hữu xe : </p>
                    </div>
                    <div style="width:50%;">
                        <p id="carTicketModal-certOwnerShip"></p>
                    </div>
                </div>
                <div class="row">
                    <div style="width:30%;">
                        <p style="font-weight:600;">Thời gian cập nhật : </p>
                    </div>
                    <div style="width:50%;">
                        <p id="carTicketModal-timeUpdated"></p>
                    </div>
                </div>
                <div class="row">
                    <div style="width:30%;">
                        <p style="font-weight:600;">Trạng thái : </p>
                    </div>
                    <div style="width:50%;">
                        <p id="carTicketModal-status"></p>
                    </div>
                </div>
                <div class="row">
                    <div style="width:30%;">
                        <p style="font-weight:600;">Phản hồi thông qua : </p>
                    </div>
                    <div style="width:50%;">
                        <p id="carTicketModal-responseVia"></p>
                    </div>
                </div>
                <div class="row">
                    <p style="font-weight:600;">Kết quả : </p>
                </div>
                <div class="row">
                    <form id="modalBodyEntryBan" class="serviceCheckingModalBody" method="POST" action="{{route('admin.checkingInfo.carTicketResultUpdate')}}"> @csrf
                        <input id="carTicketModalResponseOption" name = "carTicketModalResponseOption" value="" style="display:none;"/>
                        <input id="carTicketModalResponseAddress" name = "carTicketModalResponseAddress" value="" style="display:none;"/>
                        <input id="carTicketModalNameRequester" name = "carTicketModalNameRequester" value="" style="display:none;"/>

                        <textarea name="carTicketModalResult" id="carTicketModal-result" style="width: 100%; min-height:80px; border:1px solid black; border-radius:6px;"></textarea>
                        <div class="modal-footer d-flex justify-content-center">
                            <button id="carTicketBtn" name="carTicketBtn" value="" type="submit" type="submit" class="btn modal-btn">Xác nhận kết quả và gửi đến người dùng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #carTicketBtn{
        background-color:green;
        color:white;
    }
</style>
<script>
    function testTextArea(){
        console.log('text area data : ',$('#carTicketModal-result').val() );
    }
</script>

