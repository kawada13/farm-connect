<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCommitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commitments', function (Blueprint $table) {
            $table->string('commitment_url')->nullable()->comment('こだわり画像')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commitments', function (Blueprint $table) {
            $table->string('commitment_url')->nullable(false)->comment('こだわり画像')->change();
        });
    }
}
