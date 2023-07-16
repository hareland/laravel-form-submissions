<?php

namespace Hareland\LaravelFormSubmissions\Concerns;


use Hareland\LaravelFormSubmissions\Models\Form;
use Hareland\LaravelFormSubmissions\Models\FormSubmission;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFormSubmissions
{
    public function submissions(): MorphMany
    {
        return $this->morphMany(
            config('laravel-form-submissions.models.submission', FormSubmission::class),
            'submissable'
        );
    }
}