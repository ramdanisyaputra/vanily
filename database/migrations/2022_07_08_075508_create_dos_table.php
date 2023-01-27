<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dos', function (Blueprint $table) {
            $table->id();
            $table->string('no_do');
            $table->date('tgl_do');
            $table->foreignId('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->text('desc');
            $table->text('ship_to');
            $table->integer('pajak');
            $table->integer('shipping');
            $table->integer('total');
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
        Schema::dropIfExists('dos');
    }
};
