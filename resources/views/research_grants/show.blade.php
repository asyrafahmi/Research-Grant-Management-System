@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Research Grant Details</h1>
    <div class="card mb-4">
        <div class="card-header">
            {{ $researchGrant->project_title }}
        </div>
        <div class="card-body">
            <p><strong>Project Leader:</strong> {{ $researchGrant->projectLeader->name }}</p>
            <p><strong>Grant Amount:</strong> RM{{ number_format($researchGrant->grant_amount, 2) }}</p>
            <p><strong>Grant Provider:</strong> {{ $researchGrant->grant_provider }}</p>
            <p><strong>Start Date:</strong> {{ $researchGrant->start_date }}</p>
            <p><strong>Duration (Months):</strong> {{ $researchGrant->duration_in_months }}</p>
        </div>
    </div>

    <!-- Project Members Section -->
    <div class="card mb-4">
        <div class="card-header">
            Project Members
        </div>
        <div class="card-body">
            <!-- Current Members List -->
            <h5>Current Members</h5>
            <div class="table-responsive mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researchGrant->projectMembers as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->department }}</td>
                            <td>
                                <form action="{{ route('research_grants.remove_member', [$researchGrant, $member]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Add New Member Form -->
            <h5>Add New Member</h5>
            <form action="{{ route('research_grants.add_member', $researchGrant) }}" method="POST">
                @csrf
                <div class="form-group">
                    <select name="academician_id" class="form-control" required>
                        <option value="">Select Academician</option>
                        @foreach($academicians as $academician)
                        <option value="{{ $academician->id }}">
                            {{ $academician->name }} - {{ $academician->department }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Add Member</button>
            </form>
        </div>
    </div>
</div>
@endsection
