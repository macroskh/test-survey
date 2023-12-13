<?php

namespace App\Http\Requests;

use App\Rules\FullFilledSurveyRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $unit_analysis_id
 * @property array $answers
 */
class StoreSubmissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
//            'survey_id' => ['required', 'int', 'exists:surveys,id'],
            'unit_analysis_id' => ['required', 'int', 'exists:unit_analyses,id'],
            'answers' => ['required', 'array', new FullFilledSurveyRule()]
        ];
    }
}
