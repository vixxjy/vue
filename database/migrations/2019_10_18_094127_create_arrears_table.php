<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrears', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('debtor');
            $table->string('creditor');
            $table->string('contact');
            $table->string('arrears_owed');
            $table->string('billing_date');
            $table->string('amount_settled');
            $table->string('nature_of_debt');
            $table->string('contract_terms');
            $table->string('file_reference');
            $table->string('economic_category');
            $table->string('comments');
            $table->string('arrears_state');
            $table->string('arrears_type');
            $table->string('slug');
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
        Schema::dropIfExists('arrears');
    }
}
