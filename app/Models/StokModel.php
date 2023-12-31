<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
	protected $DBGroup          = 'default';
	protected $table            = 'stok_barang';
	protected $primaryKey       = 'id_stok';
	protected $useAutoIncrement = true;
	protected $insertID         = 0;
	protected $returnType       = 'array';
	protected $useSoftDeletes   = false;
	protected $protectFields    = true;
	protected $allowedFields    = [
		'kode_barang', 'satuan', 'jumlah', 'kode_gudang'
	];

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

	// GET ID STOK BERDASAR KODE BARANG & KODE GUDANG
	public function getIdStokByBarangGudang($kode_barang, $kode_gudang)
	{
		return $this->db->query("SELECT * FROM `stok_barang` where kode_barang = '" . $kode_barang . "' AND kode_gudang = '" . $kode_gudang . "' ")->getRow();
	}

	// UPDATE STOK MASUK
	public function updateStok($kode_barang, $satuan, $jumlah, $kode_gudang)
	{
		$this->db->query("UPDATE
		`stok_barang`
SET
		`satuan` = '" . $satuan . "',
		`jumlah` = '" . $jumlah . "'
WHERE
		kode_barang = '" . $kode_barang . "' 
		AND kode_gudang = '" . $kode_gudang . "'");
		return ($this->db->affectedRows() > 0); // Mengembalikan true jika ada baris yang terpengaruh (data berhasil diupdate)
	}

	// UPDATE STOK KELUAR
}
