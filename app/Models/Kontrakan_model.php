<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Kontrakan_model extends Model {
 
    protected $table = 'kontrakan';
    protected $tableUser = 'users';
 
    public function getKontrakan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idKontrakan' => $id])->getRowArray();
        }  
    }

    public function getUsers($id = false)
    {
        return $this->db->table($this->tableUser)->getWhere(['uid' => $id])->getRowArray(); 
    }
     
    public function insertKontrakan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
 
    public function updateKontrakan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idKontrakan' => $id]);
    }
 
    public function deleteKontrakan($id)
    {
        return $this->db->table($this->table)->delete(['idKontrakan' => $id]);
    }

    public function getKontrakanUnder20()
    {
        $data = [
            'hargaKontrakan < ' => 20000000,
            'status' => 1,
            'publish' => 1
        ];
        return $this->getWhere($data)->getRowArray();
    }

    public function getKontrakanByCity($value = false)
    {
        if(!isset($value)){
            $value = "Jakarta Selatan";
        }
        $data = [
            'kotaKabupaten' => $value,
            'status' => 1,
            'publish' => 1
        ];
        return $this->getWhere($data)->getRowArray();
    }
} 