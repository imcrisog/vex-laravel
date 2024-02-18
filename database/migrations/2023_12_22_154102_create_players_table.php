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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('coins')->default(2000);
            $table->string('logo');
            $table->integer('level')->default(1);
            $table->boolean('verified')->default(false);

            $table->string('position');
            $table->string('properties'); // Height, Weight, Nacionality
            
            $table->integer('goals');
            $table->integer('matchs');
            $table->integer('assists');

            $table->integer('stats_famous');
            $table->integer('stats_performance');
            $table->integer('stats_attitude');
            $table->integer('stats_level');
        
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');

            $table->unsignedBigInteger('club_id')->nullable();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
