<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // fungsi untuk tampilan index dashboard
    public function index()
    {
        // membuat wadah untuk menampung data yang akan di kiring ke view
        $tugasDibuatMingguIni = collect([]);
        $belumSelesaiMingguIni = collect([]);
        $sudahSelesaiMingguIni = collect([]);
        $tenggatMingguIni = collect([]);
        $tugasLewatWaktu = collect([]);
        $tugasLewatWaktuMingguIni = collect([]);

        // mengambil semua data tugas dari database
        $tasks = Task::where('user_id', Auth::user()->id)->get();
        // melooping data tugas dengan looping for
        for ($i = 0; $i < count($tasks); $i++) {
            $task = $tasks[$i];
            /*
            pengkondisian untuk tugas yang di tambahkan seminggu terakhir
            jika data created_at yang ada di table task -> days lebih kecil dari 7
            maka data tugas akan di masukkan ke wadah tugasDibuatMingguIni
             */
            if ($task['created_at']->diff()->days <= 7 && $task['updated_at']->diff()->invert == 0) {
                $tugasDibuatMingguIni[] = $task;
            }

            /*
            pengkondisian untuk tugas yang di tambahkan seminggu terakhir dan statusnya belum selesai
            jika data deadline_at yang ada di table task -> days lebih kecil dari 7
            maka data tugas akan di masukkan ke wadah belumSelesaiMingguIni
             */
            if ($task['deadline_at']->diff()->days <= 7 && $task['status_id'] == 0 && $task['deadline_at']->diff()->invert == 1) {
                $belumSelesaiMingguIni[] = $task;
            }

            /*
            pengkondisian untuk tugas yang di tambahkan seminggu terakhir dan statusnya sudah selesai
            jika data updated_at yang ada di table task -> days lebih kecil dari 7
            maka data tugas akan di masukkan ke wadah sudahSelesaiMingguIni
             */
            if ($task['updated_at']->diff()->days <= 7 && $task['status_id'] == 1 && $task['updated_at']->diff()->invert == 0) {
                $sudahSelesaiMingguIni[] = $task;
            }

            /*
            pengkondisian untuk tugas yang di tambahkan seminggu terakhir dan statusnya belum selesai ataupun sudah selesai
            jika data deadline_at yang ada di table task -> days lebih kecil dari 7
            maka data tugas akan di masukkan ke wadah tenggatMingguIni
             */
            if ($task['deadline_at']->diff()->days <= 7 && $task['deadline_at']->diff()->invert == 1) {
                $tenggatMingguIni[] = $task;
            }

            /*
            pengkondisian untuk tugas dengan status belum selesai dan sudah melebihi dari waktu deadline_at
            maka data tugas akan di masukkan ke wadah tugasLewatWaktu
             */
            if ($task['status_id'] == 0 && $task['deadline_at']->diff()->invert == 0) {
                $tugasLewatWaktu[] = $task;
            }

            /*
            pengkondisian untuk tugas yang di tambahkan seminggu terakhir dengan status belum selesai
            jika data deadline_at yang ada di table task -> days lebih kecil dari 7
            maka data tugas akan di masukkan ke wadah tugasLewatWaktuMingguIni
             */
            if ($task['deadline_at']->diff()->invert == 0 && $task['status_id'] == 0 && $task['deadline_at']->diff()->days <= 7) {
                $tugasLewatWaktuMingguIni[] = $task;
            }
        }

        /*
        mengembalikan/ menampilkan data yang ada di view folder dashboard dengan nama index.blade.php
        dan mengirimkan data yang ada di wadah ke view
         */
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'tasks' => Task::where('user_id', Auth::user()->id)->orderBy('deadline_at', 'desc'),
            'tugasDibuatMingguIni' => $tugasDibuatMingguIni,
            'belumSelesaiMingguIni' => $belumSelesaiMingguIni,
            'sudahSelesaiMingguIni' => $sudahSelesaiMingguIni,
            'tenggatMingguIni' => $tenggatMingguIni,
            'tugasLewatWaktu' => $tugasLewatWaktu,
            'tugasLewatWaktuMingguIni' => $tugasLewatWaktuMingguIni,
        ]);
    }
}