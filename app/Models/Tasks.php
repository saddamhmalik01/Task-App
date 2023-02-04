<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'status'=> TaskStatusEnum::class
    ];

    protected $fillable = ['title','description','due_date','status'];
}
