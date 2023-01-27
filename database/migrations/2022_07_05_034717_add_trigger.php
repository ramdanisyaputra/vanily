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
        DB::unprepared('CREATE TRIGGER tg_rfq AFTER INSERT ON `rfq_details` FOR EACH ROW
                BEGIN
                UPDATE barangs
                SET stock = stock - NEW.qty
                WHERE
                id = NEW.barang_id;
                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
