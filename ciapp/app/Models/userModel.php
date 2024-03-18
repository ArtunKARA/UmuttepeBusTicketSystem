<?php 
namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'Kullanici';

    public function customQuery()
    {
        // Özel SQL sorgusunu oluşturun
        $query = $this->db->query('SELECT ID, Aktif, Isim, Soyisim, Email, Sifre, Yetki FROM user');

        // Sorgudan sonuçları alın
        return $query->getResultArray();
    }

    public function login($email, $sifre)
    {
        $data = $this->findAll();
        foreach ($data as $row)
        {
            if($row['Mail'] == $email && $row['Sifre'] == $sifre)
            {
                return $row;
            }
        }
        return ["Mail" => "null"];
    
    }
}
?>