<?php

namespace App\Services\Worklist\Providers;

use App\Services\Worklist\Concerns\WorklistConcern;
use App\Services\Worklist\Contracts\WorklistContract;

class MockOneProvider implements WorklistContract
{
    use WorklistConcern;

    public function providerId(): int
    {
        return 1;
    }

    public function getServiceUrl(): string
    {
        return 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-one';
    }

    public function getProviderIssueIdKeyName(): string
    {
        return 'id';
    }

    public function getDifficultyKeyName(): string
    {
        return 'value';
    }

    public function getDurationKeyName(): string
    {
        return 'estimated_duration';
    }
}
