<?php

namespace Hareland\LaravelFormSubmissions\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            if (empty($model->uuid)) {
                $model::unguard();
                $model->setAttribute('uuid', Str::uuid()->toString());
                $model::reguard();
            }
        });
    }

    public static function findByUuid(string $uuid): ?self
    {
        return static::where('uuid', $uuid)->first();
    }

    public static function findByUuidOrFail(string $uuid): self
    {
        return static::where('uuid', $uuid)->firstOrFail();
    }
}
