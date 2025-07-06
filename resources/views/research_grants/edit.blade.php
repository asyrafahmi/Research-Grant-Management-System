@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Research Grant</h1>
    <form action="{{ route('research_grants.update', $researchGrant->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="project_leader_id">Project Leader</label>
            <select name="project_leader_id" id="project_leader_id" class="form-control" required>
                @foreach($academicians as $academician)
                    <option value="{{ $academician->id }}" {{ $researchGrant->project_leader_id == $academician->id ? 'selected' : '' }}>
                        {{ $academician->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="project_title">Project Title</label>
            <input type="text" name="project_title" id="project_title" class="form-control" value="{{ $researchGrant->project_title }}" required>
        </div>

        <div class="form-group">
            <label for="grant_amount">Grant Amount</label>
            <input type="number" step="0.01" name="grant_amount" id="grant_amount" class="form-control" value="{{ $researchGrant->grant_amount }}" required>
        </div>

        <div class="form-group">
            <label for="grant_provider">Grant Provider</label>
            <input type="text" name="grant_provider" id="grant_provider" class="form-control" value="{{ $researchGrant->grant_provider }}" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $researchGrant->start_date }}" required>
        </div>

        <div class="form-group">
            <label for="duration_in_months">Duration (in months)</label>
            <input type="number" name="duration_in_months" id="duration_in_months" class="form-control" value="{{ $researchGrant->duration_in_months }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Grant</button>
        <a href="{{ route('research_grants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
