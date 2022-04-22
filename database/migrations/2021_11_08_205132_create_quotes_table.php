<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) 
        {
            $table->id();
            $table->string('code');
            $table->string('date');
            $table->string('name_project');
            $table->string('observations');
            $table->string('execution_time');
            $table->string('subtotal');
            $table->string('iva');
            $table->string('total');
            $table->string('value_add');
            $table->string('validity');
            $table->string('status');
            $table->string('fscope');
            $table->string('funit_value');
            $table->string('sscope');
            $table->string('sunit_value');
            $table->string('tscope');
            $table->string('tunit_value');
            $table->string('payment_method');
                $table->foreignId('id_customers')
                    ->nullable()
                    ->constrained('customers')
                    ->restrictOnUpdate()
                    ->nullOnDelete();
                $table->foreignId('id_banks')
                    ->nullable()
                    ->constrained('banks')
                    ->restrictOnUpdate()
                    ->nullOnDelete();  
                $table->foreignId('id_cities')
                    ->nullable()
                    ->constrained('cities')
                    ->restrictOnUpdate()
                    ->nullOnDelete();
                $table->foreignId('id_state')
                    ->nullable()
                    ->constrained('states')
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
        Schema::dropIfExists('quotes');
    }
}
