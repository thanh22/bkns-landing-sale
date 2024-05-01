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
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable(false);
            $table->tinyInteger('image_position')->nullable(false)->comment('0:left 1:center 2:right');
            $table->text('content')->nullable(false);
            $table->tinyInteger('active')->nullable(false)->default(0)->comment('0:off 1:on');
            $table->tinyInteger('position')->nullable(false);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
