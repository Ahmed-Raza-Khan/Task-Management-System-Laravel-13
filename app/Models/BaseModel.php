<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

abstract class BaseModel extends Model
{
    public function scopeCreatedToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeUpdatedInLastDays($query, $days = 7)
    {
        return $query->where('updated_at', '>=', now()->subDays($days));
    }

    public function scopeSearch($query, $term, $columns = [])
    {
        return $query->where(function ($q) use ($term, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', "%{$term}%");
            }
        });
    }
}
