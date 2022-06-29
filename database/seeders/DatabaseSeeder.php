<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Task::factory(500)->create();

        Status::create([
            'id' => '0',
            'status_name' => 'Belum Selesai',
        ]);
        Status::create([
            'id' => '1',
            'status_name' => 'Sudah Selesai',
        ]);

        MataPelajaran::create([
            'mata_pelajaran' => 'Matematika',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Kimia',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Fisika',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Seni Budaya',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Bahasa Inggris',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Bahasa Indonesia',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Bahasa Bali',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Bahasa Jepang',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Biologi',
        ]);
        MataPelajaran::create([
            'mata_pelajaran' => 'Ekonomi',
        ]);
    }
}