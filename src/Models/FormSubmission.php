<?php

namespace Hareland\LaravelFormSubmissions\Models;

use Hareland\LaravelFormSubmissions\Concerns\BelongsToForm;
use Hareland\LaravelFormSubmissions\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class FormSubmission extends Model
{
    use HasUuid;

//    use HasFactory;
    use BelongsToForm;

    protected $table = 'form_sub__submissions';

    protected $fillable = [
        'id', //pk
        'uuid',//uuid|unique
        'submissable_id',//morph|id
        'submissable_type',//morph|class
        'data',//json|nullable
        'created_at',//timestamps
        'updated_at',//timestamps
    ];

    protected $casts = [
        'data' => 'array',
    ];

}
