<?php

use App\Enums\QuestionType;
use App\Models\Survey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order');
            $table->foreignIdFor(Survey::class);
            $table->enum('type', array_column(QuestionType::cases(), 'value'));
            $table->string('text'); // enough?
            $table->json('options')->nullable();
            $table->timestamps();
        });

//        DB::table('')
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeignIdFor(Survey::class);
        });

        Schema::dropIfExists('questions');
    }
};
