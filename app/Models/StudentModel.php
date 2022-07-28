<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'name', 'nis', 'prog', 'tingkat'];

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

    public function getData($username = false)
    {
        if (!$username) {
            return $this->findAll();
        } else {
            return $this->getWhere(['username' => $username]);
        }
    }

    public function getDataUser($username)
    {
        $builder = $this->db->table($this->table)->select('*')
        ->join('users', 'users.username = students.username');
        return $builder->getWhere(['users.username' => $username]);
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
