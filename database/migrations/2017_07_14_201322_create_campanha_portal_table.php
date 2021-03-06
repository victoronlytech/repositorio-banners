<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanhaPortalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanha_portal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campanha_id')->unsigned();
            $table->foreign('campanha_id')->references('id')->on('campanhas')->onDelete('cascade');
            $table->integer('portal_id')->unsigned();
            $table->foreign('portal_id')->references('id')->on('portals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campanha_portal');
    }
}
