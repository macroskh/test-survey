<?php

namespace Database\Seeders;

use App\Enums\QuestionType;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $question1 = Question::factory()
            ->state([
                'order' => 1,
                'type' => QuestionType::Input,
                'text' => 'Degree'
            ]);

        $question2 = Question::factory()
            ->state([
                'order' => 2,
                'type' => QuestionType::CheckBox,
                'text' => 'Lessons',
                'options' => json_encode([
                    'Math',
                    'Literature',
                    'Philosophy'
                ])
            ]);

        $survey = Survey::factory()
            ->has($question1)
            ->has($question2);

        Type::factory()
            ->has($survey)
            ->create([
                'name' => 'Teachers'
            ]);
    }
}
