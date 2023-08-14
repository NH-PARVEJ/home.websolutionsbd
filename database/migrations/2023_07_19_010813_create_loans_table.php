<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('money');
            $table->integer('type')->default(1)->comment('1=Intertainment, 2=Cash');
            $table->integer('instalment');
            $table->integer('payment_terms')->default(1)->comment('1=Day 2=Month');
            $table->string('each_instalment_pay');
            $table->text('note')->nullable();
            $table->integer('user_id');
            $table->integer('status')->default(1)->comment('1=Panding 2=Approved 3=Cancelled 4=Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
