@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Milestone</h1>
    <form action="{{ route('milestones.update', $milestone->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="research_grant_id">Research Grant</label>
            <select name="research_grant_id" id="research_grant_id" class="form-control">
                @foreach($researchGrants as $grant)
                    <option value="{{ $grant->id }}" {{ $milestone->research_grant_id == $grant->id ? 'selected' : '' }}>{{ $grant->project_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="milestone_name">Milestone Name</label>
            <input type="text" name="milestone_name" id="milestone_name" class="form-control" value="{{ $milestone->milestone_name }}">
        </div>
        <div class="form-group">
            <label for="target_completion_date">Target Completion Date</label>
            <input type="date" name="target_completion_date" id="target_completion_date" class="form-control" value="{{ $milestone->target_completion_date }}">
        </div>
        <div class="form-group">
            <label for="deliverable">Deliverable</label>
            <input type="text" name="deliverable" id="deliverable" class="form-control" value="{{ $milestone->deliverable }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $milestone->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $milestone->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="remark">Remark</label>
            <textarea name="remark" id="remark" class="form-control">{{ $milestone->remark }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Milestone</button>
    </form>
</div>
@endsection
