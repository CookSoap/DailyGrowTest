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
        Schema::create('sendings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->string('login', 255)->nulable('false');
            $table->longText('password')->nulable('false');
            $table->string('addressee');
            $table->string('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sendings');
    }
};
