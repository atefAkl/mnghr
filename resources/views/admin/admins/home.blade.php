@extends('layouts.admin')
@section('title')
    مديرى التطبيق
@endsection
@section('pageHeading')
    مديرى التطبيق
@endsection
@section('contents')

    <div class="mt-3 pt-2" style="min-height: 100vh">
        <fieldset class="mt-4 mx-0 mb-0 border-radius-1">
            <legend class="border-radius-1 px-3 py-1">
                Admins List &nbsp; &nbsp;
                    <a href="{{ route('create-new-admin') }}"><i class="fa fa-plus"></i></a>
            </legend>
            <table id="AdminsTable" class="table">
                <thead>
                    <tr class="bg-secondary">
                        <th class="">#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Join Date</th>
                        <th>Role</th>
                        <th><i class="fa fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users))
                        @php $i = 0 @endphp
                        @foreach ($users as $ui => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->profile ? $user->profile->first_name . ' ' . $user->profile->last_name : explode('@', $user->email)[0] }}
                                    [ {{ $user->userName }} ] </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    {{$user->roles}}
                                </td>

                                <td>
                                    <a href="{{ route('display-admin', [$user->id]) }}"><i class="fa fa-eye"
                                            title="Display Admins info"></i></a>

                                    <a href="{{ route('destroy-admin', $user->id) }}"
                                        onclick="return confirm('This action is one way, you will not able to undo this, are you sure.?')"><i
                                            class="fa fa-trash text-danger" title="Delete Admin"></i></a>
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#roleModal" onclick="setUserId({{ $user->id }})">
                                        <i class="fa fa-user-plus"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">لم يتم بعد تسجيل مديرين حتى الان، بادر بـ  <a href="{{ route('user.create') }}">أدخل
                                إضافة أول مدير</a> للتطبيق</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </fieldset>

        <!-- Modal -->
        <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">Assign Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('assign-role') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" id="modalUserId">
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select name="role_id" id="role" class="form-control">
                                    <!-- Options for roles -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        function setUserId(userId) {
            document.getElementById('modalUserId').value = userId;
        }
    </script>
@endsection
