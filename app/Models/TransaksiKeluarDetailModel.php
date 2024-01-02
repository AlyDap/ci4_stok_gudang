<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiKeluarDetailModel extends Model
{
 protected $DBGroup          = 'default';
 protected $table            = 'detail_barang_keluar';
 protected $primaryKey       = 'no_barang_keluar';
 protected $useAutoIncrement = true;
 protected $insertID         = 0;
 protected $returnType       = 'array';
 protected $useSoftDeletes   = false;
 protected $protectFields    = true;
 protected $allowedFields    = ['kode_barang', 'satuan', 'jumlah', 'harga', 'total_harga'];

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

 public function getTransaksiKeluarDetail()
 {
  return $this->db->query("SELECT
  dbm.no_barang_keluar AS no_barang_keluar,
  b.nama_barang AS nama_barang,
  dbm.satuan AS satuan,
  dbm.jumlah AS jumlah,
  dbm.harga AS harga,
  dbm.total_harga AS total_harga
FROM detail_barang_keluar AS dbm, barang_keluar AS bm, barang AS b
WHERE
  dbm.no_barang_keluar = bm.no_barang_keluar AND dbm.kode_barang = b.kode_barang
ORDER BY dbm.no_barang_keluar DESC ")->getResultArray();
 }
 public function getTransaksiKeluarDetailById($id)
 {
  return $this->db->query("SELECT
  dbm.no_barang_keluar AS no_barang_keluar,
  b.nama_barang AS nama_barang,
  dbm.satuan AS satuan,
  dbm.jumlah AS jumlah,
  dbm.harga AS harga,
  dbm.total_harga AS total_harga
FROM detail_barang_keluar AS dbm, barang_keluar AS bm, barang AS b
WHERE
  dbm.no_barang_keluar = bm.no_barang_keluar AND dbm.kode_barang = b.kode_barang
  AND dbm.no_barang_keluar ='" . $id . "'
ORDER BY dbm.no_barang_keluar DESC ")->getResultArray();
 }
}
