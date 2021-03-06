<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments',function(Blueprint $table){
            $table->foreign('orderid')
                  ->references('orderid')
                  ->on('orders')
                  ->onDelete('cascade')
                  ->onCascade('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('orders_orderid_foreign'); 
    }
}
