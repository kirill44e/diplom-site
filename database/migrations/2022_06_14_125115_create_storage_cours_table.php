<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_cours', function (Blueprint $table) {
          $table->id();
          $table->string('user_id');
          $table->string('status');
          $table->string('name');
          $table->text('description');
          $table->text('contacts');
          $table->integer('cost')->default('0');
          $table->text('image');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_cours');
    }
};
