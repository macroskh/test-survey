<?php

namespace App\Http\Controllers;

use App\Actions\StoreSubmission;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Resources\SubmissionResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubmissionController extends Controller
{
    public function store(StoreSubmissionRequest $request, StoreSubmission $action): SubmissionResource
    {
        return new SubmissionResource(
            $action($request->unit_analysis_id, $request->answers)
        );
    }
}
