<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $tugasDibuatMingguIni = collect([]);
        $belumSelesaiMingguIni = collect([]);
        $sudahSelesaiMingguIni = collect([]);
        $tenggatMingguIni = collect([]);
        $tugasLewatWaktu = collect([]);
        $tugasLewatWaktuMingguIni = collect([]);

        $tasks = Task::All();
        for ($i = 0; $i < count($tasks); $i++) {
            $task = $tasks[$i];

            if ($task['tanggal_dibuat']->diff()->days <= 7 && $task['tanggal_dibuat']->diff()->invert == 0) {
                $tugasDibuatMingguIni[] = $task;
            }
            if ($task['deadline_at']->diff()->days <= 7 && $task['status_id'] == 0 && $task['deadline_at']->diff()->invert == 1) {
                $belumSelesaiMingguIni[] = $task;
            }
            if ($task['tanggal_dikumpul']->diff()->days <= 7 && $task['status_id'] == 1 && $task['tanggal_dikumpul']->diff()->invert == 0) {
                $sudahSelesaiMingguIni[] = $task;
            }
            if ($task['deadline_at']->diff()->days <= 7 && $task['deadline_at']->diff()->invert == 1) {
                $tenggatMingguIni[] = $task;
            }
            if ($task['status_id'] == 0 && $task['deadline_at']->diff()->invert == 0) {
                $tugasLewatWaktu[] = $task;
            }
            if ($task['deadline_at']->diff()->invert == 0 && $task['status_id'] == 0 && $task['deadline_at']->diff()->days <= 7) {
                $tugasLewatWaktuMingguIni[] = $task;
            }
        }

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'tasks' => Task::orderBy('deadline_at', 'desc'),
            'tugasDibuatMingguIni' => $tugasDibuatMingguIni,
            'belumSelesaiMingguIni' => $belumSelesaiMingguIni,
            'sudahSelesaiMingguIni' => $sudahSelesaiMingguIni,
            'tenggatMingguIni' => $tenggatMingguIni,
            'tugasLewatWaktu' => $tugasLewatWaktu,
            'tugasLewatWaktuMingguIni' => $tugasLewatWaktuMingguIni,
        ]);
    }
}