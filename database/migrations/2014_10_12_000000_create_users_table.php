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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('image')->nullable();
            $table->string('address')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->integer('gender')->default(1)->comment('1=Male 2=Female');
            $table->integer('role')->default(4)->comment('1=Admin 2=HR 3=Project Manager 4=Employee');
            $table->integer('status')->default(1)->comment('1=Active 2=Inactive');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
