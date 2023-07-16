<?php

namespace Hareland\LaravelFormSubmissions\Models;

use Hareland\LaravelFormSubmissions\Concerns\HasFormSubmissions;
use Hareland\LaravelFormSubmissions\Concerns\HasUuid;
use Hareland\LaravelFormSubmissions\Enums\FormStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $uuid
 * @property int $owner_id
 * @property string $owner_type
 * @property FormStatus $status
 * @property string|null $redirect
 * @property string|null $forward_to_email
 * @property bool $wildcard_submission
 * @property bool $force_validation
 * @property array|null $validation_rules
 * @property array|null $rules
 * @property array|null $submission_rules
 * @property array|null $pages
 * @property array|null $closed_page
 * @property array|null $thank_you_page
 */
class Form extends Model
{
    use HasUuid;

//    use HasFactory;
    use HasFormSubmissions;

    protected $table = 'form_sub__forms';

    protected $fillable = [
        'id', //pk
        'uuid', // uuid|unique
        'owner_id', // morphs
        'owner_type', // morphs
        'status',//string|default:draft
        'redirect',//string|nullable|default:null
        'forward_to_email', //string|nullable (IF Not NULL: Forward to provided email)
        'wildcard_submission',//boolean|default:false
        'force_validation', //boolean|default:false
        'validation_rules', //json|nullable|default:null
        'rules', //json|nullable|default:null
        'submission_rules', //json|nullable|default:null
        'pages', //json|nullable|default:null
        'closed_page',//json|nullable|default:null
        'thank_you_page', //json|nullable|default:null
    ];

    protected $casts = [
        'validation_rules' => 'array',
        'submission_rules' => 'array',
        'rules' => 'array',
        'pages' => 'array',
        'closed_page' => 'array',
        'thank_you_page' => 'array',
        'force_validation' => 'bool',
        'wildcard_submission' => 'bool',
        'status' => FormStatus::class,
    ];

    public function owner(): MorphTo
    {
        return $this->morphTo('owner');
    }
}
