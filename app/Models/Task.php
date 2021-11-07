<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
    ];

    protected $guarded = [

    ];

    protected $attributes = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
