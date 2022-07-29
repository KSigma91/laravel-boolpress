@extends('admin.layouts.base')

@section('mainContent')
    <h2>
        Categories
    </h2>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Category</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        <big style="font-weight: bold; color: #464646">
                            {{ $category->name }}
                        </big>
                    </td>
                    <td>{{ $category->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
