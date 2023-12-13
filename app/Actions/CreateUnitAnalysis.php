<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\UnitAnalysis;

class CreateUnitAnalysis
{
    public function __invoke(int $userId, int $typeId, string $title): UnitAnalysis
    {
        $model = new UnitAnalysis([
            'user_id' => $userId,
            'type_id' => $typeId,
            'title' => $title
        ]);

        $model->save();

        return $model;
    }
}
