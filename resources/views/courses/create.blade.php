@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Course</h1>
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger mt-2">{{ $errors->first('name') }}</div>
            @endif
            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('category_id'))
                <div class="alert alert-danger mt-2">{{ $errors->first('category_id') }}</div>
            @endif
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>
            @if ($errors->has('description'))
                <div class="alert alert-danger mt-2">{{ $errors->first('description') }}</div>
            @endif
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>
            @if ($errors->has('price'))
                <div class="alert alert-danger mt-2">{{ $errors->first('price') }}</div>
            @endif
            <div class="form-group">
                <label for="is_active">Active</label>
                <input type="checkbox" id="is_active" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="instructor_id">Instructor</label>
                <select id="instructor_id" name="instructor_id" class="form-control">
                    <option value="">Select an Instructor</option>
                    @foreach ($instructors as $instructor)
                        <option value="{{ $instructor->id }}" {{ old('instructor_id') == $instructor->id ? 'selected' : '' }}>{{ $instructor->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Course</button>
        </form>
    </div>
@endsection
