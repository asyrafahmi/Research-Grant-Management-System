@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Academician</h1>
    <form action="{{ route('academicians.update', $academician->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $academician->name }}" required>
        </div>

        <div class="form-group">
            <label for="staff_number">Staff Number</label>
            <input type="text" class="form-control" id="staff_number" name="staff_number" value="{{ $academician->staff_number }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $academician->email }}" required>
        </div>

        <div class="form-group">
            <label for="college">College</label>
            <input type="text" class="form-control" id="college" name="college" value="{{ $academician->college }}" required>
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control" id="department" name="department" value="{{ $academician->department }}" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $academician->position }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Academician</button>
    </form>
</div>
@endsection
