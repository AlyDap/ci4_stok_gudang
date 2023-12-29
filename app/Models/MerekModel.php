<?php

namespace App\Models;

use CodeIgniter\Model;

class MerekModel extends Model
{
 protected $DBGroup          = 'default';
 protected $table            = 'merek';
 protected $primaryKey       = 'id_merek';
 protected $useAutoIncrement = true;
 protected $insertID         = 0;
 protected $returnType       = 'array';
 protected $useSoftDeletes   = false;
 protected $protectFields    = true;
 protected $allowedFields    = ['nama_merek', 'kategori_produk', 'deskripsi', 'logo', 'pemilik', 'status'];

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

 public function checkMerek($id_merek)
 {
  $check = $this->where('id_merek', $id_merek)->first();

  if ($check) {
   return $check;
  }

  return false;
 }

 public function jumlahMerek()
 {
  return $this->db->query('SELECT COUNT(*) as jumlah FROM `merek` ')->getRow();
 }
 public function jumlahMerekOn()
 {
  return $this->db->query("SELECT COUNT(*) as jumlah FROM `merek` WHERE status = 'aktif'")->getRow();
 }
 public function getMerekOn()
 {
  return $this->db->query("SELECT * FROM `merek` WHERE status = 'aktif'")->getResultArray();
 }
}
