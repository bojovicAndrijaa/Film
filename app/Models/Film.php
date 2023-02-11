<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'duration', 'award'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kategorija(){
        return $this->belongsTo(Kategorija::class);
    }

    public function reziser(){
        return $this->belongsTo(Reziser::class);
    }

}
