<?php

use Hareland\LaravelFormSubmissions\Models\Form;
use Hareland\LaravelFormSubmissions\Models\FormSubmission;

return [
    'support' => [
        'files' => false,
    ],

    'models' => [
        'form' => Form::class,
        'submission' => FormSubmission::class,
    ]
];