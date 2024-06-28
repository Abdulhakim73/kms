<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('branch_users', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branch_users');
    }
};
