<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->integer('enabled')->default(1); //1 activo 0 inactivo 2 licencia 3 vacaciones
            $table->string('cellphone')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('observations')->nullable();
            $table->date('hiring_date')->nullable();
            $table->date('discharge_date')->nullable();
            $table->text('discharge_reason')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')
                ->references('id')->on('employee_types')
                ->onDelete('set null');
            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')
                ->references('id')->on('businesses')
                ->onDelete('set null');
            $table->unsignedBigInteger('township_id')->nullable();
            $table->foreign('township_id')
                ->references('id')->on('townships')
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
        Schema::dropIfExists('employees');
    }
}
