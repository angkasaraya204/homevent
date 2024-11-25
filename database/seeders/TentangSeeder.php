<?php

namespace Database\Seeders;

use App\Models\Tentang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tentang::create([
            'deskripsi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio inventore possimus repudiandae. Assumenda officia eum optio nesciunt eligendi quae quia provident, accusantium vel, odit reprehenderit repudiandae, ratione aut impedit natus.',
        ]);
    }
}
