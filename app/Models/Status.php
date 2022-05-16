<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;
    protected $dates = ['updated_at', 'created_at', 'deadline_at', 'tanggal_dibuat', 'tanggal_dikumpul'];
    protected $fillable = ['status_id', 'status_name'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}