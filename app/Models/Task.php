<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'done'
    ];

    public static function booted()
    {
        static::creating(function($task){
            $task->position = self::query()->whereDay('created_at', today())->orderByDesc('position')->first()?->position + 60000;
        });
    }

}
