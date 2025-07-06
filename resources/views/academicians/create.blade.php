@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Academician</h1>
    <form action="{{ route('academicians.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="staff_number">Staff Number</label>
            <input type="text" name="staff_number" id="staff_number" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="college">College</label>
            <input type="text" name="college" id="college" class="form-control">
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" name="department" id="department" class="form-control">
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Academician</button>
    </form>
</div>
@endsection
