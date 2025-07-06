@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Milestone Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $milestone->milestone_name }}
        </div>
        <div class="card-body">
            <p><strong>Research Grant:</strong> {{ $milestone->researchGrant->project_title }}</p>
            <p><strong>Target Completion Date:</strong> {{ $milestone->target_completion_date }}</p>
            <p><strong>Deliverable:</strong> {{ $milestone->deliverable }}</p>
            <p><strong>Status:</strong> {{ $milestone->status }}</p>
            <p><strong>Remark:</strong> {{ $milestone->remark }}</p>
            <p><strong>Date Updated:</strong> {{ $milestone->updated_at ? $milestone->updated_at->format('Y-m-d') : 'N/A' }}</p>
        </div>
    </div>
</div>
@endsection
