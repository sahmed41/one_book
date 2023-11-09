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
        Schema::create('book_issuances', function (Blueprint $table) {
            $table->id ();
            $table->integer('book');
            $table->integer('member');
            $table->timestamp('issue_on');
            $table->boolean('returned')->nullable();;
            $table->dateTime('returned_on')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_issuances');
    }
};
