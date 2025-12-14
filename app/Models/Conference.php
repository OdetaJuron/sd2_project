<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;


class Conference extends Model
{
    protected $fillable = [
    'title',
    'description',
    'speakers',
    'start_date',
    'start_time',
    'address',
];

public function users(): BelongsToMany
{
    return $this->belongsToMany(User::class, 'users_conferences', 'conference_id', 'user_id')
        ->withPivot('registered_at')
        ->withTimestamps();
}

}
