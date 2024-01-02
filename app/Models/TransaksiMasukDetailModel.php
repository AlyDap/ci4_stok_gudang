<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiMasukDetailModel extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'detail_barang_masuk';
  protected $primaryKey       = 'no_barang_masuk';
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

  public function getTransaksiMasukDetail()
  {
    return $this->db->query("SELECT
  dbm.no_barang_masuk AS no_barang_masuk,
  b.nama_barang AS nama_barang,
  dbm.satuan AS satuan,
  dbm.jumlah AS jumlah,
  dbm.harga AS harga,
  dbm.total_harga AS total_harga
FROM detail_barang_masuk AS dbm, barang_masuk AS bm, barang AS b
WHERE
  dbm.no_barang_masuk = bm.no_barang_masuk AND dbm.kode_barang = b.kode_barang
ORDER BY no_barang_masuk DESC ")->getResultArray();
  }
  public function getTransaksiMasukDetailById($id)
  {
    return $this->db->query("SELECT
  dbm.no_barang_masuk AS no_barang_masuk,
  b.nama_barang AS nama_barang,
  dbm.satuan AS satuan,
  dbm.jumlah AS jumlah,
  dbm.harga AS harga,
  dbm.total_harga AS total_harga
FROM detail_barang_masuk AS dbm, barang_masuk AS bm, barang AS b
WHERE
  dbm.no_barang_masuk = bm.no_barang_masuk AND dbm.kode_barang = b.kode_barang
  AND dbm.no_barang_masuk ='" . $id . "'
ORDER BY no_barang_masuk DESC ")->getResultArray();
  }
}
