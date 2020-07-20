<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id')->default(0)->comment('会員ID');
            $table->unsignedInteger('product_id')->default(0)->comment('商品ID');
            $table->integer('delivery_id')->comment('受け取り住所');
            $table->integer('price')->comment('商品価格');
            $table->integer('number')->comment('商品個数');
            $table->integer('is_shipping')->default(0)->comment('発送ステータス');
            $table->date('shipping')->nullable()->comment('発送希望日');
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
        Schema::dropIfExists('purchases');
    }
}
