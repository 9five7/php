@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <div class="avatar-wrapper">
                @if($member->avatar)
                    <img src="{{ asset('storage/'.$member->avatar) }}" alt="Avatar" class="avatar">
                @else
                    <img src="https://via.placeholder.com/120" alt="Default Avatar" class="avatar">
                @endif
            </div>
            <h2 class="member-name">{{ $member->name }}</h2>
            <p class="member-email">{{ $member->email }}</p>
        </div>

        <form action="{{ route('member.profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
            @csrf
            <div class="form-group">
                <label for="name">Tên hiển thị</label>
                <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" class="form-control">
                 @error('name') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="avatar">Ảnh đại diện</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
                 @error('avatar') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-primary">Cập nhật</button>
        </form>

        <form method="POST" action="{{ route('member.logout') }}">
            @csrf
            <button type="submit" class="btn-danger">Đăng xuất</button>
        </form>
    </div>
</div>
@endsection
