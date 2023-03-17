<?php

namespace App\Traits;
use Illuminate\Foundation\Bootstrap\BootProviders;
use Illuminate\Support\Str;

/**
 * 
 */
trait Uuids
{
    protected static function bootUuids()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}
