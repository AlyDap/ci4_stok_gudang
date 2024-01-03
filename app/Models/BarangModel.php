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

	public function jumlahBarang()
	{
		return $this->db->query('SELECT COUNT(*) as jumlah FROM `barang` ')->getRow();
	}
	public function jumlahBarangOn()
	{
		return $this->db->query("SELECT COUNT(*) as jumlah FROM `barang` WHERE status = 'aktif'")->getRow();
	}
	public function getBarangOn()
	{
		return $this->db->query("SELECT * FROM `barang` WHERE status = 'aktif'")->getResultArray();
	}
	public function getBarangBarangOn()
	{
		return $this->db->query("SELECT
  b.kode_barang AS 'kode_barang',
  b.nama_barang AS 'nama_barang',
  b.satuan AS 'satuan',
  b.harga_beli AS 'harga_beli',
  b.harga_jual_satuan AS 'harga_jual_satuan',
  b.harga_jual_bijian AS 'harga_jual_bijian',
  b.jumlah_per_satuan AS 'jumlah_per_satuan',
  b.foto_barang AS 'foto_barang',
  b.id_merek AS 'id_merek',
  b.status AS 'status',
  m.nama_merek AS 'nama_merek'
FROM
  merek AS m,
  barang AS b
WHERE
		m.id_merek = b.id_merek AND b.status = 'aktif'")->getResultArray();
	}
	public function getBarangBarang()
	{
		return $this->db->query("SELECT
  b.kode_barang AS 'kode_barang',
  b.nama_barang AS 'nama_barang',
  b.satuan AS 'satuan',
  b.harga_beli AS 'harga_beli',
  b.harga_jual_satuan AS 'harga_jual_satuan',
  b.harga_jual_bijian AS 'harga_jual_bijian',
  b.jumlah_per_satuan AS 'jumlah_per_satuan',
  b.foto_barang AS 'foto_barang',
  b.id_merek AS 'id_merek',
  b.status AS 'status',
  m.nama_merek AS 'nama_merek'
FROM
  merek AS m,
  barang AS b
WHERE
		m.id_merek = b.id_merek")->getResultArray();
	}
	public function getBarangBarangStokOn()
	{
		return $this->db->query("SELECT
  b.kode_barang AS 'kode_barang',
  b.nama_barang AS 'nama_barang',
  b.satuan AS 'satuan',
  b.harga_beli AS 'harga_beli',
  b.harga_jual_satuan AS 'harga_jual_satuan',
  b.harga_jual_bijian AS 'harga_jual_bijian',
  b.jumlah_per_satuan AS 'jumlah_per_satuan',
  b.foto_barang AS 'foto_barang',
  b.id_merek AS 'id_merek',
  b.status AS 'status',
  s.jumlah AS 'jumlah_barang',
  m.nama_merek AS 'nama_merek'
FROM
  `stok_barang` AS s,
  merek AS m,
  barang AS b
WHERE
  s.kode_barang = b.kode_barang AND m.id_merek = b.id_merek AND b.status = 'aktif'")->getResultArray();
	}
	public function getBarangBarangStokOnById($gdg)
	{
		return $this->db->query("SELECT
  b.kode_barang AS 'kode_barang',
  b.nama_barang AS 'nama_barang',
  b.satuan AS 'satuan',
  b.harga_beli AS 'harga_beli',
  b.harga_jual_satuan AS 'harga_jual_satuan',
  b.harga_jual_bijian AS 'harga_jual_bijian',
  b.jumlah_per_satuan AS 'jumlah_per_satuan',
  b.foto_barang AS 'foto_barang',
  b.id_merek AS 'id_merek',
  b.status AS 'status',
  s.jumlah AS 'jumlah_barang',
  m.nama_merek AS 'nama_merek', 
  g.kode_gudang as 'kode_gudang'
FROM
  `stok_barang` AS s,
  merek AS m,
  barang AS b, gudang as g
WHERE
  s.kode_barang = b.kode_barang AND m.id_merek = b.id_merek AND g.kode_gudang=s.kode_gudang 
		AND s.kode_gudang='" . $gdg . "'
		AND b.status = 'aktif'")->getResultArray();
	}
	public function getBarangBarangStok()
	{
		return $this->db->query("SELECT
  b.kode_barang AS 'kode_barang',
  b.nama_barang AS 'nama_barang',
  b.satuan AS 'satuan',
  b.harga_beli AS 'harga_beli',
  b.harga_jual_satuan AS 'harga_jual_satuan',
  b.harga_jual_bijian AS 'harga_jual_bijian',
  b.jumlah_per_satuan AS 'jumlah_per_satuan',
  b.foto_barang AS 'foto_barang',
  b.id_merek AS 'id_merek',
  b.status AS 'status',
  s.jumlah AS 'jumlah_barang',
  m.nama_merek AS 'nama_merek'
FROM
  `stok_barang` AS s,
  merek AS m,
  barang AS b
WHERE
  s.kode_barang = b.kode_barang AND m.id_merek = b.id_merek")->getResultArray();
	}

	public function getKodeTerbaru()
	{
		return $this->db->query("SELECT * FROM `barang` ORDER BY kode_barang DESC LIMIT 1")->getRow();
	}
	public function getSemuaKodeBarang()
	{
		return $this->db->query('SELECT kode_barang FROM `barang`')->getResultArray();
	}

	public function inputStokBaru($data)
	{
		return $this->db->table('stok_barang')->insert($data);
	}

	public function getStok($id)
	{
		return $this->db->query("SELECT * FROM `stok_barang` where kode_gudang ='" . $id . "' ORDER BY kode_barang ")->getResultArray();
	}
	public function getStokNama($id)
	{
		return $this->db->query("SELECT
		s.kode_barang AS kode_barang,
		s.satuan AS satuan,
		s.jumlah AS jumlah,
		s.kode_gudang AS kode_gudang,
		b.nama_barang AS nama_barang,
		g.nama_gudang AS nama_gudang,
		m.nama_merek as nama_merek
FROM
		`stok_barang` AS s,
		barang AS b,
		gudang AS g,
		merek as m
WHERE
		s.kode_gudang = '" . $id . "' AND s.kode_barang = b.kode_barang AND s.kode_gudang = g.kode_gudang
		and m.id_merek = b.id_merek
		ORDER BY
		kode_barang;")->getResultArray();
	}
	public function getStokNamaSemua()
	{
		return $this->db->query("SELECT
		s.kode_barang AS kode_barang,
		s.satuan AS satuan,
		s.jumlah AS jumlah,
		s.kode_gudang AS kode_gudang,
		b.nama_barang AS nama_barang,
		g.nama_gudang AS nama_gudang,
		m.nama_merek as nama_merek
FROM
		`stok_barang` AS s,
		barang AS b,
		gudang AS g,
		merek as m
WHERE
		s.kode_barang = b.kode_barang AND s.kode_gudang = g.kode_gudang
		and m.id_merek = b.id_merek
ORDER BY
		kode_barang")->getResultArray();
	}
}
