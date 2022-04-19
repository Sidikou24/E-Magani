<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {  
            $table->id();
            $table->integer('pharmacien_id')->nullable();
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique()->nullable();
            $table->string('fonction');
            $table->string('pharmacie_nom')->nullable();
            $table->string('pharmacie_id')->nullable();
            $table->string('num_reference')->nullable();
            $table->date('dateNaiss')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('codePostal')->nullable();
            $table->string('numTel')->nullable();
            $table->string('sexe')->nullable();
            $table->foreign('pharmacien_id')->references('id')->on('pharmacies');
            $table->string('image');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
