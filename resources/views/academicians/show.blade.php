@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Academician Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $academician->name }}
        </div>
        <div class="card-body">
            <p><strong>Staff Number:</strong> {{ $academician->staff_number }}</p>
            <p><strong>Email:</strong> {{ $academician->email }}</p>
            <p><strong>College:</strong> {{ $academician->college }}</p>
            <p><strong>Department:</strong> {{ $academician->department }}</p>
            <p><strong>Position:</strong> {{ $academician->position }}</p>
            <h3>Research Grants Led</h3>
            <ul>
                @foreach($researchGrantsLed as $grant)
                    <li>{{ $grant->project_title }} (RM{{ number_format($grant->grant_amount, 2) }})</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
