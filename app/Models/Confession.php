<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confession extends Model
{
    use HasFactory;

    // each confession has 3 id,
    // - confession id
    // - id of the user who confessed
    // - id of the user whom the confesser confessed to

    public function confessBy()
    {
        return $this->belongsTo(Confession::class, 'confesser_id');
    }

    public function confessTo()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
