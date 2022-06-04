<?php
namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MyHelpers
{
    // membuat fungsi untuk mengubah string menjadi date
    public static function strtodate($string)
    {
        return new Carbon($string);
    }

    // membuat fungsi untuk menampilkan data tugas dari database
    public static function tasks()
    {
        // mengambil data dari table tasks
        return DB::table('tasks')
        // menggabungkan data tasks dengan table mata pelajaran
            ->join('mata_pelajaran', 'tasks.mata_pelajaran_id', '=', 'mata_pelajaran.id')
        // menggabungkan data tasks dengan table statuses
            ->join('statuses', 'tasks.status_id', '=', 'statuses.id')
        // memilih data apa saja yang akan di tampilkan saat data di tampilkan
            ->select('tasks.id', 'tasks.status_id', 'tasks.media_tugas', 'tasks.judul_tugas', 'tasks.deskripsi_tugas', 'tasks.deadline_at', 'tasks.tanggal_dibuat', 'tasks.tanggal_dikumpul', 'mata_pelajaran.mata_pelajaran', 'statuses.status_name');
    }
}