<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->text('data')->nullable(); // stats from match, targets, goals, assists

            $table->string('diner_recauded')->nullable();
            $table->integer('views_recauded')->nullable();

            $table->date('timetoplay');

            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('set null');

            $table->unsignedBigInteger('winner_club_id')->nullable();
            $table->foreign('winner_club_id')->references('id')->on('clubs')->onDelete('set null');

            $table->unsignedBigInteger('local_club_id')->nullable();
            $table->foreign('local_club_id')->references('id')->on('clubs')->onDelete('set null');
            
            $table->unsignedBigInteger('visit_club_id')->nullable();
            $table->foreign('visit_club_id')->references('id')->on('clubs')->onDelete('set null');

            $table->boolean('finished')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
