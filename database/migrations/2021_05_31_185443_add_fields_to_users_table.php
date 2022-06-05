<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();

        Schema::table('users', function (Blueprint $table)use($driver) {

            if ('sqlite' === $driver) {
                $table->string('address')->default('0');
                $table->string('number')->default('0');
                $table->string('cellphone')->default('0');
                $table->string('city')->default('0');
                $table->string('state')->default('0');
            } else {
                $table->string('address');
                $table->string('number');
                $table->string('cellphone');
                $table->string('city');
                $table->string('state');
            }


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
            $table->dropColumn('address');
            $table->dropColumn('number');
            $table->dropColumn('cellphone');
            $table->dropColumn('city');
            $table->dropColumn('state');
        });
    }
}
