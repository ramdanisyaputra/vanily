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
        Schema::create('invs', function (Blueprint $table) {
            $table->id();
            $table->string('no_inv');
            $table->date('tgl_inv');
            $table->foreignId('po_id')->references('id')->on('pos')->onDelete('cascade');
            $table->text('desc');
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
        Schema::dropIfExists('invs');
    }
};
