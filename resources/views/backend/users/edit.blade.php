@extends('backend.layout_backend.master_layout')
@section('title', 'Edit User')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.user.update', $data->id) }}" method="post" role="form">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $data->name }}">
                            @if ($errors->has('name'))
                                <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email *</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $data->email }}">
                            @if ($errors->has('email'))
                                <p style="color:red">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password *</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <p style="color:red">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password confirm *</label>
                            <input type="password" name="password_cf"
                                class="form-control @error('password_cf') is-invalid @enderror"
                                value="{{ old('password_cf') }}">
                            @if ($errors->has('password_cf'))
                                <p style="color:red">{{ $errors->first('password_cf') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address *</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                value="{{ $data->address }}">
                            @if ($errors->has('address'))
                                <p style="color:red">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Gender *</label>
                            <select class="form-control" name="gender">
                                <option value="1" {{ $data->gender == 1 ? 'selected' : '' }}>Male</option>
                                <option value="0" {{ $data->gender == 0 ? 'selected' : '' }}>Female</option>
                            </select>
                            @if ($errors->has('gender'))
                                <p style="color:red">{{ $errors->first('gender') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Role *</label>
                            <select class="form-control" name="role">
                                <option value="0" {{ $data->role == 0 ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $data->role == 1 ? 'selected' : '' }}>Admin</option>
                            </select>
                            @if ($errors->has('role'))
                                <p style="color:red">{{ $errors->first('role') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
