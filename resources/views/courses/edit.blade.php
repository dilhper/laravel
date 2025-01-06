@extends('layouts.app')

@section('content')
<h1>Edit Course</h1>
<form action="{{ route('courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="name">Course Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
    </div>
    
    <div class="form-group">
        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <option value="">Select a Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control" required>{{ old('description', $course->description) }}</textarea>
    </div>
    
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $course->price) }}" required>
    </div>
    
    <div class="form-group">
        <label for="is_active">Active</label>
        <input type="checkbox" id="is_active" name="is_active" {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
    </div>
    
    <div class="form-group">
        <label for="instructor_id">Instructor</label>
        <select id="instructor_id" name="instructor_id" class="form-control">
            <option value="">Select an Instructor</option>
            @foreach ($instructors as $instructor)
                <option value="{{ $instructor->id }}" {{ old('instructor_id', $course->instructor_id) == $instructor->id ? 'selected' : '' }}>{{ $instructor->name }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary mt-3">Update Course</button>
</form>
@endsection
