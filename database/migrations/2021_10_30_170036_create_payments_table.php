<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->string('name')->unique()->nullable();
            $table->double('mount');
            $table->date('pay_day');//fecha de pago
            $table->date('pay_due'); //fecha de vencimiento= pay_day+day
            $table->string('pay_on_time'); //pago en tiempo = 1  si pay_day <=  pay_due sino es 0 pago fuera de tiempo (morozo)
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('pay_type_id')->nullable();
            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onDelete('set null');
           $table->foreign('pay_type_id')
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
        Schema::dropIfExists('payments');
    }
}
