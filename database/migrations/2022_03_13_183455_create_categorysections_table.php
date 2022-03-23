<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorysectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorysections', function (Blueprint $table) {
            $table->id();
            $table->integer('designid')->length(10)->unsigned()->nullable();
            $table->integer('userid')->length(10)->unsigned()->nullable();
            $table->integer('section')->length(10)->unsigned()->nullable();
            $table->string('sections_name',100)->nullable();
            $table->string('imagepath')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_sections_status')->default(0);
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
        Schema::dropIfExists('categorysections');
    }
}
