<?php

namespace App\Models;

use CodeIgniter\Model;

class GudangModel extends Model
{
 protected $DBGroup          = 'default';
 protected $table            = 'gudang';
 protected $primaryKey       = 'kode_gudang';
 protected $useAutoIncrement = true;
 protected $insertID         = 0;
 protected $returnType       = 'array';
 protected $useSoftDeletes   = false;
 protected $protectFields    = true;
 protected $allowedFields    = ['nama_gudang', 'jenis', 'alamat', 'keterangan', 'foto_gudang', 'status'];

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

 public function checkJenis($kode_gudang)
 {
  $check = $this->where('kode_gudang', $kode_gudang)->first();

  if ($check) {
   return $check;
  }

  return false;
 }
 public function jumlahGudang()
 {
  return $this->db->query('SELECT COUNT(*) as jumlah FROM `gudang` ')->getRow();
 }
 public function jumlahGudangOn()
 {
  return $this->db->query("SELECT COUNT(*) as jumlah FROM `gudang` WHERE status = 'aktif'")->getRow();
 }
 public function getKodeGudangSaatIni($id)
 {
  return $this->db->query('SELECT * FROM `gudang` where `kode_gudang` = "' . $id . '"')->getRow();
 }
}
