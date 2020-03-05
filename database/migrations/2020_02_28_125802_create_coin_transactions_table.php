<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('rate');
            $table->integer('amount');
            $table->json('object')->nullable();
            $table->string('wallet')->nullable(); //for purchase
            $table->string('coin')->default('Bitcoin');
            $table->string('type')->default('Exchange');
            $table->unsignedTinyInteger('transaction_type');
            $table->string('class')->default('App\CoinTransaction');
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('coin_transactions');
    }
}
