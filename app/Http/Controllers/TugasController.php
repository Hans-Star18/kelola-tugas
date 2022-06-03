<?php

namespace App\Http\Controllers;

use App\Helpers\MyHelpers;
use App\Models\Answer;
use App\Models\MataPelajaran;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $semuaMedia = $request->allFiles();
        $namaFile = [];
        foreach ($semuaMedia as $media) {
            $nama = Str::lower($media->hashName());

            $extensions = ['png', 'jpg', 'jpeg', 'pdf'];
            $nama = explode('.', $nama);
            for ($i = 0; $i < count($extensions); $i++) {
                if ($nama[1] == $extensions[$i]) {
                    $uploadName = implode('.', $nama);
                    $media->move('media', $uploadName);
                    $namaFile[] = $uploadName;
                };
            }

        }

        $validateData = $request->validate([
            'status_id' => 'required',
            'mata_pelajaran_id' => 'required',
            'judul_tugas' => 'required|max:255',
            'deskripsi_tugas' => '',
            'deadline_at' => 'required',
            'tanggal_dibuat' => '',
            'tanggal_dikumpul' => '',
        ]);
        $validateData['media_tugas'] = json_encode($namaFile);

        Task::create($validateData);

        return redirect('/tugas/create')->with('success', 'Tugas baru sudah dibuat!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (request('content_type')) {
            header("content-type: ", request('content_type'));
            readfile('media/' . request('media') . '');
        }

        return view('tugas.detail_tugas', [
            'task' => MyHelpers::tasks()->where('tasks.id', $id)->first(),
            'answers' => Answer::All(),
            'answer' => Answer::where('id_task', $id)->first(),
            'mataPelajaran' => MataPelajaran::All(),
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
     * @param  int  $
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $gambarLama = collect(explode(',', $request->gambar_lama));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Task $task)
    {
        //
        if ($task->find($id)->media_tugas) {
            $media = json_decode($task->find($id)->media_tugas);
            foreach ($media as $m) {
                unlink('media/' . $m);
            }
        }
        Task::destroy($id);
        return redirect('/tugas')->with('success', 'Tugas Sudah Terhapus!!!');
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
            'mataPelajaran' => MataPelajaran::All(),
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
        $semuaMedia = $request->allFiles();
        $namaFile = [];
        foreach ($semuaMedia as $media) {
            $nama = Str::lower($media->hashName());

            $extensions = ['png', 'jpg', 'jpeg', 'pdf'];
            $nama = explode('.', $nama);
            for ($i = 0; $i < count($extensions); $i++) {
                if ($nama[1] == $extensions[$i]) {
                    $uploadName = implode('.', $nama);
                    $media->move('media', $uploadName);
                    $namaFile[] = $uploadName;
                };
            }

        }

        $validateData = $request->validate([
            'isi_jawaban' => '',
            'id_task' => 'required',
            'komentar' => '',
        ]);
        $validateData['media_jawaban'] = json_encode($namaFile);

        Answer::create($validateData);
        Task::where("id", $request->id_task)->update([
            'status_id' => 1,
        ]);

        return redirect('/tugas')->with('success', 'Tugas Sudah Terkumpul!!!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_data_tugas()
    {
        echo json_encode(MyHelpers::tasks()->get()->where('id', request('id'))->first());
    }
}