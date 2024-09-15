<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('answers', function (Blueprint $table) {
      $table->id();
      $table->string('fullname', 200);
      $table->tinyInteger('gender')->comment('1: 男性, 2: 女性');
      $table->foreignId('age_id')->constrained();
      $table->string('email');
      $table->tinyInteger('is_send_email')->comment('0: 送信許可, 1: 送信不可');
      $table->text('feedback')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('answers');
  }
};
