<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                if (empty($model->slug))
                $model->slug = (string) Str::uuid();
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
