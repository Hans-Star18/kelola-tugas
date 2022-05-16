<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $mata_pelajaran_id = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        return [
            //
            'status_id' => mt_rand(0, 1),
            'mata_pelajaran_id' => Arr::random($mata_pelajaran_id),
            'judul_tugas' => $this->faker->sentence(mt_rand(1, 3)),
            'deskripsi_tugas' => $this->faker->sentence(mt_rand(5, 10)),
            'deadline_at' => $this->faker->dateTimeBetween('-2 month', '2022-07-25 08:37:17'),
            'tanggal_dibuat' => $this->faker->dateTimeBetween('-5 month', 'now'),
            'tanggal_dikumpul' => $this->faker->dateTimeBetween('-3 month', 'now'),
        ];
    }
}