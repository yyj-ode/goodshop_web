<?php

namespace App\Scopes;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class AgeScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('age', '>', 200);
    }
}