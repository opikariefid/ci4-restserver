<?php namespace App\Database\Seeds;
  
class UsersSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'uid'           => 'woyAtdhWMzbpOhhkcq9cmk0L2zJ2',
            'displayName'   => 'Taufik Arif',
            'emailUser'     => 'taufik.arif44@gmail.com',
            'transaksi'     => ''
        ];        
        $data2 = [
            'uid'           => 'asdAtdhWMzbpOhhkcq9cmk0L2zJ3',
            'displayName'   => 'Ilham Cendana',
            'emailUser'     => 'cendana@gmail.com',
            'transaksi'     => ''
        ];
        $this->db->table('users')->insert($data1);
        $this->db->table('users')->insert($data2);
    }
} 