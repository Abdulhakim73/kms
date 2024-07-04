<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('district_id')->unsigned();
            $table->bigInteger('region_id')->unsigned();
            $table->string('street');
            $table->bigInteger('role_id')->unsigned();
            $table->string('language')->default('uz');
            $table->string('password');
            $table->string('phone')->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->enum('status', ['active', 'inactive', 'on_vacation'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('branch_id')->references('id')->on('branches');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
