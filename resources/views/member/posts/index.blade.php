@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bài viết của {{ $member->name }}</h2>

    @if($posts->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Ảnh</th>
                    <th>Nội dung</th>
                    <th>Ngày tạo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" width="100">
                            @else
                                Không có ảnh
                            @endif
                        </td>
                        <td>{{ Str::limit($post->content, 80) }}</td>
                        <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    @else
        <p>Bạn chưa có bài viết nào.</p>
    @endif
</div>
@endsection
