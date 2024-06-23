<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'username' => 'Eva',
            'email' => 'norainaevayanti@gmail.com',
            'password' => password_hash('123', PASSWORD_DEFAULT),
        ]);
    }
}
