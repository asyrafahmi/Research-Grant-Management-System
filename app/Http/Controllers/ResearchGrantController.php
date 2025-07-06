<?php
namespace App\Http\Controllers;

use App\Models\ResearchGrant;
use App\Models\Academician;
use App\Models\Milestone;
use Illuminate\Http\Request;

class ResearchGrantController extends Controller
{

    public function index()
    {
        $researchGrants = ResearchGrant::with(['projectLeader', 'projectMembers'])
            ->paginate(10);
        return view('research_grants.index', compact('researchGrants'));
    }

    public function create()
    {
        $academicians = Academician::all();
        return view('research_grants.create', compact('academicians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_leader_id' => 'required|exists:academicians,id',
            'grant_amount' => 'required|numeric',
            'grant_provider' => 'required|string',
            'project_title' => 'required|string',
            'start_date' => 'required|date',
            'duration_in_months' => 'required|integer',
        ]);

        $researchGrant = ResearchGrant::create($request->all());

        if ($request->has('project_members')) {
            $researchGrant->projectMembers()->attach($request->project_members);
        }

        return redirect()->route('research_grants.show', $researchGrant)
            ->with('success', 'Research grant created successfully.');
    }

    public function show(ResearchGrant $researchGrant)
    {
        $researchGrant->load(['projectLeader', 'projectMembers']);
        $academicians = Academician::all();
        return view('research_grants.show', compact('researchGrant', 'academicians'));
    }

    public function edit(ResearchGrant $researchGrant)
    {
        $academicians = Academician::all();
        return view('research_grants.edit', compact('researchGrant', 'academicians'));
    }

    public function update(Request $request, ResearchGrant $researchGrant)
    {
        $validated = $request->validate([
            'project_leader_id' => 'required|exists:academicians,id',
            'grant_amount' => 'required|numeric',
            'grant_provider' => 'required|string',
            'project_title' => 'required|string',
            'start_date' => 'required|date',
            'duration_in_months' => 'required|integer',
        ]);

        $researchGrant->update($validated);
        return redirect()->route('research_grants.show', $researchGrant)
            ->with('success', 'Research grant updated successfully.');
    }

    public function destroy(ResearchGrant $researchGrant)
    {
        $researchGrant->delete();
        return redirect()->route('research_grants.index');
    }

    public function addMilestone(Request $request, ResearchGrant $researchGrant)
    {
        $request->validate([
            'milestone_name' => 'required',
            'target_completion_date' => 'required|date',
            'deliverable' => 'required',
        ]);

        $milestone = new Milestone($request->all());
        $researchGrant->milestones()->save($milestone);

        return redirect()->route('research_grants.show', $researchGrant);
    }

    public function updateMilestone(Request $request, ResearchGrant $researchGrant, Milestone $milestone)
    {
        $request->validate([
            'status' => 'required',
            'remark' => 'nullable',
            'date_updated' => 'required|date',
        ]);

        $milestone->update($request->all());

        return redirect()->route('research_grants.show', $researchGrant);
    }

    public function deleteMilestone(ResearchGrant $researchGrant, Milestone $milestone)
    {
        $milestone->delete();

        return redirect()->route('research_grants.show', $researchGrant);
    }

    public function projectsLedByAcademician(Academician $academician)
    {
        $researchGrants = $academician->researchGrantsLed()->with('projectMembers')->get();
        return view('research_grants.index', compact('researchGrants'));
    }

    public function myProjects()
    {
        $researchGrants = ResearchGrant::where('project_leader_id', auth()->id())
            ->with('projectMembers.academician')
            ->paginate(10);
        return view('research_grants.my_projects', compact('researchGrants'));
    }

    public function showProject(ResearchGrant $grant)
    {
        if ($grant->project_leader_id !== auth()->id()) {
            abort(403);
        }
        $grant->load(['projectMembers.academician']);
        return view('research_grants.show_project', compact('grant'));
    }

    public function addMember(Request $request, ResearchGrant $researchGrant)
    {
        $request->validate([
            'academician_id' => 'required|exists:academicians,id'
        ]);

        if (!$researchGrant->projectMembers->contains($request->academician_id)) {
            $researchGrant->projectMembers()->attach($request->academician_id);
        }

        return redirect()->route('research_grants.show', $researchGrant)
            ->with('success', 'Project member added successfully.');
    }

    public function removeMember(ResearchGrant $researchGrant, Academician $academician)
    {
        $researchGrant->projectMembers()->detach($academician->id);
        
        return redirect()->route('research_grants.show', $researchGrant)
            ->with('success', 'Project member removed successfully.');
    }
}
