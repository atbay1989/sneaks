<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOriginalSneakIdToSneaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sneaks', function (Blueprint $table) {
            $table->bigInteger('original_sneak_id')->unsigned()->index()->nullable();
            
            $table->foreign('original_sneak_id')->references('id')->on('sneaks')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sneaks', function (Blueprint $table) {
            $table->dropColumn('original_sneak_id');
        });
    }
}
