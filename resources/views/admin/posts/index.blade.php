@extends('admin.app')

@section('page-title', 'Danh sách bài viết')

@section('content')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-3">+ Thêm bài viết</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Nội dung</th>
                <th>member email</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td><img src="{{ asset('storage/'.$post->image) }}" width="100"></td>
                    <td>{{ Str::limit($post->content, 80) }}</td>
                    <td>{{ $post->member ? $post->member->email : 'N/A' }}</td>
                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Chưa có bài viết nào</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
