<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfessionIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('profession');
            //unsigned integer es un entero sin signo, es decir un entero positivo
            //$table->unsignedInteger('profession_id')->after('id')->references('id')->on('professions');
            $table->unsignedInteger('profession_id')->after('id');
            $table->foreign('profession_id')->references('id')->on('professions');
        });
    }
//adding 2
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign(['profession_id']);
            $table->dropColumn('profession_id');
            $table->string('profession', 50)->nullable()->after('id');
        });
    }
}
