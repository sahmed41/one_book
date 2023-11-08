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
        Schema::table('books', function (Blueprint $table) {
            // Adding more columns to books table: defining
            Schema::table('books', function ($table) {
                $table->string('title')->after('id');
                $table->string('author')->after('title');
                $table->decimal('price')->after('author');
                $table->integer('stock')->after('price');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Adding more columns to books table: adding
            Schema::table('users', function ($table) {
                $table->dropColumn('title');
                $table->dropColumn('author');
                $table->dropColumn('price');
                $table->dropColumn('stock');
            });
        });
    }
};
