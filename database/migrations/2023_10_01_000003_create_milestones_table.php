<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilestonesTable extends Migration
{
    public function up()
    {
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_grant_id')->constrained('research_grants')->onDelete('cascade');
            $table->string('milestone_name');
            $table->date('target_completion_date');
            $table->string('deliverable');
            $table->string('status')->default('pending');
            $table->text('remark')->nullable();
            $table->date('date_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('milestones');
    }
}
