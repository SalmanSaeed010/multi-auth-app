@extends('layouts.app')

@section('content')
    <h1>Course Details</h1>

    <p><strong>Title:</strong> {{ $course->title }}</p>
    <p><strong>Description:</strong> {{ $course->description }}</p>

    <a href="{{ route('courses.index') }}" class="btn btn-primary">Back to Courses</a>
@endsection
