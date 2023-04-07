<!doctype html>
<html lang="vi">
@include('layouts.masterLayout')
@include('layouts.header')

<link href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css" rel="stylesheet">
<link href="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/page-jump-to/bootstrap-table-page-jump-to.min.css"
    rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/multiple-sort/bootstrap-table-multiple-sort.js">
</script>
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/page-jump-to/bootstrap-table-page-jump-to.min.js">
</script>
<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
@php
    use App\Admin;
    $user_actived = USER_ACTIVATED;
    $user_suspended = USER_SUSPENDED;
    $role_admin = ROLE_ADMIN;
    $role_user = ROLE_USER;
@endphp
<link href="{{ asset('css/admin/accountManager.css?v=') . time() }}" rel="stylesheet">

<body style="position:relative;">
    <div class="project-content-section">
        <div class="row d-block justify-content-center" style="width:100%; margin:auto;">
            <div class="row d-flex justify-content-center" style="margin : 30px auto;">
                <h3 class="d-flex justify-content-center">
                    Quản lý tài khoản
                </h3>

            </div>
            <div class="row d-flex justify-content-center" style="margin : 30px auto;">
                <div class="row" style="width:100%; margin: 30px auto;">
                    <h6>Tài khoản Admin</h6>
                    @if (Admin::user() !== null && Admin::user()->isRole(ROLE_SUPER_ADMIN))
                        <div class="row" style="width : 200px;">
                            <a class="normal-button" style="height:30px; text-decoration: none;"
                                href="{{ route('admin.account.createAccount', ['accountType' => $role_admin]) }}">
                                <i class="fa-solid fa-user-plus"></i><span style="font-size: 10px;"> Thêm tài khoản
                                    admin</span>
                            </a>
                        </div>
                    @endif
                    <div class="table-responsive" style="margin-top:20px;">
                        <table id="adminTable"
                        class="accountTable"
                        data-search="true"
                                data-show-columns="true"
                                data-show-multi-sort="true"
                                data-pagination="true"
                                data-show-jump-to="true"
                                data-side-pagination="client"
                                data-mobile-responsive="true"
                                data-check-on-init="true">
                            <thead>
                                <tr>
                                    <th data-sortable="true"  scope="col">STT</th>
                                    <th data-sortable="true"  scope="col">Tên</th>
                                    <th data-sortable="true"  scope="col">ID</th>
                                    <th data-sortable="true"  scope="col">Username</th>
                                    <th data-sortable="true"  scope="col">Email</th>
                                    <th data-sortable="true"  scope="col">Trạng thái</th>
                                    @if (Admin::user() !== null && Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                        <th scope="col">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $key => $admin)
                                    <tr>
                                        <th scope="col">{{ $key+1 }}</th>
                                        <td scope="col">{{ $admin->name }}</td>
                                        <td scope="col">{{ $admin->id }}</td>
                                        <td scope="col">{{ $admin->username }}</td>
                                        <td scope="col">{{ $admin->email }}</td>
                                        @if ($admin->active)
                                            <td scope="col" style="color:green;">Đã kích hoạt </td>
                                            @if (Admin::user() !== null && Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                                <td>
                                                    <a class="action-account-btn" style="color:red;"
                                                        onclick="changeAccountAction({{ $admin->id }}, {{ $user_suspended }})">Đình
                                                        chỉ tài
                                                        khoản</a>
                                                </td>
                                            @endif
                                        @else
                                            <td scope="col" style="color:red;">Đã đình chỉ</td>
                                            @if (Admin::user() !== null && Admin::user()->isRole(ROLE_SUPER_ADMIN))
                                                <td>
                                                    <a class="action-account-btn" style="color:green;"
                                                        onclick="changeAccountAction({{ $admin->id }}, {{ $user_actived }})">Kích
                                                        hoạt tài
                                                        khoản</a>
                                                </td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="row" style="width:100%; margin: 30px auto;">
                    <h6>Tài khoản người dùng</h6>
                    @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                        <div class="row" style="width : 200px;">
                            <a class="normal-button" style="height:30px; text-decoration: none;"
                                href="{{ route('admin.account.createAccount', ['accountType' => $role_user]) }}">
                                <i class="fa-solid fa-user-plus"></i><span style="font-size: 10px;"> Thêm tài khoản
                                    người dùng</span>
                            </a>
                        </div>
                    @endif
                    <div class="table-responsive" style="overflow:scroll; margin-top:20px;">
                        <table id="userTable"
                        class="accountTable"
                        data-search="true"
                        data-show-columns="true"
                        data-show-multi-sort="true"
                        data-pagination="true"
                        data-show-jump-to="true"
                        data-side-pagination="client"
                        data-mobile-responsive="true"
                        data-check-on-init="true"
                        >
                            <thead>
                                <tr>
                                    <th data-sortable="true"  scope="col">STT</th>
                                    <th data-sortable="true"  scope="col">Tên</th>
                                    <th data-sortable="true"  scope="col">ID</th>
                                    <th data-sortable="true"  scope="col">Username</th>
                                    <th data-sortable="true"  scope="col">Email</th>
                                    <th data-sortable="true"  scope="col">Trạng thái</th>
                                    @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                        <th scope="col">Thao tác</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <th scope="col">{{ $key+1 }}</th>
                                        <td scope="col">{{ $user->name }}</td>
                                        <td scope="col">{{ $user->id }}</td>
                                        <td scope="col">{{ $user->username }}</td>
                                        <td scope="col">{{ $user->email }}</td>
                                        @if ($user->active)
                                            <td scope="col" style="color:green;">Đã kích hoạt </td>
                                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                <td>
                                                    <a class="action-account-btn" style="color:red;"
                                                        onclick="changeAccountAction({{ $user->id }}, {{ $user_suspended }})">Đình
                                                        chỉ tài
                                                        khoản</a>
                                                </td>
                                            @endif
                                        @else
                                            <td scope="col" style="color:red;">Đã đình chỉ</td>
                                            @if (Admin::user() !== null && Admin::user()->inRoles([ROLE_SUPER_ADMIN, ROLE_ADMIN]))
                                                <td>
                                                    <a class="action-account-btn" style="color:green;"
                                                        onclick="changeAccountAction({{ $user->id }}, {{ $user_actived }})">Kích
                                                        hoạt tài
                                                        khoản</a>
                                                </td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        // $('#adminTable').DataTable();
        // $('#userTable').DataTable();

        $('.accountTable').bootstrapTable({
                showMultiSort: true,
                formatMultipleSort: function() {
                    return 'Sắp xếp';
                },
                formatCancel: () => {
                    return 'Hủy';
                },
                formatColumn: () => {
                    return 'Cột';
                },
                formatDeleteLevel: () => {
                    return 'Xóa cấp sắp xếp';
                },
                formatOrder: () => {
                    return 'Sắp xếp theo';
                },
                formatSort: () => {
                    return 'Sắp xếp';
                },
                formatSortBy: () => {
                    return 'Sắp xếp theo';
                },
                formatSortOrders: () => {
                    return {
                        asc: "Tăng dần",
                        desc: 'Giảm dần',
                    };
                },
                formatThenBy: () => {
                    return 'Tiếp theo';
                },
                showJumpTo: false,

            })
    });

    function changeAccountAction(userId, actionStatus) {
        var url = "{{ route('admin.account.changeAction') }}";
        $.ajax({
            method: 'post',
            url: url,
            data: {
                userId: userId,
                actionStatus: actionStatus,
                _token: '{{ csrf_token() }}',
            },
            success: function(data) {
                console.log('data response : ', JSON.stringify(data));
                if (data.error == 0) {
                    window.location.reload();
                }
            }

        });

    }
</script>


</html>
