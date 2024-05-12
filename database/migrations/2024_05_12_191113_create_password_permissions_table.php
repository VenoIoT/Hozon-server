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
        Schema::create('password_permissions', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->ulid('password_id');
            $table->foreign('password_id')->references('id')->on('passwords')->onDelete('cascade')->onUpdate('cascade');

            $table->ulid('employee_id');
            $table->foreign('employee_id')->references('id')->on('organization_employees')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_permissions');
    }
};
