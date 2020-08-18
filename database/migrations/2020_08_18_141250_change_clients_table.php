<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('zip')->nullable()->change();
            $table->string('municipality')->nullable()->change();
            $table->string('prefecture')->nullable()->change();
            $table->string('ward')->nullable()->change();
            $table->text('introduce')->nullable()->change();
            $table->string('shipping')->nullable()->change();
            $table->text('shipping_info')->nullable()->change();
            $table->string('area_name')->nullable()->change();
            $table->string('tel')->nullable()->change();
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
            $table->integer('zip')->nullable(false)->change();
            $table->string('municipality')->nullable(false)->change();
            $table->string('prefecture')->nullable(false)->change();
            $table->string('ward')->nullable(false)->change();
            $table->text('introduce')->nullable(false)->change();
            $table->string('shipping')->nullable(false)->change();
            $table->text('shipping_info')->nullable(false)->change();
            $table->string('area_name')->nullable(false)->change();
            $table->string('tel')->nullable(false)->change();
        });
    }
}
