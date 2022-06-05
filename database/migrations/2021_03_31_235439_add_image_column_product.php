<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnProduct extends Migration
{
    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();

        Schema::table('products', function (Blueprint $table)use($driver) {
            if ('sqlite' === $driver) {
                $table->string('image')->default('');
            } else {
                $table->string('image');
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
