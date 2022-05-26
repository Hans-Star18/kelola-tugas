<?php
namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MyHelpers
{
    public static function strtodate($string)
    {
        return new Carbon($string);
    }

    public static function tasks()
    {
        return DB::table('tasks')
            ->join('mata_pelajaran', 'tasks.mata_pelajaran_id', '=', 'mata_pelajaran.id')
            ->join('statuses', 'tasks.status_id', '=', 'statuses.id')
            ->select('tasks.id', 'tasks.status_id', 'tasks.media_tugas', 'tasks.judul_tugas', 'tasks.deskripsi_tugas', 'tasks.deadline_at', 'tasks.tanggal_dibuat', 'tasks.tanggal_dikumpul', 'mata_pelajaran.mata_pelajaran', 'statuses.status_name');
    }
}