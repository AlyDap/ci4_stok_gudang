<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
 protected $DBGroup          = 'default';
 protected $table            = 'barang';
 protected $primaryKey       = 'kode_barang';
 protected $useAutoIncrement = true;
 protected $insertID         = 0;
 protected $returnType       = 'array';
 protected $useSoftDeletes   = false;
 protected $protectFields    = true;
 protected $allowedFields    = ['nama_barang', 'satuan', 'harga_beli', 'harga_jual_satuan', 'harga_jual_bijian', 'jumlah_per_satuan', 'foto_barang', 'id_merek', 'status'];

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
}
