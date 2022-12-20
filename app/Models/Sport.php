<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Sport extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'country',
        'description'
        
    ];

    public function team(){
        return $this->hasMany(Team::class);
    }
}
