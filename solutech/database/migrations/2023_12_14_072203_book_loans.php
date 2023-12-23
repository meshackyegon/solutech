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
        Schema::create('book_loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('book_id');
            $table->date('loan_date');
            $table->date('due_date');
            $table->date('return_date');
            $table->string('extended');
            $table->date('extension_date');
            $table->integer('penalty_amount');
            $table->string('penalty_status');
            $table->string('status');
            $table->integer('added_by');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        
    }
};
