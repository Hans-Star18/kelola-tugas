<?php

namespace App\Http\Controllers;

use App\Helpers\MyHelpers;
use App\Models\Answer;
use App\Models\MataPelajaran;
use App\Models\Status;
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

        if (request('status')) {
            if (request('status') == 'Sudah Selesai') {
                $status = 1;
            } else {
                $status = 0;
            }
            // mengambil data tugas berdasarkan status yang dipilih
            $tasks = $tasks->where('status_id', $status);
        }

        if (request('search')) {
            // mengambil data tugas berdasarkan keyword yang diinputkan
            $tasks = $tasks->where('judul_tugas', 'like', '%' . request('search') . '%');
        }

        /*
        mengembalikan/ menampilkan data yang ada di view folder tugas dengan nama semua_tugas.blade.php
        dan mengirimkan data yang diperlukan ke view
         */
        return view('tugas.semua_tugas', [
            'title' => 'Semua Tugas',
            'tasks' => $tasks->paginate(10)->withQueryString(),
            'statuses' => Status::All(),
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
            $nama = Str::lower(mt_rand(1, 1000) . '_' . $media->getClientOriginalName());

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
        // mengecek jika ada request dengan nama conten_type, maka akan menampilkan file yang ada di folder public/media
        if (request('content_type')) {
            header("content-type: ", request('content_type'));
            readfile('media/' . request('media') . '');
        }

        /*
        mengembalikan/ menampilkan data yang ada di view folder tugas dengan nama detail_tugas.blade.php
        dan mengirimkan data yang diperlukan ke view
         */
        return view('tugas.detail_tugas', [
            'task' => MyHelpers::tasks()->where('tasks.id', $id)->first(), // mengambil data yang ada di database berdasarkan id yang dikirimkan
            'answers' => Answer::All(), // mengambil semua data di table answers
            'answer' => Answer::where('id_task', $id)->first(), // mengambil data yang ada di table answers berdasarkan id_task yang dikirimkan
            'mataPelajaran' => MataPelajaran::All(), // mengambil semua data di table mata pelajaran
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
        // membuat wadah yang akan digunakan untuk menampung semua nama file dari request dengan type=file
        $namaFile = [];

        // mengambil semua request dengan type=file dan memasukan ke variable $semuaMedia
        $semuaMedia = $request->allFiles();

        // mengeluarkan semua media yang ada di variable $semuaMedia dari collection
        foreach ($semuaMedia as $media) {
            /*
            mengambil nama dari file yang sudah dikeluarkan dan mengenkripsinya
            kemuadian memasukannya ke dalam variable $nama
             */
            $nama = Str::lower(mt_rand(1, 1000) . '_' . $media->getClientOriginalName());

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

            // mengambil nama file yang sudah di upload
            foreach ($namaFile as $nf) {
                // menghapus file yang sudah di upload
                unlink('media/' . $nf);
            }

            // mengarahkan halaman untuk kembali
            return redirect()->back();
        }

        // membuat pengkondisian jika ada gambar lama
        if ($request->gambar_lama) {
            // mengambil nama gambar lama jika update dijalankan
            $gambarLama = collect(explode(',', $request->gambar_lama));

            // mengeluarkan semua nama gambar lama dari variable $gambarLama
            foreach ($gambarLama as $gl) {
                // memasukan semua gambar lama ke dalam array $namaFile
                $namaFile[] = $gl;
            }
        }

        // membuat pengkondisian jika ada gambar yang dihapus
        if ($request->gambar_hapus) {
            // mengambil nama gambar jika ada yang dihapus
            $gambarDihapus = collect(explode(',', $request->gambar_dihapus));

            // mengeluarkan semua nama gambar yang dihapus dari variable $gambarDihapus
            foreach ($gambarDihapus as $gd) {
                // menghapus gambar yang dihapus dari folder media
                unlink('media/' . $gd);
            }
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
        Task::where('id', $id)->update($validateData);

        // menampilkan pesan sukses dan mengarahkan ke halaman yang dituju
        return redirect('/tugas' . '/' . $id)->with('success', 'Tugas Sudah Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Task $task, Answer $answer)
    {
        // mengecek apakan tugas yang akan di hapus memiliki media
        if ($task->find($id)->media_tugas) {
            // jika memiliki, extract media mejadi array
            $media = json_decode($task->find($id)->media_tugas);

            // mengeluarkan media yang ada di dalam araay
            foreach ($media as $m) {
                // menghapus file yang ada di folder media
                unlink('media/' . $m);
            }
        }

        // mengecek apakan ada jawaban
        if ($answer->get()->where('id_task', $id)) {
            // memilih column media_jawaban dari tabel jawaban
            $answer->get()->where('id_task', $id)->each(function ($item) {
                // jika memiliki, extract media mejadi array
                $media = json_decode($item->media_jawaban);

                // mengeluarkan media yang ada di dalam araay
                foreach ($media as $m) {
                    // menghapus file yang ada di folder media
                    unlink('media/' . $m);
                }

                // menghapus jawaban yang ada di dalam database
                Answer::destroy($item->id);
            });

        }

        // menghapus tugas yang ada di database
        Task::destroy($id);

        // menampilkan pesan sukses dan mengarahkan ke halaman yang dituju
        return redirect('/tugas')->with('success', 'Tugas Sudah Dihapus.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setor_tugas()
    {
        /*
        mengembalikan/ menampilkan data yang ada di view folder tugas dengan nama setor_tugas.blade.php
        dan mengirimkan data yang diperlukan ke view
         */
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
            $nama = Str::lower(mt_rand(1, 1000) . '_' . $media->getClientOriginalName());

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
                'id_task' => 'required|integer|numeric',
            ];

            // menjalankan validasi
            $validateData = $request->validate($rules);

            // mengambil nama file yang sudah di upload
            foreach ($namaFile as $nf) {
                // menghapus file yang sudah di upload
                unlink('media/' . $nf);
            }

            // mengarahkan halaman untuk kembali
            return redirect()->back();
        }

        // membuat validasi untuk mengecek apakah semua data yang di inputkan sudah benar
        $rules = [
            'id_task' => 'required|integer|numeric',
        ];

        // menjalankan validasi
        $validateData = $request->validate($rules);

        // mengabil data tanpa memberika validasi
        $validateData['isi_jawaban'] = $request->isi_jawaban;
        $validatedData['komentar_jawaban'] = $request->komentar;
        $validateData['media_jawaban'] = json_encode($namaFile);

        // menambahkan data yang sudah di inputkan ke dalam database
        Answer::create($validateData);

        // memperbarui data di table task
        Task::where("id", $request->id_task)->update([
            'status_id' => 1,
        ]);

        // menampilkan pesan sukses dan mengarahkan ke halaman yang dituju
        return redirect('/tugas')->with('success', 'Tugas Sudah Disetor.');
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