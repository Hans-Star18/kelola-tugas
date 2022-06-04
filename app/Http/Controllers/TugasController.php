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
        // mengambil data tugas dari helper dan memasukan ke variable $tugas
        $tasks = MyHelpers::tasks();

        /*
        mengecek jika ada request get dangan nama mata_pelajaran
        maka data tugas akan di tampilkan berdasarkan mata pelajaran yang dipilih
         */
        if (request('mata_pelajaran')) {
            // mengambil data tugas berdasarkan mata pelajaran yang dipilih
            $tasks = $tasks->where('mata_pelajaran', request('mata_pelajaran'));
        }

        /*
        mengembalikan/ menampilkan data yang ada di view folder tugas dengan nama semua_tugas.blade.php
        dan mengirimkan data yang diperlukan ke view
         */
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
        /*
        mengembalikan/ menampilkan data yang ada di view folder tugas dengan nama tugas_baru.blade.php
        dan mengirimkan data yang diperlukan ke view
         */
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
        // mengambil semua request dengan type=file dan memasukan ke variable $semuaMedia
        $semuaMedia = $request->allFiles();

        // membuat wadah yang akan digunakan untuk menampung semua nama file dari request dengan type=file
        $namaFile = [];

        // mengeluarkan semua media yang ada di variable $semuaMedia dari collection
        foreach ($semuaMedia as $media) {
            /*
            mengambil nama dari file yang sudah dikeluarkan dan mengenkripsinya
            kemuadian memasukannya ke dalam variable $nama
             */
            $nama = Str::lower($media->hashName());

            // membuat variable yang diperuntukan untuk validasi
            $extensions = ['png', 'jpg', 'jpeg', 'pdf'];

            /*
            memecah $nama jika di dalam string terdapat tanda . (tanda titik)
            makan string akan menjadi 2 dan disimpan dalam bentuk array di variable $nama
            array dengan $nama[0] akan menjadi nama, dan array dengan $nama[1] akan menjadi ekstensi
             */
            $nama = explode('.', $nama);

            // jika ekstensi yang di ambil dari $nama[1] sama dengan ekstensi yang ada di $extensions
            if ($nama[1] == $extensions[0] || $nama[1] == $extensions[1] || $nama[1] == $extensions[2] || $nama[1] == $extensions[3]) {
                /*
                maka gabungakan lagi variable $nama[0] dengan $nama[1]
                dengan tanda titik sebagai penghubung dan simpan dalam variable $uploadName
                 */
                $uploadName = implode('.', $nama);

                // memindahkan file yang sudah di upload ke folder public/media dengan nama yang ada di variable $uploadName
                $media->move('media', $uploadName);

                // menambahkan nama file yang sudah di upload ke dalam array $namaFile
                $namaFile[] = $uploadName;
            } else {
                // mengambil nama original untuk menampilkan pesan error
                $nama_ori = $media->getClientOriginalName();

                // jika tidak sama dengan ekstensi yang ada di $extensions
                // maka akan menampilkan pesan error
                session()->flash('error', 'Ekstensi file ' . $nama_ori . ' tidak sesuai, file yang diperbolehkan hanya ' . implode(', ', $extensions));
            }
        }

        if (session('error')) {
            // membuat validasi untuk mengecek apakah semua data yang di inputkan sudah benar
            $rules = [
                'status_id' => 'required|integer|numeric',
                'mata_pelajaran_id' => 'required|integer|numeric',
                'judul_tugas' => 'required|max:255|string',
                'deadline_at' => 'required|date',
            ];

            // menjalankan validasi
            $validateData = $request->validate($rules);

            foreach ($namaFile as $nf) {
                unlink('media/' . $nf);
            }

            return redirect()->back();
        }

        // membuat validasi untuk mengecek apakah semua data yang di inputkan sudah benar
        $rules = [
            'status_id' => 'required|integer|numeric',
            'mata_pelajaran_id' => 'required|integer|numeric',
            'judul_tugas' => 'required|max:255|string',
            'deadline_at' => 'required|date',
        ];

        // menjalankan validasi
        $validateData = $request->validate($rules);

        // menambahkan data lainnya yang tidak perlu di validasi
        $validateData['deskripsi_tugas'] = $request->deskripsi_tugas;
        $validateData['tanggal_dibuat'] = now();
        $validateData['tanggal_dikumpul'] = now();
        $validateData['media_tugas'] = json_encode($namaFile);

        // menyimpan data ke dalam database
        Task::create($validateData);

        // menampilkan pesan sukses dan mengarahkan ke halaman yang dituju
        return redirect('/tugas/create')->with('success', 'Tugas berhasil ditambahkan.');
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
        dd($request);
        // mengambil nama gambar lama jika update dijalankan
        $gambarLama = collect(explode(',', $request->gambar_lama));

        // validasi gambar dan mengambil nama gambar
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

        // validasi data request
        $rules = [
            'status_id' => 'required|boolean|integer',
            'mata_pelajaran_id' => 'required|integer|numeric',
            'deadline_at' => 'required|date',
            'judul_tugas' => 'required|max:255|string',
        ];

        // menjalankan validasi
        $validateData = $request->validate($rules);

        // menambahkan field tanggal
        $validateData['tanggal_dibuat'] = $request->tanggal_dibuat;
        $validateData['tanggal_dikumpul'] = $request->tanggal_dikumpul;

        // catatan
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