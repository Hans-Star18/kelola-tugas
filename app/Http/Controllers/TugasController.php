<?php

namespace App\Http\Controllers;

use App\Helpers\MyHelpers;
use App\Models\MataPelajaran;
use App\Models\Task;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $tasks = MyHelpers::tasks();
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
        return view('tugas.tugas_baru', [
            'title' => 'Tambah Tugas Baru',
            'mataPelajaran' => MataPelajaran::All(),
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
        return view('tugas.detail_tugas', [
            'task' => MyHelpers::tasks()->where('tasks.id', $id)->first(),
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setor_tugas()
    {
        //
        return view('tugas.setor_tugas', [
            'title' => 'Setor Tugas',
            'tasks' => MyHelpers::tasks()->get()->where('status_id', 0),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setor(Request $request)
    {
        //
    }
}