<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignRecipesIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes_ingredients',function(Blueprint $table){
            $table->foreign('ingredientid')
                  ->references('ingredientid')
                  ->on('ingredients')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('recipeid')
                  ->references('recipeid')
                  ->on('recipes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('recipes_recipeid_foreign'); 
        $table->dropForeign('ingredients_recipeid_foreign');
    }
}
