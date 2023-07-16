<?php

namespace Hareland\LaravelFormSubmissions\Enums;


enum FormStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';

    case CLOSED = 'closed';
}