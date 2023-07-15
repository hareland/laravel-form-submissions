<?php

namespace Hareland\LaravelFormSubmissions\Concerns;


use Hareland\LaravelFormSubmissions\Models\Form;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasForms
{
    public function forms(): MorphMany
    {
        return $this->morphMany(
            config('laravel-form-submissions.models.form', Form::class),
            'owner'
        );
    }
}