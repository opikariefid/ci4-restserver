<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Kontrakan extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Kontrakan_model';
 
    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }
    
    public function create()
    {
        $validation =  \Config\Services::validation();
    
        $blankArr = array();
        $gambar = array('gambar1.jpg','gambar2.jpg');

        // $idKontrakan   = $this->request->getPost('idKontrakan');
        $namaKontrakan = $this->request->getPost('namaKontrakan');
        $urlGambarKontrakan = serialize($gambar);
        $deskripsiKontrakan = $this->request->getPost('deskripsiKontrakan');
        $hargaKontrakan   = $this->request->getPost('hargaKontrakan');
        $provinsi = $this->request->getPost('provinsi');
        $kotaKabupaten = $this->request->getPost('kotaKabupaten');
        $kelurahan = $this->request->getPost('kelurahan');
        $kecamatan   = $this->request->getPost('kecamatan');
        $alamat = $this->request->getPost('alamat');
        // $publishDate = time();
        $KT = $this->request->getPost('KT');
        $KM   = $this->request->getPost('KM');
        $luasBangunan = $this->request->getPost('luasBangunan');
        $luasTanah = $this->request->getPost('luasTanah');
        $namaPemilikKontrakan = $this->request->getPost('namaPemilikKontrakan');
        $nomorPemilikKontrakan = $this->request->getPost('nomorPemilikKontrakan');
        $disimpanUser   = serialize($blankArr);
        $status = 0;
        $publish = 0;

        $data = [
            'namaKontrakan'           => $namaKontrakan,
            'urlGambarKontrakan'      => $urlGambarKontrakan,
            'deskripsiKontrakan'      => $deskripsiKontrakan,
            'hargaKontrakan'          => $hargaKontrakan,
            'provinsi'                => $provinsi,
            'kotaKabupaten'           => $kotaKabupaten,
            'kelurahan'               => $kelurahan,
            'kecamatan'               => $kecamatan,
            'alamat'                  => $alamat,
            'KT'                      => $KT,
            'KM'                      => $KM,
            'luasBangunan'            => $luasBangunan,
            'luasTanah'               => $luasTanah,
            'namaPemilikKontrakan'    => $namaPemilikKontrakan,
            'nomorPemilikKontrakan'   => $nomorPemilikKontrakan,
            'disimpanUser'            => $disimpanUser,
            'status'                  => $status,
            'publish'                 => $publish
        ];

        if($validation->run($data, 'kontrakan') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->insertKontrakan($data);
            if($simpan){
                $msg = ['message' => 'Created Kontrakan successfully'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }

    public function show($id = NULL)
    {
        $get = $this->model->getKontrakan($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }
    
    public function edit($id = NULL)
    {
        $get = $this->model->getKontrakan($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }

    public function update($id = NULL)
    {
        $validation =  \Config\Services::validation();

        $data = $this->request->getRawInput();
        
        if($validation->run($data, 'kontrakan') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateKontrakan($data,$id);
            if($simpan){
                $msg = ['message' => 'Updated Kontrakan successfully'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }

    public function delete($id = NULL)
    {
       $hapus = $this->model->deleteKontrakan($id);
       if($hapus){
           $code = 200;
           $msg = ['message' => 'Deleted Kontrakan successfully'];
           $response = [
               'status' => $code,
               'error' => false,
               'data' => $msg,
           ];
       } else {
           $code = 401;
           $msg = ['message' => 'Not Found'];
           $response = [
               'status' => $code,
               'error' => true,
               'data' => $msg,
           ];
       }
       return $this->respond($response, $code);
    }

    public function favorite($id = NULL)
    {
        $validation =  \Config\Services::validation();

        $data = $this->request->getRawInput();

        $getUID = $this->model->getUsers($data['uid']);
        $getUID = $data['uid'];
        $get = $this->model->getKontrakan();

        $cek = array();
        $cek = unserialize($get[0]['disimpanUser']);
        $sudahAda = 0;
        $posisi = 0;
        
        foreach ($cek as $key => $value) {
            if($getUID == $value){
                $sudahAda = 1;
                $posisi = $key;
                break;
            }
        }
        if($sudahAda == 0){
            array_push($cek,$getUID);
        } else {
            array_splice($cek,$posisi,1);
        }
        
        if($validation->run($data, 'userfav') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $table = [
                'disimpanUser' => serialize($cek)
            ];
            $simpan = $this->model->updateKontrakan($table,$id);
            if($simpan){
                if($sudahAda == 0){
                    $msg = ['message' => 'Favorite Kontrakan successfully'];
                } else {
                    $msg = ['message' => 'Hapus Favorite Kontrakan successfully'];
                }
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }

    public function f_under20()
    {
        $get = $this->model->getKontrakanUnder20();
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }

    public function by_city($value = NULL)
    {
        $get = $this->model->getKontrakanByCity($value);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }
}