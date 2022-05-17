<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('tasks')
            ->join('mata_pelajaran', 'tasks.mata_pelajaran_id', '=', 'mata_pelajaran.id')
            ->join('statuses', 'tasks.status_id', '=', 'statuses.id')
            ->select('tasks.id', 'tasks.status_id', 'tasks.judul_tugas', 'tasks.deskripsi_tugas', 'tasks.deadline_at', 'tasks.tanggal_dibuat', 'tasks.tanggal_dikumpul', 'mata_pelajaran.mata_pelajaran', 'statuses.status_name');

        if (request('mata_pelajaran')) {
            $tasks = $tasks->where('mata_pelajaran', request('mata_pelajaran'));
        }

        return view('tugas.semua_tugas', [
            'title' => 'Semua Tugas',
            'tasks' => $tasks->get(),
            'mataPelajaran' => MataPelajaran::All(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd(date('d-m-Y h:i:s'));
        return view('tugas.tugas_baru', [
            'title' => 'Tambah Tugas Baru',
            'mataPelajaran' => MataPelajaran::All(),
            // 'tanggalSekarang' => new DateTime('now'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request());
        //
        $validateData = $request->validate([
            'status_id' => 'required',
            'mata_pelajaran_id' => 'required',
            'judul_tugas' => 'required|max:255',
            'deskripsi_tugas' => 'required',
            'deadline_at' => 'required',
            'tanggal_dibuat' => 'required',
            'tanggal_dikumpul' => 'required',
        ]);

        Task::create($validateData);

        return redirect('/semua_tugas/create')->with('success', 'Tugas baru sudah dibuat!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = DB::table('tasks')
            ->join('mata_pelajaran', 'tasks.mata_pelajaran_id', '=', 'mata_pelajaran.id')
            ->join('statuses', 'tasks.status_id', '=', 'statuses.id')
            ->select('tasks.id', 'tasks.status_id', 'tasks.judul_tugas', 'tasks.deskripsi_tugas', 'tasks.deadline_at', 'tasks.tanggal_dibuat', 'tasks.tanggal_dikumpul', 'mata_pelajaran.mata_pelajaran', 'statuses.status_name')
            ->where('tasks.id', $id);

        return view('tugas.detail_tugas', [
            'task' => $task->get()[0],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}