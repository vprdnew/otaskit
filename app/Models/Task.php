<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Task extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'task';

    public function assignee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
