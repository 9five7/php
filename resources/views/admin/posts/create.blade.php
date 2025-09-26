@extends('admin.app')

@section('page-title', 'Thêm bài viết')

@section('content')
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Nội dung</label>
            <textarea name="content" rows="5" class="form-control">{{ old('content') }}</textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" name="image" class="form-control">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- 👇 Thêm chọn Member --}}
        <div class="form-group">
            <label>Member</label>
            <select name="member_id" class="form-control">
                <option value="">-- Chọn member --</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->email }} ({{ $member->name }})
                    </option>
                @endforeach
            </select>
            @error('member_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
