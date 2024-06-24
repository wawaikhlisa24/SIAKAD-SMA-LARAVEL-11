<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'informasi',
        'tanggal',
        'jam',
    ];

    /** auto generate id */
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $getLatest = self::orderBy('id', 'desc')->first();

            if ($getLatest) {
                $latestID = $getLatest->id;
                $nextID = $latestID + 1;
            } else {
                $nextID = 1;
            }
            $model->id = $nextID;
        });
    }
}
