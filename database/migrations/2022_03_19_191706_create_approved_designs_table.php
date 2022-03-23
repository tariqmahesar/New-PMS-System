<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_designs', function (Blueprint $table) {
            $table->id();
            $table->integer('userid')->length(10)->nullable();
            $table->integer('designerid')->length(11)->nullable();
            $table->integer('designid')->length(10)->nullable();
            $table->integer('sectionid')->length(10)->nullable();
            $table->string('approved_status',100)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('approved_designs');
    }
}
