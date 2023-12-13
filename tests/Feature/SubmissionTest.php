<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_should_submit_students_survey(): void
    {
        $user = User::factory()->create();

        /** @var Type $type */
        $type = Type::query()
            ->where('name', 'Students')
            ->first();

        $response = $this->actingAs($user)
            ->post(route('unit.store'), [
                'type_id' => $type->id,
                'title' => 'Test title'
            ]);

        $response->assertStatus(201);

        $unit = $response->json('data');

        /** @var Question $question1 */
        $question1 = Question::hasType($type->id)
            ->where('text', 'Year of Admission')
            ->first();
        /** @var Question $question2 */
        $question2 = Question::hasType($type->id)
            ->where('text', 'AVERAGE SCORE')
            ->first();

        $answers = [
            $question1->text => 'Test value Year of Admission',
            $question2->text => $question2->options[2]
        ];

        $response = $this->post(route('submission.store'), [
            'unit_analysis_id' => $unit['id'],
            'answers' => $answers
        ]);

        $response->assertStatus(201);

        $submission = $response->json('data');

        $this->assertEquals(json_encode($answers), $submission['result']);
    }

    /**
     * @test
     */
    public function it_should_submit_teachers_survey(): void
    {
        $user = User::factory()->create();

        /** @var Type $type */
        $type = Type::query()
            ->where('name', 'Teachers')
            ->first();

        $response = $this->actingAs($user)
            ->post(route('unit.store'), [
                'type_id' => $type->id,
                'title' => 'Test title'
            ]);

        $response->assertStatus(201);

        $unit = $response->json('data');

        /** @var Question $question1 */
        $question1 = Question::hasType($type->id)
            ->where('text', 'Degree')
            ->first();
        /** @var Question $question2 */
        $question2 = Question::hasType($type->id)
            ->where('text', 'Lessons')
            ->first();

        $answers = [
            $question1->text => 'Test value Degree',
            $question2->text => [
                $question2->options[0],
                $question2->options[1],
            ]
        ];

        $response = $this->post(route('submission.store'), [
            'unit_analysis_id' => $unit['id'],
            'answers' => $answers
        ]);

        $response->assertStatus(201);

        $submission = $response->json('data');

        $this->assertEquals(json_encode($answers), $submission['result']);
    }
}
