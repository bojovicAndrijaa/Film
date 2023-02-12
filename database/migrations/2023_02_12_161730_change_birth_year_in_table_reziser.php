<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rezisers', function (Blueprint $table) {
            $table->renameColumn('birthYear','birth-year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rezisers', function (Blueprint $table) {
            $table->renameColumn('birth-year','birthYear');
        });
    }
};
