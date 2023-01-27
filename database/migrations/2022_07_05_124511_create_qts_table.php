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
        Schema::create('qts', function (Blueprint $table) {
            $table->id();
            $table->string('no_qt');
            $table->date('tgl_qt');
            $table->foreignId('rfq_id')->references('id')->on('rfqs')->onDelete('cascade');
            $table->text('desc');
            $table->integer('pajak');
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
        Schema::dropIfExists('qts');
    }
};
