<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsertDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
            Schema::create('insert_data', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('dataname');
                $table->string('Order_Date');
                $table->string('Channel');
                $table->string('SKU');
                $table->string('Item_Description');
                $table->string('Origin');
                $table->string('SO');
                $table->string('Total_Price');
                $table->string('Cost');
                $table->string('Shipping_Cost');
                $table->string('Profit');
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
        Schema::dropIfExists('insert_data');
    }
}
