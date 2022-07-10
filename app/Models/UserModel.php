<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'role'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function getData($id = false)
    {
        if (!$id) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }

    public function getFullData()
    {
        // $builder = $this->db->table($this->table)
        // ->join('admins', 'admins.username = users.username')
        // ->join('students', 'students.username = users.username');
        // return $builder->get();
    }

    public function storeData($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateData($data, $username)
    {
        $builder = $this->db->table($this->table);
        $builder->where('username', $username);
        return $builder->update($data);
    }

    public function deleteData($username)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['username' => $username]);
    }
}
