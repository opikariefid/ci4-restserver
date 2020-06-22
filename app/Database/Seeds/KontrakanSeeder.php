<?php namespace App\Database\Seeds;
  
class KontrakanSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $urlGambar = array('gambar1.jpg','gambar2.jpg');
        $data1 = [
            'namaKontrakan'            => 'Rumah Uya',
            'urlGambarKontrakan'       => json_encode($urlGambar),
            'deskripsiKontrakan'       => 'Ini Rumah sedap bat dah',
            'hargaKontrakan'           => 3500000,
            'provinsi'                 => 'Jawa Barat',
            'kotaKabupaten'            => 'Depok',
            'kelurahan'                => 'Tirtajaya',
            'kecamatan'                => 'Sukmajaya',
            'alamat'                   => 'Cluster Anggrek Blok W18, Grand Depok City',
            'KT'                       => 3,
            'KM'                       => 2,
            'luasBangunan'             => 3.5,
            'luasTanah'                => 100,
            'namaPemilihKontrakan'     => 'Sunyoto',
            'nomorPemilikKontrakan'    => 82212547786,
            'disimpanUser'             => '',
            'status'                   => 0,
            'publish'                  => 0
        ];
        $this->db->table('kontrakan')->insert($data1);
    }
} 