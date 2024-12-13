<?php

namespace App\Services\Worklist\Contracts;

interface WorklistContract
{
    public function providerId(): int;
    public function getServiceUrl(): string;
    public function getProviderIssueIdKeyName(): string;
    public function getDifficultyKeyName(): string;
    public function getDurationKeyName(): string;
}
