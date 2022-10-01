<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->text('icerik1')->nullable();
            $table->text('icerik2')->nullable();
            $table->text('icerik3')->nullable();
            $table->text('icerik4')->nullable();
            $table->text('icerik5')->nullable();
            $table->text('icerik6')->nullable();
            $table->text('icerik7')->nullable();
            $table->text('icerik8')->nullable();
            $table->text('icerik9')->nullable();
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
        Schema::dropIfExists('contents');
    }
}
