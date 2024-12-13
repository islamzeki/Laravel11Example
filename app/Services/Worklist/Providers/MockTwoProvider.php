<?php

namespace App\Services\Worklist\Providers;

use App\Services\Worklist\Concerns\WorklistConcern;
use App\Services\Worklist\Contracts\WorklistContract;

class MockTwoProvider implements WorklistContract
{
    use WorklistConcern;

    public function providerId(): int
    {
        return 2;
    }

    public function getServiceUrl(): string
    {
        return 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-two';
    }

    public function getProviderIssueIdKeyName(): string
    {
        return 'id';
    }

    public function getDifficultyKeyName(): string
    {
        return 'zorluk';
    }

    public function getDurationKeyName(): string
    {
        return 'sure';
    }
}
