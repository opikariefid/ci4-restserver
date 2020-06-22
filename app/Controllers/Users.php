<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Users extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Users_model';
 
    public function index()
    {
        $data = $this->model->findAll();
        $new_data = array();
        foreach ($data as $key => $value) {
            $value['transaksi'] = unserialize($value['transaksi']);
            $new_data[$key] = $value;
        }
        return $this->respond($new_data, 200);
    }
    
    public function create()
    {
        $validation =  \Config\Services::validation();
        $validation->reset();
    
        $uid   = $this->request->getPost('uid');
        $displayName = $this->request->getPost('displayName');
        $emailUser = $this->request->getPost('emailUser');
        $blankArr = array();
        $transaksi = serialize($blankArr);

        $data = [
            'uid' => $uid,
            'displayName' => $displayName,
            'emailUser' => $emailUser,
            'transaksi' => $transaksi
        ];

        if($validation->run($data, 'users') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->insertUsers($data);
            if($simpan){
                $msg = ['message' => 'Created users successfully'];
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
        $get = $this->model->getUsers($id);
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
        $get = $this->model->getUsers($id);
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
        // $uid   = $this->request->getRawInput('uid');
        // $displayName = $this->request->getRawInput('displayName');
        // $emailUser = $this->request->getRawInput('emailUser');
        // $transaksi = $this->request->getRawInput('tranksaksi');

        $data = $this->request->getRawInput();

        // $data = [
        //     'uid' => $uid,
        //     'displayName' => $displayName,
        //     'emailUser' => $emailUser,
        //     'transaksi' => $transaksi
        // ];
        
        if($validation->run($data, 'users') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateUsers($data,$id);
            if($simpan){
                $msg = ['message' => 'Updated users successfully'];
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
       $hapus = $this->model->deleteUsers($id);
       if($hapus){
           $code = 200;
           $msg = ['message' => 'Deleted users successfully'];
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
}