<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'points','id'];

    public function djs()
    {
        return $this->belongsToMany(DJ::class, 'dj_festival');
    }

}
