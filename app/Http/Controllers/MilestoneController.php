<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\ResearchGrant;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::with('researchGrant')->get();
        return view('milestones.index', compact('milestones'));
    }

    public function create()
    {
        $researchGrants = ResearchGrant::all();
        return view('milestones.create', compact('researchGrants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'research_grant_id' => 'required|exists:research_grants,id',
            'milestone_name' => 'required|string',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required|string',
            'status' => 'required|string',
            'remark' => 'nullable|string',
            'date_updated' => 'nullable|date',
        ]);

        Milestone::create($request->all());

        return redirect()->route('milestones.index');
    }

    public function show(Milestone $milestone)
    {
        return view('milestones.show', compact('milestone'));
    }

    public function edit(Milestone $milestone)
    {
        $researchGrants = ResearchGrant::all();
        return view('milestones.edit', compact('milestone', 'researchGrants'));
    }

    public function update(Request $request, Milestone $milestone)
    {
        $request->validate([
            'research_grant_id' => 'required|exists:research_grants,id',
            'milestone_name' => 'required|string',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required|string',
            'status' => 'required|string',
            'remark' => 'nullable|string',
            'actual_completion_date' => 'nullable|date',
        ]);

        $milestone->update($request->all());

        return redirect()->route('milestones.index');
    }

    public function destroy(Milestone $milestone)
    {
        $milestone->delete();

        return redirect()->route('milestones.index');
    }
}
