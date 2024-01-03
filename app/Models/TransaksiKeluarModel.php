<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiKeluarModel extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'barang_keluar';
  protected $primaryKey       = 'no_barang_keluar';
  protected $useAutoIncrement = true;
  protected $insertID         = 0;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = ['tanggal_keluar', 'total_harga', 'id_user', 'kode_gudang'];

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

  public function getTransaksiKeluar()
  {
    return $this->db->query("SELECT
  bm.no_barang_keluar AS no_barang_keluar,
  bm.tanggal_keluar AS tanggal_keluar,
  bm.total_harga AS total_harga,
  u.username AS username,
  g.nama_gudang AS nama_gudang
FROM
  barang_keluar AS bm, users AS u, gudang AS g
WHERE
  bm.id_user = u.id_user AND bm.kode_gudang = g.kode_gudang
ORDER BY bm.tanggal_keluar DESC ")->getResultArray();
  }
  public function getTransaksiKeluarByGudang($gudang)
  {
    return $this->db->query("SELECT
  bm.no_barang_keluar AS no_barang_keluar,
  bm.tanggal_keluar AS tanggal_keluar,
  bm.total_harga AS total_harga,
  u.username AS username,
  g.nama_gudang AS nama_gudang
  FROM
  barang_keluar AS bm, users AS u, gudang AS g
WHERE
  bm.id_user = u.id_user AND bm.kode_gudang = g.kode_gudang
  and bm.kode_gudang ='" . $gudang . "' ORDER BY bm.tanggal_keluar DESC ")->getResultArray();
  }
  public function getTransaksiKeluarById($id)
  {
    return $this->db->query("SELECT
  bm.no_barang_keluar AS no_barang_keluar,
  bm.tanggal_keluar AS tanggal_keluar,
  bm.total_harga AS total_harga,
  u.username AS username,
  g.nama_gudang AS nama_gudang
FROM
  barang_keluar AS bm, users AS u, gudang AS g
WHERE
  bm.id_user = u.id_user AND bm.kode_gudang = g.kode_gudang
  and bm.no_barang_keluar ='" . $id . "' ORDER BY bm.tanggal_keluar DESC ")->getRow();
  }
}
