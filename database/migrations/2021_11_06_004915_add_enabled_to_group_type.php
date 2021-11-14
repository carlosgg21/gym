<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnabledToGroupType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_types', function (Blueprint $table) {
            $table->integer('enabled')->default('1'); //1 activo; 0 inactivo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_types', function (Blueprint $table) {
            $table->dropColumn('enabled');
        });
    }
}
