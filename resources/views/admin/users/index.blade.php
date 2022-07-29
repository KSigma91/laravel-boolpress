@extends('admin.layouts.base')

@section('mainContent')
    <h2>
        Users
    </h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Birth</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr data-id="{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    @php
                        $info = $user->userInfo()->first();
                    @endphp
                    <td>{{ $info ? ($info->address ?: '-') : '-' }}</td>
                    <td>{{ $info ? ($info->phone ?: '-') : '-' }}</td>
                    <td>{{ $info ? ($info->birth ?: '-') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
