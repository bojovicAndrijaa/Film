<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBirthYearToBirthYearInReziserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reziser', function (Blueprint $table) {
            $table->renameColumn('birthYear','birth_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reziser', function (Blueprint $table) {
            $table->renameColumn('birth_year','birthYear');
        });
    }
}
