@extends('admin.layouts.base')

@section('mainContent')
    @if (session('deleted'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {!! session('deleted') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h2>
        Posts
    </h2>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Slug</th>
                <th>Title</th>
                <th>Author</th>
                <th>Birth</th>
                <th>Category</th>
                <th>Tags</th>
                <th class="action">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr data-id="{{ $post->slug }}">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->user->userInfo->birth }}</td>
                    <td>
                        <a href="{{ route('admin.categories.show', ['category' => $post->category]) }}">
                            {{ $post->category->name }}
                        </a>
                    </td>
                    <td>
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('admin.tags.show', ['tag' => $tag]) }}">
                                {{ $tag->name }}
                            </a>
                            @if(!$loop->last) , @endif
                        @endforeach
                    </td>
                    <td class="actions">
                        <a href="{{ route('admin.posts.show', ['post' => $post]) }}" class="btn btn-primary">
                            View
                        </a>
                        @if(Auth::id() == $post->user_id)
                            <a href="{{ route('admin.posts.edit', ['post' => $post]) }}">
                                Edit
                            </a>
                            <button class="btn btn-danger">
                                Remove
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
