@extends('admin.app')

@section('page-title', 'Cài đặt tài khoản')

@section('content')
    <form action="{{ route('admin.settings.update', auth()->id()) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Tên</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file" name="avatar" class="form-control">
            @if($user->avatar)
                <img src="{{ asset('storage/'.$user->avatar) }}" width="120" class="mt-2">
            @endif
            @error('avatar') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>
@endsection
