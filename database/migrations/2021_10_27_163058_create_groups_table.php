<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->time('start');
            $table->time('end');
            $table->string('frecuency')->nullable();
            $table->string('enabled')->default('1'); //1 activo ; 0 inactivo
            $table->unsignedBigInteger('group_type_id')->nullable();
            $table->foreign('group_type_id')
                    ->references('id')->on('group_types')
                    ->onDelete('set null');
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
        Schema::dropIfExists('groups');
    }
}
