<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManyToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('zip')->comment('郵便番号');
            $table->string('prefecture')->comment('都道府県');
            $table->string('municipality')->comment('市');
            $table->string('ward')->comment('区町村');
            $table->string('tel')->comment('電話番号');
            $table->text('introduce')->comment('紹介文');
            $table->string('shipping')->comment('発送日');
            $table->text('shipping_info')->comment('発送情報');
            $table->string('client_url')->nullable()->comment('プロフィール画像');
            $table->string('area_name')->comment('生産地名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('zip')->comment('郵便番号');
            $table->string('prefecture')->comment('都道府県');
            $table->string('municipality')->comment('市');
            $table->string('ward')->comment('区町村');
            $table->string('tel')->comment('電話番号');
            $table->text('introduce')->comment('紹介文');
            $table->string('shipping')->comment('発送日');
            $table->text('shipping_info')->comment('発送情報');
            $table->string('client_url')->nullable()->comment('プロフィール画像');
            $table->string('area_name')->comment('生産地名');
        });
    }
}
