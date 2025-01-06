@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="card">
            <div class="card-body">
                <p>Welcome, Admin!</p>
                <ul>
                    <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
                    <li><a href="{{ route('admin.courses.index') }}">Manage Courses</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">Manage Categories</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
