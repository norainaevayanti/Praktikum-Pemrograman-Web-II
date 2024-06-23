<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Buku extends Seeder
{
    public function run()
    {
        $this->db->table('buku')->insert([
            'judul' => 'Laut Bercerita',
            'penulis' => 'Leila S. Chudori',
            'penerbit' => 'Gramedia',
            'tahun_terbit' => '2017'
        ]);

        $this->db->table('buku')->insert([
            'judul' => 'Tentang Kamu',
            'penulis' => 'Tere Liye',
            'penerbit' => 'Republika',
            'tahun_terbit' => '2016'
        ]);
    }
    }

