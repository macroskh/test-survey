<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Submission;

class StoreSubmission
{
    public function __invoke(int $unitAnalysisId, array $answers): Submission
    {
        $model = new Submission([
            'unit_analysis_id' => $unitAnalysisId,
            'result' => json_encode($answers)
        ]);

        $model->save();

        return $model;
    }
}
