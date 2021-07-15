@extends('backend.layout_backend.master_layout')
@section('title', 'User list')
@section('main')
    <div class="row">
        <div class="col-md-6">
            <form class="form-inline" action="" role="form">
                <div class="form-group">
                    <input type="text" name="key" id="" class="form-control" placeholder="Search by name"
                        style="width: 300px">
                </div>&nbsp;
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-md-3">
            @if (isset($_GET['key']))
                <a href="{{ route('admin.user.index') }}" class="btn btn-primary">All User</a>
            @endif
        </div>

        <div class="col-md-3 text-right">
            <a href="{{ route('admin.user.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Gender</td>
                        <td>Role</td>
                        <td style="max-width:200px">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $value)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->address }}</td>
                            @if ($value->gender == 1)
                                <td>
                                    <div class="badge badge-success">{{ 'Male' }}</div>
                                </td>
                            @elseif($value['status'] == 0)
                                <td>
                                    <div class="badge badge-danger">{{ 'Female' }}</div>
                                </td>
                            @endif
                            @if ($value->role == 1)
                                <td>
                                    <div class="badge badge-success">{{ 'Admin' }}</div>
                                </td>
                            @elseif($value['status'] == 0)
                                <td>
                                    <div class="badge badge-danger">{{ 'User' }}</div>
                                </td>
                            @endif
                            <td style="width: 100px;">
                                <a href="{{ route('admin.user.edit', $value->id) }}" class="badge badge-primary"><i
                                        class="far fa-edit"></i></a>
                                <a href="{{ route('admin.user.destroy', $value->id) }}"
                                    class="badge badge-danger btn-delete"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="" method="post" id="delete-form">
                @csrf @method('DELETE')
            </form>
            {{ $data->appends(request()->all())->links() }}
        </div>
    </div>
@endsection
@section('delete')
    <script>
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            var _href = $(this).attr('href');
            $('#delete-form').attr('action', _href);
            if (confirm(
                    'Bạn có chắc chắn muốn xóa !'
                )) {
                $('#delete-form').submit();
            }
        });
    </script>
@stop
