<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\GudangModel;


class LoginController extends BaseController
{
    public function index()
    {
        // Tampilkan halaman login
        $session = session();
        if (session('jenis') == 'Besar') return view('dashboardView');
        if (session('jenis') == 'Kecil') return view('dashboardView2');
        return view('loginView');
        // return redirect()->to(base_url('DasboardController'));

    }

    public function logOut()
    {
     $session = session();
        // Lakukan logika logout di sini, seperti menghapus sesi atau melakukan tindakan lain yang sesuai.
        $session->destroy();
        // Setelah logout, alihkan pengguna ke halaman tertentu, misalnya, halaman login.
        return redirect()->to(base_url('LoginController'));
    }
    

    public function processLogin()
    { 
       
        $username = $this->request->getVar('loguser');
        $password = $this->request->getVar('logpass');

        if (empty($username) || empty($password)) {
            return redirect()->to(base_url('LoginController'))->with('error', 'Username dan password harus diisi.');
        }

        $userModel = new UserModel();
        $gudangModel = new GudangModel();
        $user = $userModel->checkLogin($username, $password);
        
        if ($user) {
            // Login sukses, lanjutkan dengan sesi atau tindakan lain yang diperlukan
            // Contoh: $this->session->set('user', $user);
            $session = session();
            $session->set('kode_gudang', $user['kode_gudang']);
            $session->set('username', $user['username']);
            $session->set('id_user', $user['id_user']);
            $kode_gudang =  $user['kode_gudang'];
            $gudang=$gudangModel->checkJenis($kode_gudang);
            if($gudang){
                $session->set('jenis', $gudang['jenis']);                
            }

            return redirect()->to(base_url('DashboardController'));
        }

        return redirect()->to(base_url('LoginController'))->with('error', '&#128561 Username / Password Salah &#128561');
    }
}
