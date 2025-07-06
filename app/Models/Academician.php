<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'staff_number', 'email', 'college', 'department', 'position'
    ];

    public function researchGrantsLed()
    {
        return $this->hasMany(ResearchGrant::class, 'project_leader_id');
    }

    public function researchGrantsMember()
    {
        return $this->belongsToMany(ResearchGrant::class, 'project_members');
    }

    public function researchGrants()
    {
        return $this->belongsToMany(ResearchGrant::class, 'academician_grant');
    }
}
