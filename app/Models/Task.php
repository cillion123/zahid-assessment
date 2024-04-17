<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public static $STATUS_TODO = 'Todo';
    public static $STATUS_INPROGRESS = 'In Progress';
    public static $STATUS_DONE = 'Done';
}
