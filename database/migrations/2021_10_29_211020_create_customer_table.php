<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('fname_contact');
            $table->string('lname_contact');
            $table->string('company');
            $table->string('nit');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            
            $table->foreignId('id_companies')
                    ->nullable()
                    ->constrained('companies')
                    ->restrictOnUpdate()
                    ->nullOnDelete();
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
        Schema::dropIfExists('customer');
    }
}
