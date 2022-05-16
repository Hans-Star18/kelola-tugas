<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['updated_at', 'created_at', 'deadline_at', 'tanggal_dibuat', 'tanggal_dikumpul'];
    // protected $timestamps = false;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }
}