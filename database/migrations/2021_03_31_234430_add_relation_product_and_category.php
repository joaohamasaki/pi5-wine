<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationProductAndCategory extends Migration
{

    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();

        Schema::table('products', function (Blueprint $table)use ($driver) {

            if ('sqlite' === $driver) {
                $table->integer('category_id')->default(0);
            } else {
                $table->integer('category_id');
            }
        });
    }


    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
}
