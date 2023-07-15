<?php

namespace Hareland\LaravelFormSubmissions\Models;

use Hareland\LaravelFormSubmissions\Concerns\BelongsToForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class FormSubmission extends Model
{
    use HasFactory;
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

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Model $model) {
            if (empty($model->uuid)) {
                $model::unguard();
                $model->setAttribute('uuid', Str::uuid()->toString());
                $model::reguard();
            }
        });
    }
}
