@extends('layouts.app')

@section('content')
<div class="container ">
    <h1 class="mb-4 d-flex justify-content-center">Schedules</h1>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="d-flex justify-content-center">
                {{ session('success') }}
            </p>
    </div>
    @endif

    <!-- Add Schedule Button -->
    <div class="mb-3 text-end">
        <a href="{{ route('schedules.create') }}" class="btn btn-primary d-flex justify-content-center">
            <i class="fas fa-plus"></i> Add Schedule
        </a>
    </div>

    <!-- Schedules Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Time</th>
                    <th>Day</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->time }}</td>
                    <td>{{ $schedule->day }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a> &nbsp;
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this schedule?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No schedules found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
