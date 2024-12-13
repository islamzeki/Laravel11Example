<?php

namespace App\Services\Worklist\Concerns;

use App\Models\Issue;
use Illuminate\Support\Facades\Http;

trait WorklistConcern
{
    public function getIssues() {
        $response = Http::get($this->getServiceUrl());
        return $response->collect();
    }

    public function save() {
        $issues = $this->getIssues()->map(function ($issue) {
            return [
                'provider_id' => $this->providerId(),
                'provider_issue_id' => $issue[$this->getProviderIssueIdKeyName()],
                'difficulty' => $issue[$this->getDifficultyKeyName()],
                'duration' => $issue[$this->getDurationKeyName()],
            ];
        });

        Issue::upsert($issues->toArray(), ['provider_id', 'provider_issue_id'], ['difficulty', 'duration']);
    }
}
