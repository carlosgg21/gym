<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('member')->default('no');
            $table->integer('enabled')->default(1); //1 activo 0 inactivo

            $table->date('hiring_date')->nullable();//fecha de alta
            $table->date('discharge_date')->nullable();//fecha de baja
            $table->text('discharge_reason')->nullable(); //razon de la baja hacer update para llevar un historial del cliente

            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')
                ->references('id')->on('businesses')
                ->onDelete('set null');
            $table->unsignedBigInteger('township_id')->nullable();
            $table->foreign('township_id')
                ->references('id')->on('townships')
                ->onDelete('set null');
            $table->unsignedBigInteger('payment_type_id')->nullable();
            $table->foreign('payment_type_id')
                ->references('id')->on('payment_types')
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
        Schema::dropIfExists('customers');
    }
}
