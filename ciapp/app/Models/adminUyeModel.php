<?php 
namespace App\Models;

use CodeIgniter\Model;

class AdminUyeModel extends Model{

    protected $table = 'kullanici';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ID', 'Isim', 'TcVatandas', 'VatandasNo', 'DogumTarihi', 'Cinsiyet', 'TelefonNo', 'Mail', 'Bakiye'];


    public function uyeQuery()
    {
        // Özel SQL sorgusunu oluşturun
        $query = $this->db->query('SELECT ID, Isim, TcVatandas, VatandasNo, DogumTarihi, Cinsiyet, TelefonNo, Mail, Bakiye FROM KULLANICI;');

        // Sorgudan sonuçları alın
        return $query->getResultArray();
    }


    public function getUyeList()
    {
        return $this->findAll();
    }



}




?>


