@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Academicians</h1>
    
    @can('manage-all')
    <div class="mb-3">
        <a href="{{ route('academicians.create') }}" class="btn btn-primary">Add New Academician</a>
    </div>
    @endcan

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Staff Number</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($academicians as $academician)
                <tr>
                    <td>{{ $academician->name }}</td>
                    <td>{{ $academician->staff_number }}</td>
                    <td>{{ $academician->department }}</td>
                    <td>
                        <a href="{{ route('academicians.show', $academician) }}" class="btn btn-info btn-sm">View</a>
                        
                        @can('manage-all')
                        <a href="{{ route('academicians.edit', $academician) }}" class="btn btn-primary btn-sm">Edit</a>
                        
                        <form action="{{ route('academicians.destroy', $academician) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
