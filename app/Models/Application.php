<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'decription',
        'id_user',
        'id_status',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
