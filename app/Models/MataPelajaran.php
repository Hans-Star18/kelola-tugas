<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;
    protected $table = 'mata_pelajaran';
    protected $dates = ['updated_at', 'created_at', 'deadline_at', 'tanggal_dibuat', 'tanggal_dikumpul'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}