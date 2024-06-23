<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $allowedFields = ['judul', 'penulis' , 'penerbit', 'tahun_terbit'];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = ([
        'judul' => [
            'rules'  => 'required|string',
            'errors' => [
                'required' => 'Judul harus diisi.',
                'string'   => 'Judul harus berupa string.'
            ]
        ],
        'penulis' => [
            'rules'  => 'required|string',
            'errors' => [
                'required' => 'Penulis harus diisi.',
                'string'   => 'Penulis harus berupa string.'
            ]
        ],
        'penerbit' => [
            'rules'  => 'required|string',
            'errors' => [
                'required' => 'Penerbit harus diisi.',
                'string'   => 'Penerbit harus berupa string.'
            ]
        ],
        'tahun_terbit' => [
            'rules'  => 'required|integer|greater_than[1800]|less_than[2024]',
            'errors' => [
                'required'    => 'Tahun terbit harus diisi.',
                'integer'     => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                'less_than'   => 'Tahun terbit harus lebih kecil dari 2024.'
            ]
        ],
    ]);

    protected $skipValidation = false;

}