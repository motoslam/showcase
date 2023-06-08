<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    public function color($id): Builder
    {
        return $this->builder->whereHas('offers', function (Builder $query) use ($id) {
            $query->where('color_id', $id);
        });
    }

    public function size($id): Builder
    {
        return $this->builder->whereHas('offers', function (Builder $query) use ($id) {
            $query->where('size_id', $id);
        });
    }
}
