<?php

namespace App\Http\Controllers;

use App\Actions\CreateUnitAnalysis;
use App\Http\Requests\StoreUnitAnalysisRequest;
use App\Http\Resources\UnitAnalysisResource;
use Illuminate\Http\Request;

class UnitAnalysisController extends Controller
{
    public function store(StoreUnitAnalysisRequest $request, CreateUnitAnalysis $action): UnitAnalysisResource
    {
;
        return new UnitAnalysisResource(
            $action($request->user()->id, $request->type_id, $request->title)
        );
    }
}
