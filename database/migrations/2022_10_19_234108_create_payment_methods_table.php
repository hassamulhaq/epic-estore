<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('payment_type_id')->constrained('payment_types')->nullOnDelete();
            $table->string('card_holder_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('valid_year')->nullable();
            $table->string('valid_month')->nullable();
            $table->string('cvc')->nullable();
            $table->string('card_type', 100)->nullable()->comment('debit, credit, mastercard etc');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
};
