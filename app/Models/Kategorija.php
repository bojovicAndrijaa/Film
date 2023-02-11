<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Film;

class Kategorija extends Model
{
    use HasFactory;

    
    protected $fillable=[
        'id',
        'name',
    ];

    public function film(){
        return $this->hasMany(Flim::class);
    }


}
