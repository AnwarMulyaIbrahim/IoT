@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 d-flex justify-content-center">Add Schedule</h1>

        <!-- Display Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
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
                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                    <div class="form-group form-check">
                        <input type="checkbox" name="day[]" value="{{ $day }}" class="form-check-input"
                            id="day">
                        <label for="" class="form-check-label">{{ $day }}</label>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">
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
