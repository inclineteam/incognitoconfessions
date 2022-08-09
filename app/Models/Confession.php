<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confession extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "to",
        "content",
        'user_id',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('content', 'like', '%' . request('search') . '%')->orWhere('name', 'like', '%' . request('search') . '%')->orWhere('to', 'like', '%' . request('search') . '%');
        }
    }

    public function confesser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
