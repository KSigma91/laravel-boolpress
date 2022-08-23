@extends('admin.layouts.base')

@section('mainContent')
    <h2>
        Tags
    </h2>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Tag</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>
                        <big style="font-weight: bold; color: #464646">
                            {{ $tag->name }}
                        </big>
                    </td>
                    <td>{{ $tag->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
