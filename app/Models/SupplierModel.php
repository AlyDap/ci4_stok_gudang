<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
 protected $DBGroup          = 'default';
 protected $table            = 'supplier';
 protected $primaryKey       = 'id_supplier';
 protected $useAutoIncrement = true;
 protected $insertID         = 0;
 protected $returnType       = 'array';
 protected $useSoftDeletes   = false;
 protected $protectFields    = true;
 protected $allowedFields    = ['nama_supplier', 'email', 'no_hp', 'alamat', 'deskripsi',  'status'];

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

 public function jumlahSupplier()
 {
  return $this->db->query('SELECT COUNT(*) as jumlah FROM `supplier` ')->getRow();
 }
 public function jumlahSupplierOn()
 {
  return $this->db->query("SELECT COUNT(*) as jumlah FROM `supplier` WHERE status = 'aktif'")->getRow();
 }
 public function getSupplierOn()
 {
  return $this->db->query("SELECT * FROM `supplier` WHERE status = 'aktif'")->getResultArray();
 }
}
