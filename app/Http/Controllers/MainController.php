<?php

namespace App\Http\Controllers;

use App\Services\Worklist\WorklistService;

class MainController extends Controller
{
    public function __construct(WorklistService $workListService)
    {
        $this->worklistService = $workListService;
    }

    function index()
    {
        $this->worklistService->calculate();
    }
}
