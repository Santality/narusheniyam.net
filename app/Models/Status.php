<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_status',
    ];

    public $timestamps = false;

    public function applications()
    {
        return $this->hasMany(Application::class, 'id_status');
    }
}
