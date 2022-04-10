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
            $table->string('company_name')->default('E-Magani');
            $table->string('company_address')->default('Laboratoire R-LAntis');
            $table->string('company_phone')->default('+216 55 519 215/224');
            $table->string('company_email')->default('emagani@gmail.com');
            $table->string('company_fax')->default('+216 00 000 000');
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
        Schema::dropIfExists('companies');
    }
}
