<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use App\Traits\ApiResponseTrait;

class SpeakerController extends Controller
{
    use ApiResponseTrait;

    public function getSpeakerModules()
    {
        $speaker = Speaker::all();

        return $this->successResponse($speaker, 'List of modules for the speaker');
    }
}
