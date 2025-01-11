@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 d-flex justify-content-center">Add Schedule</h1>

    <!-- Display Errors -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Add Schedule Form -->
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ old('time') }}" required>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label">Day(s)</label>
            <select name="day" id="day" class="form-select" required>
                <option value="Monday" >Monday</option>
                <option value="Tuesday" >Tuesday</option>
                <option value="Wednesday" >Wednesday</option>
                <option value="Thursday" >Thursday</option>
                <option value="Friday" >Friday</option>
                <option value="Saturday" >Saturday</option>
                <option value="Sunday" >Sunday</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Schedule
            </button>
        </div>
    </form>

    <!-- Back to Schedules -->
    <div class="mt-3 text-end">
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Schedules
        </a>
    </div>
</div>
@endsection
