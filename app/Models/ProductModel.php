<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['product_name', 'product_deskripsi'];

    // Dates
    protected $useTimestamps = true;
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
    
    public function createData($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateData($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('product_id', $id);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['product_id' => $id]);
    }
}
