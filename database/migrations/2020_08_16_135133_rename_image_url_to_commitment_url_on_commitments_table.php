<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameImageUrlToCommitmentUrlOnCommitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commitments', function (Blueprint $table) {
            $table->renameColumn('image_url', 'commitment_url');
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
            $table->renameColumn('commitment_url', 'image_url');
        });
    }
}
