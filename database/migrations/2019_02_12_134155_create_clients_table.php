<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cui');
            $table->string('reg_com');
            $table->text('address');
            $table->string('client_code');
            $table->text('tip_client');
            $table->float('haapia');
            $table->string('contact_name');
            $table->string('contact_position');
            $table->string('contact_tel');
            $table->string('contact_email');
            $table->integer('user_id');
            $table->float('limita_de_credit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
