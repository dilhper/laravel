@extends('layouts.app')

@section('content')
<h1>Courses</h1>
<a href="{{ route('courses.create') }}">Add Course</a>
<ul>
    @foreach ($courses as $course)
        <li>{{ $course->name }}
            <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
