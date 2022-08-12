<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confessions extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('content', 'like', '%' . request('search') . '%')->orWhere('name', 'like', '%' . request('search') . '%')->orWhere('to', 'like', '%' . request('search') . '%');
        }
    }
}
