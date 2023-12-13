<?php

namespace Database\Seeders;

use App\Enums\QuestionType;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
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
                'text' => 'Year of Admission'
            ]);

        $question2 = Question::factory()
            ->state([
                'order' => 2,
                'type' => QuestionType::Dropdown,
                'text' => 'AVERAGE SCORE',
                'options' => json_encode([
                    '60-74',
                    '75-89',
                    '90-100'
                ])
            ]);

        $survey = Survey::factory()
            ->has($question1)
            ->has($question2);

        Type::factory()
            ->has($survey)
            ->create([
                'name' => 'Students'
            ]);
    }
}
