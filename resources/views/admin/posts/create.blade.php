@extends('admin.layouts.base')

@section('mainContent')
    <h2>
        Create new post
    </h2>

    <form action="{{ route('admin.posts.store') }}" method="post" novalidate>
        @csrf

        {{-- title form --}}
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- slug form --}}
        <div class="mb-3">
            <label class="form-label" for="slug">Slug</label>
            <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug') }}">
            <button type="button" class="btn btn-danger mt-3" style="color: #ffffff">Reset</button>
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- image form --}}
        <div class="mb-3">
            <label class="form-label" for="image">Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="url" name="image" id="image" value="{{ old('image') }}">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- category form --}}
        <div class="mb-3">
            <label class="form-label" for="category_id">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option @if(!old('category_id')) selected @endif disabled value="">Choose...</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- tag area --}}
        <fieldset class="mb-3">
            <legend>Tags</legend>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="tags[]"
                        value="{{ $tag->id }}"
                        id="tag-{{ $tag->id }}"
                        @if(in_array($tag->id, old('tags') ?: [])) checked @endif
                    >
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach

            @foreach ($errors->get('tags.*') as $messages)
                @foreach ($messages as $message)
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @endforeach
            @endforeach
        </fieldset>

        {{-- content form --}}
        <div class="mb-3">
            <label class="form-label" for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content">{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- excerpt form --}}
        <div class="mb-3">
            <label class="form-label" for="excerpt">Excerpt</label>
            <textarea class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit" style="color: #ffffff">
            Save
        </button>
    </form>
@endsection
