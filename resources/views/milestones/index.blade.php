@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Milestones</h1>
    <a href="{{ route('milestones.create') }}" class="btn btn-primary">Add New Milestone</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Milestone Name</th>
                <th>Target Completion Date</th>
                <th>Deliverable</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($milestones as $milestone)
            <tr>
                <td>{{ $milestone->milestone_name }}</td>
                <td>{{ $milestone->target_completion_date }}</td>
                <td>{{ $milestone->deliverable }}</td>
                <td>{{ $milestone->status }}</td>
                <td>
                    <a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
