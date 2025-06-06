<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // app/Models/Todo.php

    protected $fillable = [
        'user_id',
        'title',
        'is_done',
    ];
}
