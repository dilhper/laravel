@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $course->name }}</h1>

        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Price:</strong> ${{ $course->price }}</p>
        <p><strong>Category:</strong> {{ $course->category->name }}</p>

        <!-- Display the instructor details -->
        <p><strong>Instructor:</strong> {{ $course->instructor->name }}</p>

        <!-- Check if the course is active or not -->
        <p><strong>Status:</strong> {{ $course->is_active ? 'Active' : 'Inactive' }}</p>

        <!-- Add an Enroll button if the user is logged in and not already enrolled -->
        @auth
            @if (auth()->user()->courses->contains($course))
                <p>You are already enrolled in this course.</p>
            @else
                <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Enroll in this Course</button>
                </form>
            @endif
        @endauth

    </div>
@endsection
