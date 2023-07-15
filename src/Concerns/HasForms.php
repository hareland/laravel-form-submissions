<?php

namespace Hareland\LaravelFormSubmissions\Concerns;


use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasForms
{
    public function forms(): MorphMany
    {
        return $this->morphMany(
            static::class,
            'owner'
        );
    }
}