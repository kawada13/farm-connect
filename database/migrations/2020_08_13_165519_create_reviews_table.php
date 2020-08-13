<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id')->default(0)->comment('会員ID');
            $table->unsignedInteger('product_id')->default(0)->comment('商品ID');
            $table->unsignedInteger('client_id')->default(0)->comment('クライアントID');
            $table->text('comment')->comment('コメント内容');
            $table->integer('score')->default(0)->comment('レビュー評価');
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
        Schema::dropIfExists('reviews');
    }
}
