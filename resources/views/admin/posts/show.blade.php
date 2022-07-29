@extends('admin.layouts.base')

@section('mainContent')
    <h2>
        {{ $post->title }} - <small>by {{ $post->user->name }}</small>
    </h2>

    <img src="{{ $post->image }}" alt="{{ $post->title }}">

    <div class="tags mb-3">
        @foreach ($post->tags as $tag)
            <span class="tag">
                <small>
                    Category: <span style="font-style: italic">{{ $tag->name }}</span>
                </small>
            </span>
        @endforeach
    </div>

    <p>
        <big>
            {{ $post->content }}
        </big>
    </p>
@endsection
