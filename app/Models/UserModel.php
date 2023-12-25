<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'no_hp', 'email', 'foto_user', 'kode_gudang', 'status'];

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

    public function checkLogin($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user) {
            // Menggunakan md5() untuk memeriksa password yang di-hash MD5
            if (md5($password) === $user['password']) {
                return $user;
            }
        }

        return false;
    }

    public function getNamaGudang()
    {
        return $this->db->query("SELECT
        a.kode_gudang AS kode_gudang,
        g.nama_gudang AS nama_gudang,
        a.id_user AS id_user,
        a.username AS username,
        a.password AS password,
        a.no_hp AS no_hp,
        a.email AS email,
        a.foto_user AS foto_user,
        a.status AS status
    FROM
        `gudang` AS g,
        users AS a
    WHERE
        g.kode_gudang = a.kode_gudang")->getResultArray();
    }

    public function getGudangAktif()
    {
        return $this->db->query("SELECT * FROM `gudang` WHERE `status` = 'aktif'")->getResultArray();
    }

    public function getGudangId($id)
    {
        return $this->db->query("SELECT * FROM `gudang` WHERE `kode_gudang` = '" . $id . "'")->getRow();
    }
}
