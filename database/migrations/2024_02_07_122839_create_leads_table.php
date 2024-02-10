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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('title',100);
            $table->string('company',100);
            $table->string('phone',100);
            $table->string('email')->nullable();
            $table->string('lead_source',100)->nullable();
            $table->string('lead_status',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('address',500)->nullable();
            $table->string('zipcode',100)->nullable();
            $table->string('street',200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
