<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

use App\Filters\QueryFilter;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function getOptions(string $propertyName = null)
    {
        if (!is_null($propertyName)) {
            return $this->offers()->with($propertyName)->get()->pluck($propertyName);
        }
        return collect();
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters): Builder
    {
        return $filters->apply($builder);
    }

}
