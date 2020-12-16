<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryIdToGuestUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guest_users', function (Blueprint $table) {
            $table->unsignedBigInteger("country_id")->nullable();
            $table->foreign("country_id")->references("id")->on("countries");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guest_users', function (Blueprint $table) {
            //
        });
    }
}
