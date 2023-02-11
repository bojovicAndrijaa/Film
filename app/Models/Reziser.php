<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;


class Reziser extends Model
{
    use HasFactory;

    protected $fillable=[
        'firstName',
        'lastName',
        'birthYear',
        
    ];

    public function films(){
        return $this->hasMany(Flim::class);
    }

}
