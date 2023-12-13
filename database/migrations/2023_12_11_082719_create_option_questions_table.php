<?php

use App\Models\Question;
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
        Schema::create('option_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Question::class);
            $table->string('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('option_questions', function (Blueprint $table) {
            $table->dropForeignIdFor(Question::class);
        });

        Schema::dropIfExists('option_questions');
    }
};
