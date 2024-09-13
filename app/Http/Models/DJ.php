<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class DJ extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'djs';

    protected $fillable = [
        'name',
        'age',
        'points',
        'profile_photo',
    ];

    public $timestamps = false;

    public function festivals()
    {
        return $this->belongsToMany(Festival::class, 'dj_festival');
    }

    protected $guard_name = 'web';


}
