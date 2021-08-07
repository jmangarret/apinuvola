<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = [];

     /**
     * Get the comments for the blog post.
     */
    public function viajes()
    {
        return $this->hasMany(Viajes::class,'email', 'email');
    }
}
