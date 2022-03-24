<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerNotificatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_notificatios', function (Blueprint $table) {
            $table->id();
            $table->integer('userid')->length(10)->nullable();
            $table->integer('designid')->length(10)->nullable();
            $table->integer('managerid')->length(10)->nullable();
            $table->text('notificatoin_comment')->nullable();
            $table->integer('read_status')->default(1);
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
        Schema::dropIfExists('manager_notificatios');
    }
}
