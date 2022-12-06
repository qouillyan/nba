<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function players() {
        return $this->hasMany(Player::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        $this->comments()->create([
            'body' => $body, 
            'user_id' => auth()->id(), 
            'team_id' => auth()->id()
        ]);
    }
}
