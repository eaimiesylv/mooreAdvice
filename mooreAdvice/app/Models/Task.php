<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
        'taskname',
        'taskdescription',
        'completion_date',
        'created_by',
        'ip'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($tasks) {
            $taskDetails = [
                'ip' => request()->getClientIp(),
                //'hash' => Str::uuid(),
               
            ];

            $tasks->fill($taskDetails);
        });
    }
}
