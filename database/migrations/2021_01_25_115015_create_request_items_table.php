<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_items', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('description');
            $table->string('specification');
            $table->date('date');
            $table->integer('qtreqtopur');
            $table->integer('qtonstore');
            $table->integer('acqtreqtopur');
            $table->integer('budget');

            $table->integer('pr_request_id');

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
        Schema::dropIfExists('request_items');
    }
}
