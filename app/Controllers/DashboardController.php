<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\GudangModel;
use App\Models\MerekModel;
use App\Models\SupplierModel;
use App\Models\UserModel;
use App\Models\GrafikStokModel;

class DashboardController extends BaseController
{
 protected $barangModell, $merekModell, $supplierModell, $transaksiModell, $gudangModell, $userModell, $grafikStokModell;

 public function __construct()
 {
  $this->barangModell = new BarangModel();
  $this->merekModell = new MerekModel();
  $this->supplierModell = new SupplierModel();
  // $this->transaksiModell = new TransaksiModel();
  $this->gudangModell = new GudangModel();
  $this->userModell = new UserModel();
  $this->grafikStokModell = new GrafikStokModel();
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
   'jumlahBarang' => '',
   // 'nama_gudang' => $isiKodeNama,
   // 'foto_gudang' => $isiKodeGambar,
  ];
  if ($isiKodeJenis == 'besar') {
   $data = [
    'title' => 'Dashboard Besar',
    'jBarang' => $this->barangModell->jumlahBarang(),
    'jGudang' => $this->gudangModell->jumlahGudang(),
    'jMerek' => $this->merekModell->jumlahMerek(),
    'jSupplier' => $this->supplierModell->jumlahSupplier(),
    'jUser' => $this->userModell->jumlahUser(),
    'collg' => 'col-lg-2',
    'nama_gudang' => $isiKodeNama,
    'foto_gudang' => $isiKodeGambar,
    'foto_user' => $isiIdGambar,
    'username' => $isiIdNama,
    'jenis' => $isiKodeJenis,
    'gudangaktif' => $this->userModell->getGudangAktif(),
    'merekaktif' => $this->merekModell->getMerekOn(),
    // grafik tanpa filter masuk semua
    'masuksemua' => $this->grafikStokModell->getGrafikDashboardMasukSemuaGudangSemuaMerekAll(),
    'keluarsemua' => $this->grafikStokModell->getGrafikDashboardKeluarSemuaGudangSemuaMerekAll(),
   ];
   return view('dashboardView', $data);
  } else if ($isiKodeJenis == 'kecil') {
   $data = [
    'title' => 'Dashboard Kecil',
    'jBarang' => $this->barangModell->jumlahBarangOn(),
    'jGudang' => $this->gudangModell->jumlahGudangOn(),
    'jMerek' => $this->merekModell->jumlahMerekOn(),
    'jSupplier' => $this->supplierModell->jumlahSupplierOn(),
    'jUser' => $this->userModell->jumlahUserOn(),
    'collg' => 'col-lg-3',
    'nama_gudang' => $isiKodeNama,
    'foto_gudang' => $isiKodeGambar,
    'foto_user' => $isiIdGambar,
    'username' => $isiIdNama,
    'jenis' => $isiKodeJenis,
    'merekaktif' => $this->merekModell->getMerekOn(),
    // grafik tanpa filter masuk semua
    'masuksemua' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangSemuaMerekAll($isiKodeGudang),
    'keluarsemua' => $this->grafikStokModell->getGrafikDashboardKeluarKodeGudangSemuaMerekAll($isiKodeGudang),
   ];
   return view('dashboardView', $data);
  } else {
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }


 // json grafik masuk
 public function viewGrafikBarangMasuk()
 {
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  // jika jenis gudang besar
  if ($isiKodeJenis == 'besar') {
   $sGudang1 = $this->request->getPost('selectedGudang1');
   $sMerek1 = $this->request->getPost('selectedMerek1');
   $sWaktu1 = $this->request->getPost('selectedWaktu1');
   // filter ada 12 
   if ($sGudang1 == 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'all') {
    //1 waktu all
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukSemuaGudangSemuaMerekAll(),];
   } else if ($sGudang1 == 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'tahun') {
    //2 waktu tahun (1tahun)
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukSemuaGudangSemuaMerekTahun(),];
   } else if ($sGudang1 == 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'bulan') {
    //3 waktu tahun (3 bulan)
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukSemuaGudangSemuaMerekBulan(),];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'all') {
    //4 waktu all kode_gudang
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangSemuaMerekAll($sGudang1),];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'tahun') {
    //5 waktu tahun (1tahun) kode_gudang
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangSemuaMerekTahun($sGudang1),];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'bulan') {
    //6 waktu tahun (3 bulan) kode_gudang
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangSemuaMerekBulan($sGudang1),];
   } else if ($sGudang1 == 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'all') {
    //7 waktu all id_merek
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukSemuaGudangKodeMerekAll($sMerek1),];
   } else if ($sGudang1 == 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'tahun') {
    //8 waktu tahun (1tahun) id_merek
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukSemuaGudangKodeMerekTahun($sMerek1),];
   } else if ($sGudang1 == 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'bulan') {
    //9 waktu tahun (3 bulan) id_merek
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukSemuaGudangKodeMerekBulan($sMerek1),];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'all') {
    //10 waktu all kode_gudang id_merek
    $data = [
     'filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangKodeMerekAll($sGudang1, $sMerek1),
    ];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'tahun') {
    //11 waktu tahun (1tahun) kode_gudang id_merek
    $data = [
     'filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangKodeMerekTahun($sGudang1, $sMerek1),
    ];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'bulan') {
    //12 waktu tahun (3 bulan) kode_gudang id_merek
    $data = [
     'filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangKodeMerekBulan($sGudang1, $sMerek1),
    ];
   }

   // $data = ['hasil' => 'BESAR MASUK'];
   // jika jenis gudang kecil
  } else if ($isiKodeJenis == 'kecil') {
   $sGudang1 = $dataPenggantiSession['isiKodeGudang'];
   $sMerek1 = $this->request->getPost('selectedMerek1');
   $sWaktu1 = $this->request->getPost('selectedWaktu1');
   // filter ada 6 karena tidak ada semua gudang
   if ($sGudang1 != 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'all') {
    //1-4 waktu all kode_gudang
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangSemuaMerekAll($sGudang1),];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'tahun') {
    //2-5 waktu tahun (1tahun) kode_gudang
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangSemuaMerekTahun($sGudang1),];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 == 'semuamerek' && $sWaktu1 == 'bulan') {
    //3-6 waktu tahun (3 bulan) kode_gudang
    $data = ['filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangSemuaMerekBulan($sGudang1),];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'all') {
    //4-10 waktu all kode_gudang id_merek
    $data = [
     'filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangKodeMerekAll($sGudang1, $sMerek1),
    ];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'tahun') {
    //5-11 waktu tahun (1tahun) kode_gudang id_merek
    $data = [
     'filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangKodeMerekTahun($sGudang1, $sMerek1),
    ];
   } else if ($sGudang1 != 'semuagudang' && $sMerek1 != 'semuamerek' && $sWaktu1 == 'bulan') {
    //6-12 waktu tahun (3 bulan) kode_gudang id_merek
    $data = [
     'filtermasuk' => $this->grafikStokModell->getGrafikDashboardMasukKodeGudangKodeMerekBulan($sGudang1, $sMerek1),
    ];
   }
   // $data = ['hasil' => 'KECIL MASUK'];
  }
  // semuagudang semuamerek all tahun bulan

  $response = [
   'data' => view('cobaGrafikView', $data)
  ];
  echo json_encode($response);
 }

 // Lakukan operasi atau pemrosesan data selanjutnya di sini dengan variabel yang telah Anda tangkap

 public function produk()
 {
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiIdGambar = $dataPenggantiSession['isiIdGambar'];
  $isiKodeNama = $dataPenggantiSession['isiKodeNama'];
  $isiIdNama = $dataPenggantiSession['isiIdNama'];
  $isiKodeGambar = $dataPenggantiSession['isiKodeGambar'];
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  $data = [
   'title' => 'Produk Besar',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
  ];
  if ($isiKodeJenis == 'besar') {
   return view('adminBesar/produkView', $data);
  } else {
   // if ($isiKodeJenis == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
 public function transaksi()
 {
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiIdGambar = $dataPenggantiSession['isiIdGambar'];
  $isiKodeNama = $dataPenggantiSession['isiKodeNama'];
  $isiIdNama = $dataPenggantiSession['isiIdNama'];
  $isiKodeGambar = $dataPenggantiSession['isiKodeGambar'];
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  $data = [
   'title' => 'Transaksi Besar',
   'nama_gudang' => $isiKodeNama,
   'foto_gudang' => $isiKodeGambar,
   'foto_user' => $isiIdGambar,
   'username' => $isiIdNama,
   'jenis' => $isiKodeJenis,
  ];
  if ($isiKodeJenis == 'besar') {
   return view('adminBesar/transaksiView', $data);
  } else {
   // if ($isiKodeJenis == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
 public function data()
 {
  $dataPenggantiSession = $this->penggantiSession();
  // Mengakses nilai-nilai yang dikembalikan
  $isiIdGambar = $dataPenggantiSession['isiIdGambar'];
  $isiKodeNama = $dataPenggantiSession['isiKodeNama'];
  $isiIdNama = $dataPenggantiSession['isiIdNama'];
  $isiKodeGambar = $dataPenggantiSession['isiKodeGambar'];
  $isiKodeJenis = $dataPenggantiSession['isiKodeJenis'];
  if ($isiKodeJenis == 'besar') {
   return view('adminBesar/data');
  } else {
   // if ($isiKodeJenis == 'kecil') return view('dashboardView2');
   // return view('loginView');
   return redirect()->to(base_url('LoginController'))->with('error', '&#128548 Login Dulu &#128548');
  }
 }
}
