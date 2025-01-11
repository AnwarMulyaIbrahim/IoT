@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Edit Schedule</h1>
        </div>
        <div class="card-body">
            <!-- Menampilkan Error jika ada -->
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Form Edit Jadwal -->
            <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menambahkan metode PUT untuk mengupdate data -->

                <!-- Time Field -->
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" name="time" id="time" class="form-control" value="{{ old('time', $schedule->time) }}" required>
                </div>

                <!-- Day(s) Field -->
                <div class="mb-3">
                    <label for="day" class="form-label">Day(s)</label>
                    <select name="day" id="day" class="form-select" value required>
                        <option value="Monday" >Monday</option>
                        <option value="Tuesday" >Tuesday</option>
                        <option value="Wednesday" >Wednesday</option>
                        <option value="Thursday" >Thursday</option>
                        <option value="Friday" >Friday</option>
                        <option value="Saturday" >Saturday</option>
                        <option value="Sunday" >Sunday</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>

            <!-- Kembali ke Daftar Schedules -->
            <div class="mt-3 text-end">
                <a href="{{ route('schedules.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Schedules
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
