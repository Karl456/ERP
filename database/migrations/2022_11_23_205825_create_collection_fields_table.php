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
        Schema::create('collection_fields', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('collection_id');
            $table->string('name');
            $table->string('handle');
            $table->string('type');
            $table->json('config')->nullable();
            $table->boolean('required')->nullable()->default(0);
            $table->boolean('primary')->nullable()->default(0);
            $table->integer('sort_order')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_fields');
    }
};
