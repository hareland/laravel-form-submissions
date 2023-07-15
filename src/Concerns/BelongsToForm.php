<?php

namespace Hareland\LaravelFormSubmissions\Concerns;

use Hareland\LaravelFormSubmissions\Models\Form;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait BelongsToForm
{
    /**
     * @return MorphTo|Form
     */
    public function form(): MorphTo
    {
        return $this->morphTo('submissable');
    }
}