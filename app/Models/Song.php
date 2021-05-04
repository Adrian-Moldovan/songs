<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','genre_id'];


    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function artists(){
        return $this->belongsToMany(Artist::class);
    }
}
