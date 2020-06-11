<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->bigInteger('inn');
            $table->text('information');
            $table->bigInteger('director_id')->unsigned();
            $table->string('address');
            $table->string('phone_number');
            $table->timestamps();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('director_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
