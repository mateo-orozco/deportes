<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;
use App\Models\Sport;

class Team extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'sport_id',
        'creation_date',
    ];

    public function player(){
        return $this->hasMany(Player::class);
    }
    public function sport(){
        return $this->belongsTo(Sport::class);
    }
}
