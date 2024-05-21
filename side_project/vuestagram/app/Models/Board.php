<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'content',
        'img',
        'like',
    ];

    /**
     * 
     */

     protected function serializeDate(\DateTimeInterface $date)
     {
         return $date->format('Y-m-d H:i:s');
     }

    public function users() {
        return $this->belongsTo(User::class);
    }

}
