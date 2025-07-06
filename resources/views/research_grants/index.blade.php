@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Research Grants</h1>
    
    @can('manage-all')
    <div class="mb-3">
        <a href="{{ route('research_grants.create') }}" class="btn btn-primary">Create New Research Grant</a>
    </div>
    @endcan

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Project Title</th>
                    <th>Project Leader</th>
                    <th>Grant Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($researchGrants as $grant)
                <tr>
                    <td>{{ $grant->project_title }}</td>
                    <td>{{ $grant->projectLeader->name }}</td>
                    <td>RM{{ number_format($grant->grant_amount, 2) }}</td>
                    <td>
                        <a href="{{ route('research_grants.show', $grant) }}" class="btn btn-info btn-sm">View</a>
                        
                        @can('manage-all')
                        <a href="{{ route('research_grants.edit', $grant) }}" class="btn btn-primary btn-sm">Edit</a>
                        
                        <form action="{{ route('research_grants.destroy', $grant) }}" method="POST" class="d-inline">
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
