<?php

namespace Hareland\LaravelFormSubmissions\Models;

use Hareland\LaravelFormSubmissions\Concerns\HasFormSubmissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class Form extends Model
{
    use HasFactory;
    use HasFormSubmissions;

    protected $table = 'form_sub__forms';

    protected $fillable = [
        'id', //pk
        'uuid', // uuid|unique
        'owner_id', // morphs
        'owner_type', // morphs
        'forward_to_email', //string|nullable (IF Not NULL: Forward to provided email)
        'wildcard_submission',//boolean|default:false
        'force_validation', //boolean|default:false
        'validation_rules', //json|nullable|default:null
        'rules', //json|nullable|default:null
        'submission_rules', //json|nullable|default:null
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

    public function owner(): MorphTo
    {
        return $this->morphTo('owner');
    }
}
