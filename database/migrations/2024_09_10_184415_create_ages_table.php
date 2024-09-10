<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ages', function (Blueprint $table) {
            $table->id();
            $table->string('age', 20);
            $table->tinyInteger('sort');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ages');
    }
};
