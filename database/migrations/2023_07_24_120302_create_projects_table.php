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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('website_login_url')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('server_url')->nullable();
            $table->string('server_user_name')->nullable();
            $table->string('server_password')->nullable();
            $table->string('reference_website')->nullable();
            $table->string('requirements')->nullable();
            $table->date('start_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('project_price')->nullable();
            $table->integer('source')->nullable();
            $table->integer('handle_by')->nullable();
            $table->string('assign_to')->nullable();
            $table->date('complete_date')->nullable();
            $table->string('client_name')->nullable();
            $table->integer('status')->default(1)->comment('1=Panding 2=Revision 3=Cancelled 4=Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
