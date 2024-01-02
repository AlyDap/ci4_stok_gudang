<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiMasukModel extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'barang_masuk';
  protected $primaryKey       = 'no_barang_masuk';
  protected $useAutoIncrement = true;
  protected $insertID         = 0;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = ['tanggal_masuk', 'total_harga', 'id_user', 'id_supplier', 'kode_gudang'];

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

  public function getTransaksiMasuk()
  {
    return $this->db->query("SELECT
  bm.no_barang_masuk AS no_barang_masuk,
  bm.tanggal_masuk AS tanggal_masuk,
  bm.total_harga AS total_harga,
  u.username AS username,
  s.nama_supplier AS nama_supplier,
  g.nama_gudang AS nama_gudang
FROM
  barang_masuk AS bm, users AS u, gudang AS g, supplier as s
WHERE
  bm.id_user = u.id_user AND bm.kode_gudang = g.kode_gudang AND s.id_supplier = bm.id_supplier
ORDER BY bm.tanggal_masuk DESC ")->getResultArray();
  }
  public function getTransaksiMasukById($id)
  {
    return $this->db->query("SELECT
  bm.no_barang_masuk AS no_barang_masuk,
  bm.tanggal_masuk AS tanggal_masuk,
  bm.total_harga AS total_harga,
  u.username AS username,
  s.nama_supplier AS nama_supplier,
  g.nama_gudang AS nama_gudang
FROM
  barang_masuk AS bm, users AS u, gudang AS g, supplier as s
WHERE
  bm.id_user = u.id_user AND bm.kode_gudang = g.kode_gudang AND s.id_supplier = bm.id_supplier and
  bm.no_barang_masuk ='" . $id . "' ORDER BY bm.tanggal_masuk DESC ")->getRow();
  }
}
