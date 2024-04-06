<?php 
namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'KULLANICI';

    public function kullaniciGuncelle($id, $data)
    {
        $this->db->query('UPDATE KULLANICI 
        SET Isim = ?, 
            TcVatandas = ?, 
            VatandasNo = ?, 
            DogumTarihi = ?, 
            Cinsiyet = ?, 
            TelefonNo = ?, 
            Sifre = ?
            WHERE ID = ?;',array($data['Isim'], $data['TcVatandas'], $data['VatandasNo'], $data['DogumTarihi'], $data['Cinsiyet'], $data['TelefonNo'], $data['Mail'], $id));
    }

    public function kullaniciBilgi($id)
    {
        // Özel SQL sorgusunu oluşturun
        $query = $this->db->query('select
        *
        from
        KULLANICI
        where
        id = ?',array($id));

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

    public function kayit($data)
    {
        $kullaniciTipi = 0;
        $bakiye = 0;

        $this->db->query('INSERT INTO KULLANICI (Isim, TcVatandas, VatandasNo, DogumTarihi, Cinsiyet, TelefonNo, Mail, Sifre, KullaniciTipi, Bakiye) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);',array($data['Isim'], $data['TcVatandas'], $data['VatandasNo'], $data['DogumTarihi'], $data['Cinsiyet'], $data['TelefonNo'], $data['Mail'], $data['Sifre'], $kullaniciTipi ,$bakiye));
    }

    public function kartBilgileri($ID)
    {
        $query = $this->db->query('SELECT 
                            * 
                            FROM
                            KARTBILGILERI
                            where
                            KullaniciID = ? ;',array($ID));
        return $query->getResultArray();
        
    }

    public function tekKartBilgileri($kartID){
        $query = $this->db->query('SELECT 
                            * 
                            FROM
                            KARTBILGILERI
                            where
                            ID = ? ;',array($kartID));
        return $query->getResultArray();
    }

    public function deleteKart($id)
    {
        $this->db->query('DELETE FROM KARTBILGILERI WHERE ID = ?;',array($id));
    }

    public function addKart($data)
    {
        $this->db->query('INSERT INTO KARTBILGILERI (KullaniciID, KartNumarasi, SonKullanmaTarihi, CVV) 
        VALUES (?, ?, ?, ?);',array($data['KullaniciID'], $data['KartNumarasi'], $data['SonKullanmaTarihi'], $data['CVV']));
    }

    public function updateKart($id, $data)
    {
        $this->db->query('UPDATE KARTBILGILERI 
        SET KartNumarasi = ?, 
            SonKullanmaTarihi = ?, 
            CVV = ?
            WHERE ID = ?;',array($data['KartNumarasi'], $data['SonKullanmaTarihi'], $data['CVV'], $id));
    }
}
?>