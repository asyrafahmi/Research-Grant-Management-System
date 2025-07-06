<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchGrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_leader_id',
        'grant_amount',
        'grant_provider',
        'project_title',
        'start_date',
        'duration_in_months'
    ];


    public function projectLeader()
    {
        return $this->belongsTo(Academician::class, 'project_leader_id');
    }

    public function projectMembers()
    {
        return $this->belongsToMany(Academician::class, 'academician_grant', 'research_grant_id', 'academician_id');
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
}
