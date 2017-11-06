<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFtItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ft_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('ftItLeftTitle');
            $table->string('ftItLeftDesc');
            $table->string('ftItRightTitle');
            $table->string('ftItRightDesc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ft_items');
    }
}
