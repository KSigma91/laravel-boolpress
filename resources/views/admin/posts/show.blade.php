@extends('admin.layouts.base')

@section('mainContent')
    <h2>
        {{ $post->title }} - <small>by {{ $post->user->name }}</small>
    </h2>

    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
    @endif

    <div class="tags mb-3">
        @foreach ($post->tags as $tag)
            <span class="tag">
                <small>
                    Tag: <span style="font-style: italic">{{ $tag->name }}</span>
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
