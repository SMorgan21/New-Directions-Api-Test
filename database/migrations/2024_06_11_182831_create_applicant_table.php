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
        if (!Schema::hasTable('applicant')) {
            Schema::create('applicant', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone');
                $table->string('address1');
                $table->string('county');
                $table->string('country');
                $table->string('post_code');
                $table->boolean('require_dbs_check');
                $table->string('cv')->nullable();
                $table->integer('company_id');
                $table->integer('position_id');
                $table->timestamps();
                $table->softDeletesDatetime('deleted_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant');
    }
};
