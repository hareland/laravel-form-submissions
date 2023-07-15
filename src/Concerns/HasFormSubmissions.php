<?php

namespace Hareland\LaravelFormSubmissions\Concerns;


use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFormSubmissions
{
    public function submissions(): MorphMany
    {
        return $this->morphMany(
            get_class($this),
            'submissable'
        );
    }
}