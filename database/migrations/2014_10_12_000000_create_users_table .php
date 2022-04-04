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
            $table->string('email')->unique();
            $table->string('fonction');
            $table->string('pharmacie_nom')->nullable();
            $table->string('num_reference');
            $table->date('dateNaiss');
            $table->string('pays');
            $table->string('ville');
            $table->string('codePostal');
            $table->string('numTel');
            $table->string('sexe');
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
