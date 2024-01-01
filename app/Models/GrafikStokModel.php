<?php

namespace App\Models;

use CodeIgniter\Model;

class GrafikStokModel extends Model
{
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
}
