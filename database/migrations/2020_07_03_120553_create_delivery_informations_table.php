<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id')->default(0)->comment('会員ID');
            $table->string('name');
            $table->string('zip');
            $table->string('address');
            $table->dateTime('created_at')->nullable()->comment('登録日時');
            $table->dateTime('updated_at')->nullable()->comment('更新日時');
            $table->dateTime('deleted_at')->nullable()->comment('削除日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_informations');
    }
}
