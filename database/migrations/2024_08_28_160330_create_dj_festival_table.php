<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDjFestivalTable extends Migration
{
    public function up()
    {
        Schema::create('dj_festival', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dj_id')->constrained('djs')->onDelete('cascade'); // Clave foránea para DJ
            $table->foreignId('festival_id')->constrained('festivals')->onDelete('cascade'); // Clave foránea para Festival
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dj_festival');
    }
}
