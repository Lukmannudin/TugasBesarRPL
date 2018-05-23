<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes_ingredients',function(Blueprint $table){
            $table->increments('id_recipes_ingredients');
            $table->integer('orderid')->unsigned();
            $table->integer('ingredientid')->unsigned();
            $table->integer('recipeid')->unsigned();
            $table->integer('qtyOrderIngredients');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes_ingredients');
    }
}
