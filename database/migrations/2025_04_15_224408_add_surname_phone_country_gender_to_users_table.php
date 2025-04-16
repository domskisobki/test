<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSurnamePhoneCountryGenderToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add surname column (string)
            $table->string('surname')->nullable();

            // Add phone column (string)
            $table->string('phone')->nullable();

            // Add country column (string)
            $table->string('country')->nullable();

            // Add gender column (enum with 'male', 'female', 'other' options)
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop surname, phone, country, and gender columns
            $table->dropColumn('surname');
            $table->dropColumn('phone');
            $table->dropColumn('country');
            $table->dropColumn('gender');
        });
    }
}
