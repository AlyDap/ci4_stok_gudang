<?php

namespace App\Models;

use CodeIgniter\Model;

class GrafikStokModel extends Model
{
	protected $DBGroup          = 'default';
	// Menampilkan jumlah stok dan nama barang pada grafik baik barang aktif maupun tidak
	// untuk setiap kode gudang ($id) dan total stok pada setiap gudang
	public function getGrafikJumlahStokPerGudang($id)
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
		`stok_barang` AS s,	barang AS b,	gudang AS g,	merek as m
WHERE
		s.kode_gudang = '" . $id . "' AND s.kode_barang = b.kode_barang AND s.kode_gudang = g.kode_gudang
		and m.id_merek = b.id_merek
		ORDER BY	kode_barang;")->getResultArray();
	}

	public function getGrafikJumlahStokSemuaGudang()
	{
		return $this->db->query("SELECT
		s.kode_barang AS kode_barang,
		s.satuan AS satuan,
		SUM(s.jumlah) AS jumlah,
		s.kode_gudang AS kode_gudang,
		b.nama_barang AS nama_barang,
		g.nama_gudang AS nama_gudang,
		m.nama_merek AS nama_merek
FROM
		`stok_barang` AS s,	barang AS b,	gudang AS g,	merek AS m
WHERE
		s.kode_barang = b.kode_barang AND s.kode_gudang = g.kode_gudang AND m.id_merek = b.id_merek
GROUP BY	s.kode_barang
ORDER BY	kode_barang;")->getResultArray();
	}

	// STOK MASUK PERTAMA MUNCUL
	//1 semuagudang semuamerek all
	public function getGrafikDashboardMasukSemuaGudangSemuaMerekAll()
	{
		return $this->db->query("SELECT
		dbm.kode_barang as kode_barang,
		b.nama_barang as nama_barang,
		SUM(dbm.jumlah) as jumlah,
		SUM(dbm.total_harga) as total_harga
FROM
		barang_masuk AS bm, detail_barang_masuk AS dbm,
		merek AS m, barang AS b, gudang AS g
WHERE
		bm.no_barang_masuk = dbm.no_barang_masuk AND 
		bm.kode_gudang = g.kode_gudang AND
		dbm.kode_barang = b.kode_barang AND
		b.id_merek = m.id_merek AND
		b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif'
GROUP BY b.kode_barang
		")->getResultArray();
	}
	//2 semuagudang semuamerek tahun
	public function getGrafikDashboardMasukSemuaGudangSemuaMerekTahun()
	{
		return $this->db->query("SELECT
		dbm.kode_barang as kode_barang,
		b.nama_barang as nama_barang,
		SUM(dbm.jumlah) as jumlah,
		SUM(dbm.total_harga) as total_harga
FROM
		barang_masuk AS bm, detail_barang_masuk AS dbm,
		merek AS m, barang AS b, gudang AS g
WHERE
		bm.no_barang_masuk = dbm.no_barang_masuk AND 
		bm.kode_gudang = g.kode_gudang AND
		dbm.kode_barang = b.kode_barang AND
		b.id_merek = m.id_merek AND
		b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif' AND
		bm.tanggal_masuk >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND
		bm.tanggal_masuk < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
GROUP BY b.kode_barang
		")->getResultArray();
	}
	//3 semuagudang semuamerek bulan
	public function getGrafikDashboardMasukSemuaGudangSemuaMerekBulan()
	{
		return $this->db->query("SELECT
		dbm.kode_barang as kode_barang,
		b.nama_barang as nama_barang,
		SUM(dbm.jumlah) as jumlah,
		SUM(dbm.total_harga) as total_harga
FROM
		barang_masuk AS bm, detail_barang_masuk AS dbm,
		merek AS m, barang AS b, gudang AS g
WHERE
		bm.no_barang_masuk = dbm.no_barang_masuk AND 
		bm.kode_gudang = g.kode_gudang AND
		dbm.kode_barang = b.kode_barang AND
		b.id_merek = m.id_merek AND
		b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif' AND
		bm.tanggal_masuk >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND
		bm.tanggal_masuk < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
GROUP BY b.kode_barang
		")->getResultArray();
	}

	//4 kodegudang semuamerek all
	public function getGrafikDashboardMasukKodeGudangSemuaMerekAll($id)
	{
		return $this->db->query("SELECT
		dbm.kode_barang as kode_barang,
		b.nama_barang as nama_barang,
		SUM(dbm.jumlah) as jumlah,
		SUM(dbm.total_harga) as total_harga
FROM
		barang_masuk AS bm, detail_barang_masuk AS dbm,
		merek AS m, barang AS b, gudang AS g
WHERE
		bm.no_barang_masuk = dbm.no_barang_masuk AND 
		bm.kode_gudang = g.kode_gudang AND
		dbm.kode_barang = b.kode_barang AND
		b.id_merek = m.id_merek AND
		b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif'
		AND g.kode_gudang= '" . $id . "'
GROUP BY b.kode_barang
		")->getResultArray();
	}
	//5 kodegudang semuamerek tahun
	public function getGrafikDashboardMasukKodeGudangSemuaMerekTahun($id)
	{
		return $this->db->query("SELECT
		dbm.kode_barang as kode_barang,
		b.nama_barang as nama_barang,
		SUM(dbm.jumlah) as jumlah,
		SUM(dbm.total_harga) as total_harga
FROM
		barang_masuk AS bm, detail_barang_masuk AS dbm,
		merek AS m, barang AS b, gudang AS g
WHERE
		bm.no_barang_masuk = dbm.no_barang_masuk AND 
		bm.kode_gudang = g.kode_gudang AND
		dbm.kode_barang = b.kode_barang AND
		b.id_merek = m.id_merek AND
		b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif' AND
		bm.tanggal_masuk >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND
		bm.tanggal_masuk < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
		AND g.kode_gudang= '" . $id . "'
GROUP BY b.kode_barang
		")->getResultArray();
	}
	//6 kodegudang semuamerek bulan
	public function getGrafikDashboardMasukKodeGudangSemuaMerekBulan($id)
	{
		return $this->db->query("SELECT
		dbm.kode_barang as kode_barang,
		b.nama_barang as nama_barang,
		SUM(dbm.jumlah) as jumlah,
		SUM(dbm.total_harga) as total_harga
FROM
		barang_masuk AS bm, detail_barang_masuk AS dbm,
		merek AS m, barang AS b, gudang AS g
WHERE
		bm.no_barang_masuk = dbm.no_barang_masuk AND 
		bm.kode_gudang = g.kode_gudang AND
		dbm.kode_barang = b.kode_barang AND
		b.id_merek = m.id_merek AND
		b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif' AND
		bm.tanggal_masuk >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND
		bm.tanggal_masuk < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
		AND g.kode_gudang= '" . $id . "'
GROUP BY b.kode_barang
		")->getResultArray();
	}

	//7 semuagudang idmerek all
	public function getGrafikDashboardMasukSemuaGudangKodeMerekAll($id)
	{
		return $this->db->query("SELECT
			dbm.kode_barang as kode_barang,
			b.nama_barang as nama_barang,
			SUM(dbm.jumlah) as jumlah,
			SUM(dbm.total_harga) as total_harga
	FROM
			barang_masuk AS bm, detail_barang_masuk AS dbm,
			merek AS m, barang AS b, gudang AS g
	WHERE
			bm.no_barang_masuk = dbm.no_barang_masuk AND 
			bm.kode_gudang = g.kode_gudang AND
			dbm.kode_barang = b.kode_barang AND
			b.id_merek = m.id_merek AND
			b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif'
			AND m.id_merek= '" . $id . "'
	GROUP BY b.kode_barang
	")->getResultArray();
	}
	//8 semuagudang idmerek tahun
	public function getGrafikDashboardMasukSemuaGudangKodeMerekTahun($id)
	{
		return $this->db->query("SELECT
			dbm.kode_barang as kode_barang,
			b.nama_barang as nama_barang,
			SUM(dbm.jumlah) as jumlah,
			SUM(dbm.total_harga) as total_harga
	FROM
			barang_masuk AS bm, detail_barang_masuk AS dbm,
			merek AS m, barang AS b, gudang AS g
	WHERE
			bm.no_barang_masuk = dbm.no_barang_masuk AND 
			bm.kode_gudang = g.kode_gudang AND
			dbm.kode_barang = b.kode_barang AND
			b.id_merek = m.id_merek AND
			b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif' AND
			bm.tanggal_masuk >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND
			bm.tanggal_masuk < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
			AND m.id_merek= '" . $id . "'
	GROUP BY b.kode_barang
			")->getResultArray();
	}
	//9 semuagudang idmerek bulan
	public function getGrafikDashboardMasukSemuaGudangKodeMerekBulan($id)
	{
		return $this->db->query("SELECT
			dbm.kode_barang as kode_barang,
			b.nama_barang as nama_barang,
			SUM(dbm.jumlah) as jumlah,
			SUM(dbm.total_harga) as total_harga
	FROM
			barang_masuk AS bm, detail_barang_masuk AS dbm,
			merek AS m, barang AS b, gudang AS g
	WHERE
			bm.no_barang_masuk = dbm.no_barang_masuk AND 
			bm.kode_gudang = g.kode_gudang AND
			dbm.kode_barang = b.kode_barang AND
			b.id_merek = m.id_merek AND
			b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif' AND
			bm.tanggal_masuk >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND
			bm.tanggal_masuk < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
			AND m.id_merek= '" . $id . "'
	GROUP BY b.kode_barang
			")->getResultArray();
	}

	//10 kodegudang idmerek all
	public function getGrafikDashboardMasukKodeGudangKodeMerekAll($id, $id1)
	{
		return $this->db->query("SELECT
			dbm.kode_barang as kode_barang,
			b.nama_barang as nama_barang,
			SUM(dbm.jumlah) as jumlah,
			SUM(dbm.total_harga) as total_harga
	FROM
			barang_masuk AS bm, detail_barang_masuk AS dbm,
			merek AS m, barang AS b, gudang AS g
	WHERE
			bm.no_barang_masuk = dbm.no_barang_masuk AND 
			bm.kode_gudang = g.kode_gudang AND
			dbm.kode_barang = b.kode_barang AND
			b.id_merek = m.id_merek AND
			b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif'
			AND g.kode_gudang= '" . $id . "' AND m.id_merek= '" . $id1 . "'
	GROUP BY b.kode_barang
	")->getResultArray();
	}
	//11 kodegudang idmerek tahun
	public function getGrafikDashboardMasukKodeGudangKodeMerekTahun($id, $id1)
	{
		return $this->db->query("SELECT
			dbm.kode_barang as kode_barang,
			b.nama_barang as nama_barang,
			SUM(dbm.jumlah) as jumlah,
			SUM(dbm.total_harga) as total_harga
	FROM
			barang_masuk AS bm, detail_barang_masuk AS dbm,
			merek AS m, barang AS b, gudang AS g
	WHERE
			bm.no_barang_masuk = dbm.no_barang_masuk AND 
			bm.kode_gudang = g.kode_gudang AND
			dbm.kode_barang = b.kode_barang AND
			b.id_merek = m.id_merek AND
			b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif' AND
			bm.tanggal_masuk >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND
			bm.tanggal_masuk < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
			AND g.kode_gudang= '" . $id . "' AND m.id_merek= '" . $id1 . "'
	GROUP BY b.kode_barang
			")->getResultArray();
	}
	//12 kodegudang idmerek bulan
	public function getGrafikDashboardMasukKodeGudangKodeMerekBulan($id, $id1)
	{
		return $this->db->query("SELECT
			dbm.kode_barang as kode_barang,
			b.nama_barang as nama_barang,
			SUM(dbm.jumlah) as jumlah,
			SUM(dbm.total_harga) as total_harga
	FROM
			barang_masuk AS bm, detail_barang_masuk AS dbm,
			merek AS m, barang AS b, gudang AS g
	WHERE
			bm.no_barang_masuk = dbm.no_barang_masuk AND 
			bm.kode_gudang = g.kode_gudang AND
			dbm.kode_barang = b.kode_barang AND
			b.id_merek = m.id_merek AND
			b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif' AND
			bm.tanggal_masuk >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND
			bm.tanggal_masuk < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
			AND g.kode_gudang= '" . $id . "' AND m.id_merek= '" . $id1 . "'
	GROUP BY b.kode_barang
			")->getResultArray();
	}

	// kodegudang semuamerek all

	// STOK KELUAR 
	// PERTAMA MUNCUL
	public function getGrafikDashboardKeluarSemuaGudangSemuaMerekAll()
	{
		return $this->db->query("SELECT
		dbm.kode_barang as kode_barang,
		b.nama_barang as nama_barang,
		SUM(dbm.jumlah) as jumlah,
		SUM(dbm.total_harga) as total_harga
FROM
		barang_keluar AS bm, detail_barang_keluar AS dbm,
		merek AS m, barang AS b, gudang AS g
WHERE
		bm.no_barang_keluar = dbm.no_barang_keluar AND 
		bm.kode_gudang = g.kode_gudang AND
		dbm.kode_barang = b.kode_barang AND
		b.id_merek = m.id_merek AND
		b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif'
GROUP BY b.kode_barang
		")->getResultArray();
	}
	public function getGrafikDashboardKeluarKodeGudangSemuaMerekAll($id)
	{
		return $this->db->query("SELECT
		dbm.kode_barang as kode_barang,
		b.nama_barang as nama_barang,
		SUM(dbm.jumlah) as jumlah,
		SUM(dbm.total_harga) as total_harga
FROM
		barang_keluar AS bm, detail_barang_keluar AS dbm,
		merek AS m, barang AS b, gudang AS g
WHERE
		bm.no_barang_keluar = dbm.no_barang_keluar AND 
		bm.kode_gudang = g.kode_gudang AND
		dbm.kode_barang = b.kode_barang AND
		b.id_merek = m.id_merek AND
		b.status = 'aktif' AND m.status = 'aktif' AND g.status = 'aktif'
		AND g.kode_gudang= '" . $id . "'
GROUP BY b.kode_barang
		")->getResultArray();
	}

	// waktu 90 hari
	public function cekPenjahitan90Hari()
	{
		return $this->db->query("SELECT p.no_penjahitan as hasil, 		CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  
		FROM penjahitan p 
		WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND 
		p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
	}
	// waktu 1 tahun
	public function cekPenjahitan1Tahun()
	{
		return $this->db->query("SELECT p.no_penjahitan as hasil, 
		CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  
		FROM penjahitan p 
		WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND 
		p.tgl <= CURDATE()")->getResult();
	}
}
