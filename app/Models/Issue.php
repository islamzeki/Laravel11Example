<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $appends = [
        'complexity'
    ];

    protected function complexity(): Attribute
    {
        return new Attribute(
            get: fn () => $this->duration * $this->difficulty,
        );
    }
}
