<?php
// app/Controllers/TransaksiController.php

namespace App\Controllers;

use App\Models\GudangModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\MerekModel;
use App\Models\StokModel;
use App\Models\SupplierModel;
use App\Models\GrafikStokModel;
use App\Models\TransaksiMasukModel;
use App\Models\TransaksiMasukDetailModel;
use App\Models\TransaksiKeluarModel;
use App\Models\TransaksiKeluarDetailModel;
use CodeIgniter\Controller;

class TransaksiController extends BaseController
{
 protected $barangModell, $merekModell, $grafikStokModel;
 protected $gudangModell, $userModell, $supplierModell, $stokModell;
 protected $transaksiMasukModell, $transaksiMasukDetailModell;
 protected $transaksiKeluarModell, $transaksiKeluarDetailModell;

 public function __construct()
 {
  $this->barangModell = new BarangModel();
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
  $this->merekModell = new MerekModel();
  $this->stokModell = new StokModel();
  $this->supplierModell = new SupplierModel();
  $this->grafikStokModel = new GrafikStokModel();
  $this->transaksiMasukModell = new TransaksiMasukModel();
  $this->transaksiMasukDetailModell = new TransaksiMasukDetailModel();
  $this->transaksiKeluarModell = new TransaksiKeluarModel();
  $this->transaksiKeluarDetailModell = new TransaksiKeluarDetailModel();
  // $this->barangModell = new \App\Models\MerekModel();
  $this->cekOtorisasi();
  $this->cekUserOn();
 }

 public function cekOtorisasi()
 {
  if (!session()->has('id_user')) {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }
 public function cekUserOn()
 {
  $userOn = $this->userModell->getUserOn(session('id_user'));
  if (empty($userOn)) {
   session()->destroy();
   redirect()->to(base_url('LoginController'))->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }
 public function cekOtorisasiBesar()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  if ($isiKodeJenis != 'besar') {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }
 public function cekOtorisasiKecil()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  if ($isiKodeJenis != 'kecil') {
   redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548')->send();
   exit(); // Menghentikan eksekusi setelah redirect
  }
 }

 public function penggantiSession()
 {
  $id = session()->get('id_user');
  $userSaatIni = $this->userModell->getUserSaatIni($id);
  $isiKodeNama = '';
  $isiIdGambar = '';
  $isiIdNama = '';
  $isiKodeGambar = '';
  $isiKodeJenis = '';
  if ($userSaatIni) {
   $kode = $userSaatIni->kode_gudang;
   $isiIdGambar = $userSaatIni->foto_user;
   $isiIdNama = $userSaatIni->username;
   $kodeSaatIni = $this->gudangModell->getKodeGudangSaatIni($kode);
   if ($kodeSaatIni) {
    $isiKodeNama = $kodeSaatIni->nama_gudang;
    $isiKodeGambar = $kodeSaatIni->foto_gudang;
    $isiKodeJenis = $kodeSaatIni->jenis;
    $data = [
     'isiIdGambar' => $isiIdGambar,
     'isiKodeNama' => $isiKodeNama,
     'isiIdNama' => $isiIdNama,
     'isiKodeGambar' => $isiKodeGambar,
     'isiKodeJenis' => $isiKodeJenis,
     'isiKodeGudang' => $kode,
    ];
    return $data;
   }
  }
 }

 public function index()
 {
  // Memanggil fungsi penggantiSession untuk mendapatkan nilai-nilai yang dikembalikan
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiIdGambar = $dataPenggantiSession['isiIdGambar'];
  $isiKodeNama = $dataPenggantiSession['isiKodeNama'];
  $isiIdNama = $dataPenggantiSession['isiIdNama'];
  $isiKodeGambar = $dataPenggantiSession['isiKodeGambar'];
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  $isiKodeGudang = $dataPenggantiSession['isiKodeGudang'];
  $data = [
   'title' => 'Transaksi',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
   'isiKodeGudang' => $isiKodeGudang,
   'transaksiMasuk' => $this->transaksiMasukModell->getTransaksiMasuk(),
   'transaksiMasukGudang' => $this->transaksiMasukModell->getTransaksiMasukByGudang($isiKodeGudang),
   'transaksiMasukDetail' => $this->transaksiMasukDetailModell->getTransaksiMasukDetail(),
   'transaksiKeluar' => $this->transaksiKeluarModell->getTransaksiKeluar(),
   'transaksiKeluarGudang' => $this->transaksiKeluarModell->getTransaksiKeluarByGudang($isiKodeGudang),
   'transaksiKeluarDetail' => $this->transaksiKeluarDetailModell->getTransaksiKeluarDetail(),
   'supplierOn' => $this->supplierModell->getSupplierOn(),
   'barangOn' => $this->barangModell->getBarangOn(),
   'barangOnId' => $this->barangModell->getBarangBarangStokOnById($isiKodeGudang),
   'barangOn1Id' => $this->barangModell->getBarangBarangStokOn1ById($isiKodeGudang),
  ];
  if ($isiKodeJenis == 'besar') {
   // $data['barang'] = $this->barangModell->getBarangBarang();
  } else if ($isiKodeJenis == 'kecil') {
   // $data['barang'] = $this->barangModell->getBarangBarangOn();
  }
  return view('transaksiView', $data);
 }

 // json tabel detail transaksi masuk
 public function viewDetailTransaksiMasuk()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeGudang = $dataPenggantiSession['isiKodeGudang'];
  $viewTransaksiMasuk = $this->request->getPost('viewTransaksiMasuk');
  if (!empty($viewTransaksiMasuk)) {
   $data = [
    'data_detail_masuk' => $this->transaksiMasukDetailModell->getTransaksiMasukDetailById($viewTransaksiMasuk),
    'data_rekap_masuk' => $this->transaksiMasukModell->getTransaksiMasukById($viewTransaksiMasuk),
   ];
  } else {
   $data = [
    'data_detail_masuk' => '',
   ];
  }

  $response = [
   'data' => view('hasilTransaksiView', $data)
  ];
  echo json_encode($response);
 }
 public function viewDetailTransaksiKeluar()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeGudang = $dataPenggantiSession['isiKodeGudang'];
  $viewTransaksiKeluar = $this->request->getPost('viewTransaksiKeluar');
  if (!empty($viewTransaksiKeluar)) {
   $data = [
    'data_detail_keluar' => $this->transaksiKeluarDetailModell->getTransaksiKeluarDetailById($viewTransaksiKeluar),
    'data_rekap_keluar' => $this->transaksiKeluarModell->getTransaksiKeluarById($viewTransaksiKeluar),
   ];
  } else {
   $data = [
    'data_detail_keluar' => '',
   ];
  }

  $response = [
   'data' => view('hasilTransaksiView2', $data)
  ];
  echo json_encode($response);
 }

 // respon select pilih barang
 public function getDataBarang()
 {
  $dataPenggantiSession = $this->penggantiSession();
  $isiKodeGudang = $dataPenggantiSession['isiKodeGudang'];
  $kode_barang = $this->request->getPost('kode_barang');

  $barangData = $this->barangModell->getBarangById($kode_barang, $isiKodeGudang);
  // Mengembalikan data dalam format JSON
  return $this->response->setJSON($barangData);
 }

 // stok masuk
 public function storeMasuk()
 {
  $data = [
   'no_barang_masuk' => $this->request->getPost('no_barang_masuk'),
   'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
   'total_harga' => $this->request->getPost('total_harga'),
   'id_user' => $this->request->getPost('id_user'),
   'id_supplier' => $this->request->getPost('id_supplier'),
   'kode_gudang' => $this->request->getPost('kode_gudang'),
  ];
  $save = $this->transaksiMasukModell->insert($data);
  if ($save) {
   $this->storeMasukDetail();
   $this->stokBertambah();
   return redirect()->to(base_url('TransaksiController'));
  }
 }
 public function storeMasukDetail()
 {
  $noBarangMasuk = $this->barangModell->getKodeTransaksiMasukTerbaru();
  $data = [
   // 'no_barang_masuk' => '11', //coba ganti
   'no_barang_masuk' => $noBarangMasuk->no_barang_masuk, //coba ganti
   'kode_barang' => $this->request->getPost('kode_barang'),
   'satuan' => $this->request->getPost('satuan'),
   'jumlah' => $this->request->getPost('jumlah'),
   'harga' => $this->request->getPost('harga'),
   'total_harga' => $this->request->getPost('total_harga'),
  ];
  $save = $this->transaksiMasukDetailModell->insert($data);
  if ($save) {
  } else { //gagal save detail masuk
   return redirect()->to(base_url('BarangController'));
  }
 }

 public function stokBertambah()
 {
  $kode_barang = $this->request->getPost('kode_barang');
  $kode_gudang = $this->request->getPost('kode_gudang');

  // cari stok barang berdar kode barang dan gudang
  // $cariStok = $this->barangModell->getBarangById($kode_barang, $kode_gudang);
  $cariIdStok = $this->stokModell->getIdStokByBarangGudang($kode_barang, $kode_gudang);

  $idStok = $cariIdStok->id_stok;
  $stokSekarang = $cariIdStok->jumlah;
  $stokMasuk = $this->request->getPost('jumlah');
  $satuan = $this->request->getPost('satuan');
  $stokUpdate = intval($stokSekarang) + intval($stokMasuk);
  $data = [
   'satuan' => $satuan,
   'jumlah' => $stokUpdate,
  ];
  // update stok
  $this->stokModell->update($idStok, $data);

  // $updateStok = $this->stokModell->updateStok($kode_barang, $satuan, strval($stokUpdate), $kode_gudang);

 }

 // stok keluar
 public function storeKeluar()
 {
  $data = [
   'no_barang_keluar' => $this->request->getPost('no_barang_keluar'),
   'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
   'total_harga' => $this->request->getPost('total_harga'),
   'id_user' => $this->request->getPost('id_user'),
   'kode_gudang' => $this->request->getPost('kode_gudang'),
  ];
  $save = $this->transaksiKeluarModell->insert($data);
  if ($save) {
   $this->storeKeluarDetail();
   $this->stokBerkurang();
   return redirect()->to(base_url('TransaksiController'));
  }
 }
 public function storeKeluarDetail()
 {
  $noBarangKeluar = $this->barangModell->getKodeTransaksiKeluarTerbaru();
  $data = [
   // 'no_barang_keluar' => '11', //coba ganti
   'no_barang_keluar' => $noBarangKeluar->no_barang_keluar, //coba ganti
   'kode_barang' => $this->request->getPost('kode_barang'),
   'satuan' => $this->request->getPost('satuan'),
   'jumlah' => $this->request->getPost('jumlah'),
   'harga' => $this->request->getPost('harga'),
   'total_harga' => $this->request->getPost('total_harga'),
  ];
  $this->transaksiKeluarDetailModell->insert($data);
 }

 public function stokBerkurang()
 {
  $kode_barang = $this->request->getPost('kode_barang');
  $kode_gudang = $this->request->getPost('kode_gudang');

  // cari stok barang berdar kode barang dan gudang
  // $cariStok = $this->barangModell->getBarangById($kode_barang, $kode_gudang);
  $cariIdStok = $this->stokModell->getIdStokByBarangGudang($kode_barang, $kode_gudang);

  $idStok = $cariIdStok->id_stok;
  $stokSekarang = $cariIdStok->jumlah;
  $stokKeluar = $this->request->getPost('jumlah');
  $satuan = $this->request->getPost('satuan');
  $stokUpdate = intval($stokSekarang) - intval($stokKeluar);
  $data = [
   'satuan' => $satuan,
   'jumlah' => $stokUpdate,
  ];
  // update stok
  $this->stokModell->update($idStok, $data);
 }
}
