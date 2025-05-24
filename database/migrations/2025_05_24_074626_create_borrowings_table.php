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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id(); // primary key, auto-increment
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade'); // foreign key ke tabel members
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade'); // foreign key ke tabel books
            $table->date('borrowed_date');
            $table->date('due_date');
            $table->date('returned_date')->nullable();
            $table->string('status'); // contoh: 'borrowed', 'returned', 'overdue'
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
